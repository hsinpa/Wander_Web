<?php namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Model\LevelModel;
use App\Model\SaleModel;
use App\Model\RecordModel;
use App\Model\InteractionModel;
use App\Model\UserModel;
use App\Model\ShadowDataModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class UserCtrl extends Controller {

  function __construct(LevelModel $level, SaleModel $sale, RecordModel $record,
    InteractionModel $interaction, UserModel $user, ShadowDataModel $shadow) {
    $this->_user = $user;
    $this->_interaction = $interaction;
    $this->_record = $record;
    $this->_sale = $sale;
    $this->_level = $level;
    $this->_shadow = $shadow;
  }

//================== MULTIPLAYER GROUP ==================
  public function GetShadowPlayerData($level, $isMulti) {
    $allLevelData = ($isMulti == "true") ? $this->_level->GetAverageUserData($level)
                               : $this->_shadow->GetShadowData($level);
    //Get data from top # player
    $getIndex = Utility::Clamp(count($allLevelData)-1, 0, 5);
    $getIndex = rand(0, $getIndex);

    if (count($allLevelData) > 0) {
      $wantedData = $allLevelData[$getIndex];
      //Get Preparation
      $prepareData = $this->_record->GetUserPreparationByLevelID($wantedData->_id);

      //Get Sell Setting
      $sellData = $this->_sale->GetSellSettingByLevelID($wantedData->_id);

      $message = array("error_status" => false, "Level" => $wantedData,
                      "Prepare" => $prepareData, "Sell" => $sellData);

      return json_encode($message ,JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
    }
    return json_encode(array("error_status" => true));
  }
//================== END MULTIPLAYER GROUP ==================

//================== LOGIN GROUP ==================
  public function CheckUnityVersion() {
    return json_encode(array("device_version" => $this->_user->GetCurrentVersion() ));
  }

  //Syn Data everytime user login / go online
  public function OnSynData(Request $request) {
    $dataArray = (object) $request->json()->all();
    return SynData($dataArray);
  }

  public function SynData($dataArray) {
    $userData = $this->_user->GetUserByGuid($dataArray->id)[0];
    $gameRecords = $this->_level->GetUserDataByGUID($dataArray->id);

    return json_encode(array("error_status"=>false, "fb_id"=> $userData->fb_id, "email"=>$userData->email,
              "guid"=>$userData->guid, "name"=>$userData->name,
              "unlocks"=>$userData->unlocks, "game_records"=>$gameRecords),
            JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
  }

  //For Email / FB login only
  public function PrimeLogin(Request $request) {
    $data = (object) $request->json()->all();


    $errorMessage = json_encode(array("error_status" =>true ));
    //Email
    if ($data->login_type == "Email") {
        $isNewUser = $this->_user->IsNewEmailUser( $data->email );
        //If no user and not registering
        if ($isNewUser && !isset($data->passwordCF)) {
          return $errorMessage;
        }
        //User Register
        if ($isNewUser && count($this->_user->CheckUserAvilability($data->email))<=0) {
          //if email not exist but guid exist
          $userArray = $this->_user->GetUserByGuid($data->id);
          if (count($userArray) > 0) {
            $emailResult = $this->_user->ExistUserEmailUpdate($data);

          } else {
            //True Register
            $this->_user->EmailUserInsert($data);
          }
        } else if ($isNewUser) {
          return $errorMessage;
        }
        //User Login
        if (!$isNewUser) {
          $emailResult = $this->_user->EmailValidation($data->email,
                                      Utility::GetHashString($data->password));
          if (count($emailResult) <= 0 ) {
            return $errorMessage;
          } else {
            $data->id = $emailResult[0]->guid;
          }
        }

    //Facebook
    } else if ($data->login_type == "Facebook") {
      $isNewUser = $this->_user->IsNewFBUser( $data->fb_id );


      if ($isNewUser) {
        if (isset($data->email) &&
            count($this->_user->GetEmailUser($data->email)) > 0 ) {
          $emailUser = $this->_user->GetEmailUser($data->email);
          $this->_user->FBUserUpdate($data->fb_id,$data->username,$data->email);
          $data->id = $emailUser[0]->guid;
        } else {
          $this->_user->FBUserInsert($data);
        }
      }

      $fbResult = $this->_user->FBUserValidation($data->fb_id);
      if ( count( $fbResult ) <= 0) {
        return $errorMessage;
      }  else {
        $data->id = $fbResult[0]->guid;
      }
    }

    //Return the syndata info
    return $this->SynData($data);
  }

  //================== END LOGIN GROUP ==================


  //================== RANK GROUP ==================
  public function GetRanking($guid, $level) {
    $all = $this->_level->GetAllByLevel($level );
    return Utility::SortRanking($all, $guid);
  }

  public function GetTrophyRanking($guid, $level) {
    $record = $this->_user->GetAllUserByTrophy();
    return Utility::SortRanking($record, $guid);
  }

  //================== END RANK GROUP ==================


  //================== SAVE RECORD GROUP ==================
  public function SaveGameRecord(Request $request) {
    $dataArray = (object) $request->json()->all();
    foreach ($dataArray as $data) {
      $data = (object)$data;
      $gameData = $this->_level->GetByGUID($data->id, $data->level);
      $userData = $this->_user->GetUserByGuid($data->id);

      $user_id=(count($userData)<=0) ? $this->_user->InsertUser($data) : $userData[0]->_id;
      $userData = $this->_user->GetUserByID($user_id)[0];


      //If no record then save
      // if (count($gameData) <= 0) {
      $r = $this->_level->SaveLevel($data, $user_id);
      $level_id =  $r;
      //if insert coin is higher than previous one, then update it
      //}
      // else {
      //   if ($gameData[0]->coin <= $data->coins) {
      //       $this->_level->UpdateLevel($data);
      //   }
      //   $level_id = $gameData[0]->_id;
      // }

      $this->_sale->SaveSale($data->sale, $level_id, "player");
      $this->_sale->SaveSale($data->competitor_sale, $level_id, "competitor");

      $this->_record->SaveRecord($data->report, $data->competitor_report, $level_id);
      $this->_interaction->SaveRecord($data->interaction, $level_id);

      //If win + 30 / or -15
      if ($data->game_mode=="multi") {
        $userData->trophy += ($data->star > 0) ? 30 : -15;
        $userData->trophy = Utility::Clamp($userData->trophy, 0, $userData->trophy);
      }

      $this->_user->UpdateUser($data->id, json_encode( $data->unlocks ), $userData->trophy);
    }
  }
}

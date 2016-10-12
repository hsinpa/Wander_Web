<?php namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Model\LevelModel;
use App\Model\SaleModel;
use App\Model\RecordModel;
use App\Model\InteractionModel;
use App\Model\UserModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class UserCtrl extends Controller {

  function __construct(LevelModel $level, SaleModel $sale, RecordModel $record,
    InteractionModel $interaction, UserModel $user) {
    $this->_user = $user;
    $this->_interaction = $interaction;
    $this->_record = $record;
    $this->_sale = $sale;
    $this->_level = $level;
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
            JSON_UNESCAPED_UNICODE );
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
          $this->_user->EmailUserInsert($data);
        } else if ($isNewUser) {
          return $errorMessage;
        }
        //User Login
        if (!$isNewUser) {
          $emailResult = $this->_user->EmailUserUpdate($data);
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
            echo "update";
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


  public function GetRanking($guid, $level) {
    $all = $this->_level->GetAllByLevel($level );
    return Utility::SortRanking($all, $guid);
  }

  public function GetTrophyRanking($guid, $level) {
    $record = $this->_user->GetAllUserByTrophy();
    return Utility::SortRanking($record, $guid);
  }

  public function SaveGameRecord(Request $request) {
    $dataArray = (object) $request->json()->all();
    foreach ($dataArray as $data) {
      $data = (object)$data;
      $gameData = $this->_level->GetByGUID($data->id, $data->level);
      $userData = $this->_user->GetUserByGuid($data->id);

      $user_id=(count($userData)<=0) ? $this->_user->InsertUser($data) : $userData[0]->_id;


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

      $trophyNum = $this->_level->GetTrophyNumByUID($data->id);
      $this->_user->UpdateUser($data->id, json_encode( $data->unlocks ), $trophyNum);
    }
  }
}

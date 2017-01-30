<?php namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Model\LevelModel;
use App\Model\SaleModel;
use App\Model\RecordModel;
use App\Model\InteractionModel;
use App\Model\UserModel;
use App\Model\ShadowDataModel;
use App\Model\LicenseModel;
use App\Model\NotificationModel;

use App\Model\Utility;
use Illuminate\Http\Request;
use Mail;

class UserCtrl extends Controller {

  function __construct(LevelModel $level, SaleModel $sale, RecordModel $record,
    InteractionModel $interaction, UserModel $user, ShadowDataModel $shadow,
    LicenseModel $license, NotificationModel $notification) {
    $this->_user = $user;
    $this->_interaction = $interaction;
    $this->_record = $record;
    $this->_sale = $sale;
    $this->_level = $level;
    $this->_shadow = $shadow;
    $this->_license = $license;
    $this->_notification = $notification;
  }

//================== MULTIPLAYER GROUP ==================
  public function GetShadowPlayerData($level, $guid, $isMulti) {
    $allLevelData = ($isMulti == "true") ? $this->_level->FindNearestMatch($level, $guid)
                               : $this->_shadow->GetShadowData($level);
    $r_name = $this->_user->GetRandomName();

    //Get data from top 20 to 50% players
    $minIndex = round(count($allLevelData) * 0.1);
    $maxIndex = round(count($allLevelData) * 0.3);
    // $getIndex = Utility::Clamp(count($allLevelData)-1, 0, 5);
    $getIndex = rand($minIndex, $maxIndex-1);

    if (count($allLevelData) > 0) {
      $wantedData = $allLevelData[$getIndex];
      $wantedData->name=$r_name->name;

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

  public function GetAllShadowPlayer() {
    $maxLevel = $this->_level->GetMaxLevel()[0];
    $allRecord = [];
    for ($i = 1; $i <= $maxLevel->level; $i++ ) {
      $s_data = json_decode( $this->GetShadowPlayerData( $i, "dsd", "false"));
      if ($s_data->error_status == false) {
        array_push($allRecord, json_decode( $this->GetShadowPlayerData( $i, "fdf", "false") ) );
      }
    }

    return json_encode($allRecord ,JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
  }
//================== END MULTIPLAYER GROUP ==================

//================== LOGIN GROUP ==================
  public function LoginAsGuest(Request $request) {
    $dataArray = (object) $request->json()->all();
    $this->_user->InsertUser($dataArray);

    $this->_user->DeleteExistingNotification($dataArray->notification_id);
    $this->_notification->UpdateNotification( $dataArray->notification_id );
    $this->_user->EditUser(array("notification_id", "notification_provider"),
                          array($dataArray->notification_id,
                                $dataArray->notification_provider,
                                $dataArray->id));
  }

  public function CheckUnityVersion($platform) {
    $data =  $this->_user->GetCurrentVersion($platform);

    return json_encode(array("device_version" => sprintf("%.1f",$data) ));
  }

  //Syn Data everytime user login / go online
  public function OnSynData(Request $request) {
    $dataArray = (object) $request->json()->all();
    return SynData($dataArray);
  }

  public function SynData($dataArray) {

    $userData = $this->_user->GetUserByGuid($dataArray->id)[0];
    $gameRecords = $this->_level->GetUserDataByGUID($dataArray->id);
    $licenseRecord  = $this->_license->GetLicenseByEmail($userData->email);

    if (isset($dataArray->notification_id)) {
      if (!isset($dataArray->game_type)) $dataArray->game_type = "BizVenture";
      $this->_user->DeleteExistingNotification($dataArray->notification_id);
      $this->_user->EditUser(array("notification_id", "notification_provider", "game_type"),
                            array($dataArray->notification_id,
                                  $dataArray->notification_provider,
                                  $dataArray->game_type,
                                  $userData->guid));
    }

    return json_encode(array("error_status"=>false, "fb_id"=> $userData->fb_id, "email"=>$userData->email,
              "guid"=>$userData->guid, "name"=>$userData->name,
              "privilege" => $userData->privilege,
              "donateAmount" => $userData->donateAmount,
              "unlocks"=>$userData->unlocks, "game_records"=>$gameRecords,
              "license" => $licenseRecord),
            JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
  }

  public function EditorPassword(Request $request) {
    $data = (object) $request->json()->all();
    $l_result = json_decode( $this->PrimeLogin($request) );
    $p_result = array();

    if (!$l_result->error_status) {
      $this->_user->EditPassword($data->password_new, $data->id);
      $p_result["error_status"] = false;
    } else {
      $p_result["error_status"] = true;
    }
    return $p_result;
  }

  public function ForgetPassword(Request $request) {
    $data = (object) $request->json()->all();
    $userInfo = $this->_user->GetEmailUser($data->email);

    if (count($userInfo) > 0) {
      $userInfo = $userInfo[0];
      $newPassword = substr(sha1(rand()), 0, 8);
      $userInfo->newPassword = $newPassword;

      $this->_user->EditPassword($newPassword, $userInfo->guid);

      Mail::send('email.forget_password', ['user' => $userInfo],
          function ($m) use ($userInfo) {
            $m->from('wrainbolearning@gmail.com', 'Wrainbo');
            $m->to($userInfo->email, $userInfo->name)->subject('Wrainbo : Change Password');
      });
      return json_encode( array("error_code" => 0),JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK );
    }

    return json_encode( array("error_code" => 1), JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK );
  }

  //For Email / FB login only
  public function PrimeLogin(Request $request) {
    $data = (object) $request->json()->all();

    $errorMessage = array("error_status" =>true, "error_code" => 0);
    //Email
    if ($data->login_type == "Email") {
        $isNewUser = $this->_user->IsNewEmailUser( $data->email );
        //If no user and not registering
        if ($isNewUser && !isset($data->passwordCF)) {
          return json_encode($errorMessage);
        }

        //if player type exist email to server
        if (!$isNewUser && isset($data->purpose)) {
          $errorMessage["error_code"] = 1;
          return json_encode($errorMessage);
        }

        //User Register
        if (isset($data->passwordCF) && $isNewUser &&
            count($this->_user->CheckUserAvilability($data->email))<=0) {
          //if email not exist but guid exist
          $userArray = $this->_user->GetUserByGuid($data->id);
          if (count($userArray) > 0) {
            $emailResult = $this->_user->ExistUserEmailUpdate($data);

          } else {
            //True Register
            $this->_user->EmailUserInsert($data);
          }
        } else if (isset($data->passwordCF) && !$isNewUser) {
          return json_encode($errorMessage);
        }

        //User Login
        if (!$isNewUser) {
          $emailResult = $this->_user->EmailValidation($data->email,
                                      Utility::GetHashString($data->password));
          if (count($emailResult) <= 0 ) {
            return json_encode($errorMessage);
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
        return json_encode($errorMessage);
      }  else {
        $data->id = $fbResult[0]->guid;
      }
    }

    //Return the syndata info
    return $this->SynData($data);
  }

  public function Logout(Request $request) {
    $data = (object) $request->json()->all();
    $this->_notification->DeleteNotification( $data->notification_id);
    $this->_user->EditUser(array("notification_id"), array("", $data->guid));
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

      $this->_user->DeleteExistingNotification($userData->notification_id);
      $this->_notification->UpdateNotification( $userData->notification_id);
      $this->_user->EditUser(array("unlocks", "trophy", "name"),
                            array(json_encode( $data->unlocks ),
                                  $userData->trophy,
                                  $data->username,
                                  $data->id
                          ));
    }
  }
}

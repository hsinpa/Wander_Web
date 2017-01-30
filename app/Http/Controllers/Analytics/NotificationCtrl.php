<?php namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Model\LevelModel;
use App\Model\UserModel;
use App\Model\NotificationModel;

use App\Model\LicenseModel;
use DateTime;
use App\Model\Utility;
use Illuminate\Http\Request;

class NotificationCtrl extends Controller {
  protected $_serverID = "AAAArs2rIAc:APA91bE0_ljhvUzkEZHOrEd6hp4cH3ryEsRnlB4VfLw6idVn5razgt0ExdpD-WZVwuAO5KO2A_atf0YKqC84h654Km8qgiqD_xDc1fB2nFGwblU4zWAlYwcck_l8OlCFaiFrCubQYGoXkRhinQpt13gVoOY1NUtS9g";
  protected $_fcmURL = 'https://fcm.googleapis.com/fcm/send';

  function __construct(LevelModel $level, UserModel $user, LicenseModel $license,
                      NotificationModel $notification) {
    $this->_user = $user;
    $this->_level = $level;
    $this->_license = $license;
    $this->_notification = $notification;
  }

  public function ReceiveRegistrationID (Request $request) {
    $dataArray = (object) $request->json()->all();

    $this->_user->EditUser(array("notification_id", "notification_provider"),
                          array($dataArray->notification_id,
                                $dataArray->notification_provider,
                                $dataArray->guid));
    $this->_notification->UpdateNotification( $dataArray->notification_id );
  }

  //Push to user who didn't play for # of days
  public function PushUnplayUser() {
    $date1Delay = 1;
    $date3Delay = 3;

    $maxLevel = $this->_level->GetMaxLevel()[0]->level;

    //0=>24Pass,1=> 24Fail, 2=> 72Pass,3=> 72 Fail

    $allAvailableUser = $this->_notification->GetNotifcation();
    foreach ($allAvailableUser as $data) {

      $levelInfo = $this->_level->GetUserCurrentStatus($data->_id);

      //level should be less than maxLevel, so index won't break
      if ($data->last_login_date != null  ) {

          $pushNum = 0;
          //Default message
          // $message = "Your inherited apparel shop needs attention!";
          $message = "";

          //Calculate time
          $today = new DateTime(date("Y-m-d"));
          $today->format('Y-m-d');

          $p_last_date = new DateTime( $data->last_login_date);
          $p_last_date->format('Y-m-d');

          $diff=date_diff($today, $p_last_date);
          $minDiff = $diff->i;
          $dayDiff = $diff->d;
          $selectDiff = ($data->game_type == "BizVenture") ? $dayDiff: $minDiff;
          $messageArray =($data->game_type == "BizVenture") ? $this->_notification->BVMessageArray: $this->_notification->BBMessageArray;

          if (count($levelInfo) > 0 && $levelInfo[0]->level <= $maxLevel) {
            $l = $levelInfo[0];
            $levelIndex = intval($l->level);

            //If multiplayer unlock
            if ($l->level == $maxLevel && $l->star > 0) {
              if ( $selectDiff >= $date3Delay && $data->push_num == 1){
                $message = $messageArray[$levelIndex][2];
              } elseif ($selectDiff >= $date1Delay && $data->push_num == 0) {
                $message = $messageArray[$levelIndex][0];
              }
            } else {
              if ( $selectDiff >= $date3Delay && $data->push_num == 1) {
                //Fail to pass and pass successfully

                $message =   ($l->star == 0) ? $messageArray[$levelIndex][3] : $messageArray[$levelIndex][2];
              } elseif ($selectDiff >= $date1Delay && $data->push_num == 0) {
                $message =   ($l->star == 0) ? $messageArray[$levelIndex][1] : $messageArray[$levelIndex][0];
                }
              }
            }
            //If user has not played any level
            else {
              if ( $selectDiff >= $date3Delay && $data->push_num == 1) {
                  $message = $messageArray[0][0];
              } elseif ($selectDiff >= $date1Delay && $data->push_num == 0) {
                  $message = $messageArray[0][3];
                }
            }

          //Send Notificaiton and update notifiaciotn table
          if ($message != "" && $data->push_num < 2) {
            $this->_notification->SendNotification($data->notification_provider,
              Utility::GetFullAppName($data->game_type), $message, $data->notification_id, $data->game_type);

            $this->_notification->EditTable(array("push_num"),
                  array($data->push_num+1, $data->notification_id));
        }
      }
    }
  }

  //Push to device haven't update their app from app store
  public function PushUnupdateUser($game) {
    $allAvailableUser = $this->_notification->GetNotifcation();
    foreach ($allAvailableUser as $user) {
      $this->_notification->SendNotification($user->notification_provider,
        Utility::GetFullAppName($user->game_type), "New update available!",
        $user->notification_id, $user->game_type);
    }
  }


  //Get all noficication that is ready to be send
  public function CheckNotification($title, $message) {
    $n_user = $this->_notification->GetNotifcation();

    foreach ($n_user as $user) {
      $this->_notification->SendNotification($user->notification_provider, $title, $message,
        $user->notification_id, $user->game_type);
    }
  }

}

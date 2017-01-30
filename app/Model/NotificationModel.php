<?php

namespace App\Model;
use DB;

class NotificationModel {
  protected $table = 'Notification';

  public $BVMessageArray = array(
    array("Your guide, Matt, is waiting to help you set your shop up.", "Welcome to Business Venture.", "Matt hopes all is well and you still want to set your shop up." ,"An inheritance is awaiting your acceptance. Tap to accept."),
    array("Amy says Hi to you!", "Check out the tips in Level1.", "Trends Inc. is now in your market. Let's fight back." ,"The tips are really helpful in building your business."),
    array("A new customer has arrived at your store.", "Trends Inc. is challenging you. Let's fight back.", "Winter is coming, demand will rise. Let's sell more." ,"Don't you want to fight back to Trends Inc.?"),
    array("Your store is a hit. Another new customer is here.","Promotion tactic can help you.","Learn about the marketing funnel.","Let's check out the customer card this time."),
    array("Edmond wants to hire some labor.", "Check out the Analytics Pad to choose the right channel.", "Your store is superhit. Another new customer is here." ,"Understand the marketing funnel for maximum outreach."),
    array("Old customer in new boots. Yes, now we have boots to sell.", "Do you want to recruit more labor?", "Oh no! The boots have defects." ,"Hiring labor is worth the additional cost."),
    array("Bags make good money. You should sell them in your store.", "Defects in production is the hidden cost.", "Vendors are asking for contracts." ,"Quality control tactic can reduce your costs."),
    array("Jessie has got some cash for you.", "Check out tips on vendors.", "Jessie has some good suggestions on managing cash." ,"Selling bags can be lucrative."),
    array("Now you can take a loan to grow your business.", "These customers don't pay in this round. Watch your sale.", "There is a cash crunch. Let's take the loan." ,"Cash collection is taking time. Manage your cash wisely."),
    array("Your store is doing well. Invest in a budding business.", "A loan can help you boost your sales.", "Decision trees can help calculate investment returns. " ,"A loan can help you produce bags and earn more cash."),
    array("You have unlocked the multiplayer game. Try it out!", "Investments are have some good returns but may be risky.", "Your competitors are missing the challenge." ,"Did you consider downsizing your labor?")
  );

  public $BBMessageArray = array(
    array("Your guide, Hobin, is waiting to help you set your shop up.", "Welcome to Business Battle. Tap to play.", "Hobin hopes all is well and you still want to set your shop up.", "An inheritance is awaiting your acceptance. Tap to accept.", "Hobin is worried. Competitors might take advantage of your absence.", "An inheritance is awaiting your acceptance. Tap to accept."),
    array("Alvina says Hi to you!", "Check out the tips in Level1.", "A new bot is now in your market. Let's fight back.", "The tips are really helpful in building your business.", "A new bot is now in your market. Let's fight back.", "The tips are really helpful in building your business."),
    array("A new customer has arrived at your store.", "Your competitor bot is challenging you. Let's fight back.", "Winter is coming, demand will rise. Let's sell more.", "Don't you want to fight back to Trends Inc.?", "Winter is coming, demand will rise. Let's sell more.", "Don't you want to fight back to Trends Inc.?"),
    array("Your store is a hit. Another new customer is here.", "Promotion spell can help you.", "Learn about the marketing funnel.", "Let's check out the customer card this time.", "Learn about the marketing funnel.", "Let's check out the customer card this time."),
    array("Edmond wants to hire some labor. ", "Check out the Crystal Ball to choose the right channel.", "Your store is superhit. Another new customer is here.", "Understand the marketing funnel for maximum outreach.", "Your store is superhit. Another new customer is here.", "Understand the marketing funnel for maximum outreach."),
    array("Old customer in new boots. Yes, now we have boots to sell.", "Do you want to recruit more labor?", "Oh no! The boots have defects.", "Hiring labor is worth the additional cost.", "Oh no! The boots have defects.", "Hiring labor is worth the additional cost."),
    array("Bags make good money. You should sell them in your store.", "Defects in production is the hidden cost.", "Vendors are asking for contracts.", "Quality control spell can reduce your costs.", "Vendors are asking for contracts.", "Quality control spell can reduce your costs."),
    array("Rich has got some gold for you.", "Check out tips on vendors.", "Rich has some good suggestions on managing gold.", "Selling bags can be lucrative.", "Rich has some good suggestions on managing gold.", "Selling bags can be lucrative."),
    array("Now you can take a loan to grow your business.", "These customers don't pay in this round. Watch your sale.", "There is a godl crisis. Let's take the loan.", "Gold collection is taking time. Manage your gold wisely.", "There is a godl crisis. Let's take the loan.", "Gold collection is taking time. Manage your gold wisely."),
    array("Your store is doing well. Invest in a budding business.", "A loan can help you boost your sales.", "Decision trees can help calculate investment returns. ", "A loan can help you produce bags and earn more gold.", "Decision trees can help calculate investment returns. ", "A loan can help you produce bags and earn more gold."),
    array("You have unlocked the multiplayer game. Try it out!", "Investments are have some good returns but may be risky. ", "Your competitors are missing the challenge. ", "Did you consider downsizing your labor?", "Your competitors are missing the challenge. ", "Did you consider downsizing your labor?")
  );

    public function GetNotifcation() {
      $q = "SELECT User.*, last_login_date, push_num FROM User
            LEFT JOIN Notification ON Notification._id = User.notification_id
            WHERE notification_id != ''";
      return DB::select($q);
    }

    public function SendNotification($platform, $title, $message, $register_id, $game_type) {
        switch ($platform) {
          case 'FCM':
            $this->FCMPush($title, $message, $register_id);
            break;
          case 'APNS':
            $this->APNPush($title, $message, $register_id, $game_type);
            break;
        }
    }

    public function UpdateNotification($notificationID) {
      $q = "SELECT * FROM Notification WHERE _id = ?";
      $r = DB::select($q, array($notificationID));

      //Create new record
      if (count($r) <= 0) {
        $q = "INSERT INTO Notification(_id, last_login_date, push_num)
              VALUES ( ?, Now(), 0 )";
        DB::insert($q, array($notificationID));

      } else {
        $q = "UPDATE Notification
              SET last_login_date = Now(), push_num = 0 WHERE _id = ?";
        DB::update($q, array($notificationID));
      }
    }


    public function DeleteNotification($notificationID) {
      $q = "DELETE FROM  Notification WHERE _id = ?";
      DB::delete($q, array($notificationID));
    }

    public function FCMPush($title, $message, $register_id) {
      $_serverID = "AAAArs2rIAc:APA91bE0_ljhvUzkEZHOrEd6hp4cH3ryEsRnlB4VfLw6idVn5razgt0ExdpD-WZVwuAO5KO2A_atf0YKqC84h654Km8qgiqD_xDc1fB2nFGwblU4zWAlYwcck_l8OlCFaiFrCubQYGoXkRhinQpt13gVoOY1NUtS9g";
      $_fcmURL = 'https://fcm.googleapis.com/fcm/send';
      // $t_androidID = "fhrXYls3KCA:APA91bETgdr8JlVR2YXGJW87y5i4yNm5Q_2CvCSzQHYLAKufUpphudgh1hQdScmNKq4YrlDL2BhY-fsoiojQzQbsQjiq2Wtqfsgpk2orHyLr8bONaplWxhjiqY-p852EjuXAtnOzcIhV";

      //Data Insert
      $fields = array();
      $text = array();
      $text["message"] = $message;
      $text["event_title"] = $title;

      $fields['data'] = array( "title"=>$title, "text"=>$message);
      $fields['to'] = $register_id;

      //header with content_type api key
      $headers = array(
      	'Content-Type:application/json',
        'Authorization:key='.$_serverID
      );

      //Curl
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $_fcmURL);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
      $result = curl_exec($ch);
      // if ($result === FALSE) {
      // 	echo 'FCM Send Error: ' . curl_error($ch);
      // }

      curl_close($ch);
    }

    public function APNPush($title, $message, $register_id, $game_type) {
      // $t_iosID = "cd27fe3d1513d55bab7a9e497eb26ae78a150d479460d00937b86df61c513271";
      $tHost = 'gateway.sandbox.push.apple.com';

      $tPort = 2195;

      // Provide the Certificate and Key Data.
      $game_type = strtolower($game_type);
      $tCert = public_path().'/lib/certificate/'. $game_type .'.pem';

      // Provide the Private Key Passphrase (alternatively you can keep this secrete

      // and enter the key manually on the terminal -> remove relevant line from code).

      // Replace XXXXX with your Passphrase

      $tPassphrase = 'Takekawa_81';

      // Provide the Device Identifier (Ensure that the Identifier does not have spaces in it).

      // Replace this token with the token of the iOS device that is to receive the notification.

      $tToken = $register_id;

      // The message that is to appear on the dialog.

      // $message = "EHLLO ANOTHER WORLD";

      $tAlert = $message;

      // The Badge Number for the Application Icon (integer >=0).

      $tBadge = 1;

      // Audible Notification Option.

      $tSound = 'default';

      // The content that is returned by the LiveCode "pushNotificationReceived" message.

      $tPayload = '{"endereco":"lauro oscar diefenthaeler","tel":"51 3561-8797","numero":"243","complemento":"0","id":"9","nome":"petiskeira","msg":"HELLO WORLD."}';

      // Create the message content that is to be sent to the device.

      $tBody['aps'] = array (

      'alert' => $tAlert,

      'badge' => $tBadge,

      'sound' => $tSound,

      );

      $tBody ['payload'] = $tPayload;

      // Encode the body to JSON.

      $tBody = json_encode ($tBody);

      // Create the Socket Stream.

      $tContext = stream_context_create ();

      stream_context_set_option ($tContext, 'ssl', 'local_cert', $tCert);

      // Remove this line if you would like to enter the Private Key Passphrase manually.

      stream_context_set_option ($tContext, 'ssl', 'passphrase', $tPassphrase);

      // Open the Connection to the APNS Server.

      $tSocket = stream_socket_client ('ssl://'.$tHost.':'.$tPort, $error, $errstr, 30, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $tContext);

      // Check if we were able to open a socket.

      if (!$tSocket)

      exit ("APNS Connection Failed: $error $errstr" . PHP_EOL);

      // Build the Binary Notification.

      $tMsg = chr (0) . chr (0) . chr (32) . pack ('H*', $tToken) . pack ('n', strlen ($tBody)) . $tBody;

      // Send the Notification to the Server.

      $tResult = fwrite ($tSocket, $tMsg, strlen ($tMsg));

      if ($tResult){

      echo 'Delivered Message to APNS' . PHP_EOL;

      }else

      echo 'Could not Deliver Message to APNS' . PHP_EOL;

      // Close the Connection to the Server.

      fclose ($tSocket);
    }

    //Always add guid at button of valueArray
    public function EditTable($editArray, $valueArray) {
      $q = "UPDATE $this->table
            SET ";
      foreach ($editArray as $key => $v) {
          $q .= " " . $v . " = ? ";
          $q .= ($key == count($editArray)-1 ) ? "" : ",";
      }
      $q .= " WHERE _id = ?";

      return DB::update($q, $valueArray );

    }
}

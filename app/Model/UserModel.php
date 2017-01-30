<?php
namespace App\Model;

use Eloquent;
use App\Model\Utility;
use DB;

class UserModel extends Eloquent {
  protected $table = 'User';
  private $sha_key = "wrainbo2016hsin";

  public function GetRandomName() {
    $q ="SELECT name FROM RandomName";
    $result = DB::select($q);
    $rIndex = rand(0, count($result) -1);
    return $result[$rIndex];
  }

  public function GetAllByOrganization($organization_id) {
    $q ="SELECT * FROM $this->table WHERE organization_id = ?";
    return DB::select($q, array($organization_id));
  }

  public function GetCurrentVersion($platform) {
    $q ="SELECT * FROM Setting WHERE os = ?";
    $r = DB::select($q, array( $platform ))[0];

    return $r->device_version;
  }

  public function IsNewFBUser($fb_id) {
      $q = "SELECT * FROM User WHERE fb_id = ?";
      return (count(DB::select($q, array($fb_id)) ) <=0);
  }

  public function IsNewEmailUser($email) {
      $q = "SELECT * FROM User WHERE email = ?";
      return (count(DB::select($q, array($email)) ) <=0);
  }

  public function GetUserByID($id) {
      $q = "SELECT * FROM User WHERE _id = ?";
      return DB::select($q, array($id));
  }

  public function GetUserByNotification($notification) {
      $q = "SELECT * FROM User WHERE notification_id = ?";
      return DB::select($q, array($notification));
  }

  public function GetUserByGuid($guid) {
      $q = "SELECT * FROM User WHERE guid = ?";
      return DB::select($q, array($guid));
  }

  public function GetUserAllUser() {
      $q ="SELECT guid, name FROM User
            GROUP BY guid";
      return DB::select($q);
  }

  public function GetAllUserByTrophy() {
      $q ="SELECT trophy as value, name, guid
       FROM User WHERE trophy != 0 ORDER BY trophy DESC";
      return DB::select($q);
  }


  public function UpdateUser($guid, $unlocks, $trophyNum) {
    $q = "UPDATE $this->table
          SET unlocks=?, trophy = ?
          WHERE guid = ?";
    return DB::update($q, array ($unlocks, $trophyNum, $guid) );
  }

  //Chekc if the user info is good to insert(no duplication)
  public function CheckUserAvilability($email) {
    $q ="SELECT * FROM User
        WHERE email = ?";
    return DB::select($q, array($email));
  }

  //Guest User (Usually only work in bizbattle)
  public function InsertUser( $data ) {
    $q ="INSERT INTO $this->table (name, guid, game_type)
         VALUES ( ?, ?, ?)";
     DB::insert($q, array ($data->username, $data->id, "BizBattle") );
     return DB::getPdo()->lastInsertId();
  }

  //FB LOGIN
  public function FBUserValidation($fb_id) {
    $q = "SELECT * FROM User WHERE fb_id = ?";
    return DB::select($q, array($fb_id));
    return DB::getPdo()->lastInsertId();
  }

  public function FBUserUpdate($fb_id, $name, $email) {
    $q = "UPDATE $this->table
          SET fb_id = ?, name =?
          WHERE email = ?";
    DB::update($q, array ($fb_id, $name, $email) );

    return $this->FBUserValidation($fb_id);
  }

  public function UserSocialMediaUpdate($guid, $column, $number) {
    $columnArray = array("invite_friends", "share_time", "donateAmount");

    //if column name not exist, then false
    if (!in_array($column, $columnArray)) return;

    $q = "UPDATE $this->table
          SET $column = $column + ?
          WHERE guid = ?";
    DB::update($q, array (intval($number), $guid) );
  }

  public function FBUserInsert($data) {
    if (!isset($data->game_type)) $data->game_type = "BizVenture";

    $q ="INSERT INTO $this->table (name, fb_id, fb_token, guid, game_type)
         VALUES ( ?, ?, ?, ?, ?)";
     DB::insert($q, array ($data->username, $data->fb_id, $data->fb_token,
                            $data->id, $data->game_type) );
     return DB::getPdo()->lastInsertId();
  }

  public function EmailValidation($email, $password) {
    $q = "SELECT * FROM User WHERE email = ? && password = ?";
    return DB::select($q, array($email, $password));
  }


  public function GetEmailUser($email) {
    $q = "SELECT * FROM User WHERE email = ?";
    return DB::select($q, array($email));
  }

  //If guid exist but no email yet
  public function ExistUserEmailUpdate($data) {
    $hashPassword = hash("sha256", $data->password.$this->sha_key);
    $q = "UPDATE $this->table
          SET name=?, email = ?, password = ?
          WHERE guid = ?";
    DB::update($q, array ($data->username, $data->email, $hashPassword, $data->id) );
    return $this->EmailValidation($data->email, $hashPassword);
  }

  public function EmailUserInsert($data) {
    if (!isset($data->game_type)) $data->game_type = "BizVenture";

    if ($data->password == $data->passwordCF) {
      $hashPassword = hash("sha256", $data->password.$this->sha_key);
      $q = "INSERT INTO $this->table (name, email, password, guid, game_type)
            VALUES (?, ?, ?, ?, ?)";

      DB::insert($q, array ($data->username, $data->email, $hashPassword,
                            $data->id, $data->game_type) );

      return DB::getPdo()->lastInsertId();
    } else { return null; }
  }

  public function CreateDummyUser($privilege) {
      $r = DB::select("SELECT COUNT(*) as count FROM User WHERE email LIKE 'demo%'");

      $randomEmail = "demo". ($r[0]->count+1 ). "@wb.com";
      $guid = Utility::GenerateRandomString(20);
      $password = Utility::HashPassword("Welcome123");

      $q = "INSERT INTO $this->table (name, email, password, guid, privilege)
            VALUES (?, ?, ?, ?, ?)";
      DB::insert($q, array("Guest", $randomEmail, $password, $guid, $privilege));
      return $randomEmail;
  }

  public function CreateCompanyUser($name, $email, $company_id) {
      $r = DB::select("SELECT COUNT(*) as count FROM User WHERE email LIKE 'demo%'");

      $guid = Utility::GenerateRandomString(20);
      $password = Utility::HashPassword("Welcome123");

      $q = "INSERT INTO $this->table (name, email, password, guid, organization_id, privilege)
            VALUES (?, ?, ?, ?, ?, ?)";
      DB::insert($q, array($name, $email, $password, $guid, $company_id, 1));
  }


  public function EditPassword($changePassword, $guid ) {
    $hashPassword = hash("sha256", $changePassword.$this->sha_key);
    $q = "UPDATE $this->table
          SET password = ?
          WHERE guid = ?";
    return DB::update($q, array ($hashPassword, $guid) );
  }

  public function EditPasswordByEmail($changePassword, $email ) {
    $hashPassword = hash("sha256", $changePassword.$this->sha_key);
    $q = "UPDATE $this->table
          SET password = ?
          WHERE email = ?";
    return DB::update($q, array ($hashPassword, $email) );
  }

  public function DeleteExistingNotification($notification_id) {
    $q = "SELECT * FROM User WHERE notification_id = ?";
    $array = DB::select($q, array($notification_id));
    foreach ($array as $r) {
      $this->EditUser( array("notification_id"),
                       array($r->notification_id, $r->guid));
    }
  }

  //Always add guid at button of valueArray
  public function EditUser($editArray, $valueArray) {
    $q = "UPDATE $this->table
          SET ";
    foreach ($editArray as $key => $v) {
        $q .= " " . $v . " = ? ";
        $q .= ($key == count($editArray)-1 ) ? "" : ",";
    }
    $q .= " WHERE guid = ?";

    return DB::update($q, $valueArray );

  }

}

<?php
namespace App\Model;

use Eloquent;
use DB;

class UserModel extends Eloquent {
  protected $table = 'User';
  private $sha_key = "wrainbo2016hsin";

  public function IsNewFBUser($fb_id) {
      $q = "SELECT * FROM User WHERE fb_id = ?";
      return (count(DB::select($q, array($fb_id)) ) <=0);
  }

  public function IsNewEmailUser($email) {
      $q = "SELECT * FROM User WHERE email = ?";
      return (count(DB::select($q, array($email)) ) <=0);
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

  //Guest User
  public function InsertUser( $data ) {
    $q ="INSERT INTO $this->table (name, guid)
         VALUES ( ?, ?, ?)";
     DB::insert($q, array ($data->username, $data->id) );
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

  public function FBUserInsert($data) {
    $q ="INSERT INTO $this->table (name, fb_id, fb_token, guid)
         VALUES ( ?, ?, ?, ?)";
     DB::insert($q, array ($data->username, $data->fb_id, $data->fb_token,
                            $data->id) );
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

  //EMAIL LOGIN
  public function EmailUserUpdate($data) {
    $hashPassword = hash("sha256", $data->password.$this->sha_key);
    $q = "UPDATE $this->table
          SET name=?
          WHERE email = ? && password = ?";
    DB::update($q, array ($data->username, $data->email, $hashPassword) );
    return $this->EmailValidation($data->email, $hashPassword);
  }

  public function EmailUserInsert($data) {
    if ($data->password == $data->passwordCF) {
      $hashPassword = hash("sha256", $data->password.$this->sha_key);
      $q = "INSERT INTO $this->table (name, email, password, guid )
            VALUES (?, ?, ?, ?)";

      DB::insert($q, array ($data->username, $data->email, $hashPassword, $data->id) );
      return DB::getPdo()->lastInsertId();
    } else { return null; }
  }



}

<?php
namespace App\Model;

use Eloquent;
use DB;

class CMSUserModel extends Eloquent {
  protected $table = 'CMS_User';
  private $sha_key = "wrainbo2016hsin";



  //Utility function
  public function RefreshToken($username) {
    $token = md5(uniqid(rand(), true));
    $q = "UPDATE $this->table
          SET token=?
          WHERE name=?";

    $r = DB::update($q, array($token, $username));
    session()->put('cms.token', $token);
    return $token;
  }

  public function GetUserID($token) {
    $q = "SELECT _id FROM $this->table
          WHERE token = ?";
    $r = DB::select($q, array($token));

    return  (count($r) <= 0 ) ?  false : $r[0]->_id;
  }

  public function GetUserData($token) {
    $q = "SELECT * FROM $this->table
          WHERE token = ?";
    $r = DB::select($q, array($token));

    return  $r[0];
  }

  public function CheckUserExist($name, $password) {
    $q = "SELECT name FROM $this->table
          WHERE name = ?";
    $r = DB::select($q, array($name));
    return (count($r) > 0) ? true : false;
  }

  //General Function
  public function Login($username, $password) {
    $hashPassword = hash("sha256", $password.$this->sha_key);
    $q = "SELECT name FROM $this->table
          WHERE name = ? && password = ?";
    $r = DB::select($q, array($username, $hashPassword));
    return (count($r) > 0) ? true : false;
  }

  public function Register($username, $password) {
    $hashPassword = hash("sha256", $password.$this->sha_key);
    $q = "INSERT INTO $this->table (name, password)
          VALUES (?, ?)";

    DB::insert($q, array ($username, $hashPassword) );
    return DB::getPdo()->lastInsertId();
  }

  public function Logout() {

  }
}

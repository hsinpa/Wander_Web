<?php
namespace App\Model;

use Eloquent;
use DB;

class UserModel extends Eloquent {
  protected $table = 'User';

  public function GetUserByGuid($guid) {
      $q = "SELECT * FROM User WHERE guid = ?";
      return DB::select($q, array($guid));
  }

  public function GetUserAllUser() {
      $q ="SELECT guid, name FROM User
            GROUP BY guid";
      return DB::select($q);
  }



  public function InsertUser( $data ) {
    $q ="INSERT INTO $this->table (name, guid, device_id)
         VALUES ( ?, ?, ?)";
     DB::insert($q, array ($data->username, $data->id, $data->device_id) );
     return DB::getPdo()->lastInsertId();
  }

}

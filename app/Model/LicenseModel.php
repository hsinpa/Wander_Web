<?php

namespace App\Model;

use Eloquent;
use DB;

class LicenseModel extends Eloquent {
  protected $table = 'License';

  public function GetLicenseByEmail($email) {
      $q = "SELECT * FROM $this->table
            WHERE email = ?";
            
      return DB::select($q, array($email));
  }
}

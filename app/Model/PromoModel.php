<?php

namespace App\Model;

use Eloquent;
use DB;

class PromoModel extends Eloquent {
  protected $table = 'Promo_Code';
  protected $record_table = 'Promo_Record';


  public function GetPromoteCode($code) {
    $q = "SELECT * FROM $this->table
          WHERE code = ?";
    return DB::select( $q, array( $code ));
  }

  public function CheckDuplicate($code, $email) {
    $q = "SELECT * FROM $this->record_table
          WHERE code = ? && email = ?";
    return count(DB::select( $q, array( $code, $email )));
  }

  public function ActivatePromoteCode($code, $email) {
    $q = "UPDATE $this->table
          SET number_used = number_used + 1
          WHERE code = ?";
    $r = DB::update( $q, array( $code ));

    if ($r) {
      $i = "INSERT INTO $this->record_table(email, code)
            VALUES (? , ?)";
      DB::insert( $i, array( $email, $code ));
    }
  }

}

<?php

namespace App\Model;

use Eloquent;
use DB;

class InteractionModel extends Eloquent {
  protected $table = 'Interaction';

  public function SaveRecord($data, $level_id) {
      foreach ($data as $key => $value) {
        $q = "INSERT INTO $this->table (name, count, level_id)
              VALUES (?, ?, ?)";
        DB::insert($q, array($key, $value, $level_id));
      }
    }
}

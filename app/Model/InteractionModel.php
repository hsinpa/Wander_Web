<?php

namespace App\Model;

use Eloquent;
use DB;

class InteractionModel extends Eloquent {
  protected $table = 'Interaction';

  public function SaveRecord($data, $level_id) {
      foreach ($data as $value) {
        $q = "INSERT INTO $this->table (name, click_time, level_id)
              VALUES (?, ?, ?)";
        DB::insert($q, array($value["action"], $value["time"], $level_id));
      }
    }
}

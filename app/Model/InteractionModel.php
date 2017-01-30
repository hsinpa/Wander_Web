<?php

namespace App\Model;

use Eloquent;
use DB;

class InteractionModel extends Eloquent {
  protected $table = 'Interaction';

  public function SaveRecord($data, $level_id) {
      foreach ($data as $value) {
        $q = "INSERT INTO $this->table (name, click_time, `round`, level_id)
              VALUES (?, ?, ?, ?)";
        DB::insert($q, array($value["action"], $value["time"], $value["round"], $level_id));
      }
    }
}

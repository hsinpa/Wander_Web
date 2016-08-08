<?php

namespace App\Model;

use Eloquent;
use DB;

class RecordModel extends Eloquent {
  protected $table = 'PrepareRecord';

  public function SaveRecord($data, $competitor_record, $level_id) {
      foreach ($data as $key => $value) {
        $q = "INSERT INTO $this->table (round, record, competitor_record, roundTime, level_id)
              VALUES (?, ?, ?, ? ,?)";
        DB::insert($q, array ($key, json_encode($value),
                      json_encode($competitor_record[$key]),
                      $value["roundTime"] ,$level_id) );
        }
    }
}

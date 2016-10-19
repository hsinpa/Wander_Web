<?php

namespace App\Model;

use Eloquent;
use DB;

class RecordModel extends Eloquent {
  protected $table = 'PrepareRecord';

  public function GetUserPreparationByLevelID($level_id) {
    $q = "SELECT record, round, roundTime
          FROM $this->table
          WHERE level_id = ?
          ORDER BY round";

    return DB::select($q, array( $level_id ));
  }

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

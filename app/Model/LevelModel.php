<?php

namespace App\Model;

use DB;
use Eloquent;

class LevelModel extends Eloquent {
  protected $table = 'Level';

  //============================ Retrieve ==========================
  public function GetTotalTime() {
    $q = "SELECT SUM(PR.roundTime) as time, CAST(Level.create_time AS DATE) as date
          FROM Level
          LEFT JOIN PrepareRecord AS PR ON PR.level_id = Level._id
          LEFT JOIN Sale ON Sale.level_id = Level._id
          WHERE PR.roundTime IS NOT NULL
          GROUP BY DATE(Level.create_time)
          ORDER BY Level.create_time";
    return DB::select($q);
  }

  public function GetTotalLevel() {
    $q = "SELECT COUNT(Level.level) as levels, DATE(Level.create_time) as create_time
          FROM Level
      		GROUP BY  DATE(Level.create_time)
          ORDER BY Level.create_time";
    return DB::select($q);
  }

  public function GetUserByLevel() {
    $q = "SELECT MAX(Level.level) as MaxLevel, User.name
          FROM Level
          LEFT JOIN User ON Level.user_id = User._id
          GROUP BY Level.user_id";
    return DB::select($q);
  }


  public function GetAllByLevel($level) {
    $q = "SELECT max(coin) as coin, name, level, hero, guid, star
          FROM $this->table
          LEFT JOIN User ON User._id = Level.user_id
          WHERE level = ?
          GROUP BY guid
          ORDER BY coin DESC";
    return DB::select($q, array($level));
  }

  public function GetAllByGUID ($guid) {
    $q = "SELECT name, device_id, guid, star, hero, coin, level, carry_spell_set
          FROM $this->table
          LEFT JOIN User ON User._id = Level.user_id
          WHERE User.guid = ?";
    return DB::select($q, array ($guid) );
  }

  public function GetByGUID($guid, $level) {
    $q = "SELECT name, device_id, guid, hero, star, coin, level
          FROM $this->table
          LEFT JOIN User ON User._id = Level.user_id
          WHERE User.guid = ? && level = ?
          ORDER BY coin DESC";
    return DB::select($q, array ($guid, $level) );
  }

  //============================ Insert ==========================
  public function SaveLevel($data, $user_id) {
      $q = "INSERT INTO $this->table (star, coin, hero, level, carry_spell_set,
                                      segment_detail,user_id)
            VALUES (?, ?, ?, ?, ? ,?, ?)";
      DB::insert($q, array ($data->star, $data->coins, $data->hero,
                            $data->level, json_encode($data->carrySpell),
                            json_encode($data->segmentDetail), $user_id) );
      return DB::getPdo()->lastInsertId();
  }

  public function UpdateLevel($data, $user_id) {
    $q = "UPDATE $this->table
          Set star = ?,
              coin = ?,
              hero = ?
          WHERE level = ? && user_id = ?";
    return DB::update($q, array ($data->star, $data->coins, $data->hero,
                       $data->level, $user_id) );
  }

}

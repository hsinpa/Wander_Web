<?php

namespace App\Model;

use DB;
use Eloquent;
use App\Model\Utility;

class LevelModel extends Eloquent {
  protected $table = 'Level';

  //============================ Retrieve ==========================
  public function GetTotalTime() {
    $q = "SELECT SUM(PR.roundTime) as time, CAST(Level.create_time AS DATE) as date
          FROM Level
          LEFT JOIN PrepareRecord AS PR ON PR.level_id = Level._id
          LEFT JOIN Sale ON Sale.level_id = Level._id
          WHERE PR.roundTime IS NOT NULL && type != 'multi'
          GROUP BY DATE(Level.create_time)
          ORDER BY Level.create_time";
    return DB::select($q);
  }

  public function GetTotalLevel() {
    $q = "SELECT COUNT(Level.level) as levels, DATE(Level.create_time) as create_time
          FROM Level
          WHERE type != 'multi'
      		GROUP BY  DATE(Level.create_time)
          ORDER BY Level.create_time";
    return DB::select($q);
  }

  public function GetUserByLevel() {
    $q = "SELECT MAX(Level.level) as MaxLevel, User.name
          FROM Level
          LEFT JOIN User ON Level.user_id = User._id
          WHERE type != 'multi'
          GROUP BY Level.user_id";
    return DB::select($q);
  }


  public function GetAllByLevel($level) {
    $q = "SELECT max(coin) as value, name, level, hero, guid, star
          FROM $this->table
          LEFT JOIN User ON User._id = Level.user_id
          WHERE level = ?
          GROUP BY guid
          ORDER BY value DESC";
    return DB::select($q, array($level));
  }

  public function GetAllByGUID ($guid) {
    $q = "SELECT name, guid, star, hero, coin, level, carry_spell_set
          FROM $this->table
          WHERE type != 'multi'
          LEFT JOIN User ON User._id = Level.user_id
          WHERE User.guid = ?";
    return DB::select($q, array ($guid) );
  }

  public function GetByGUID($guid, $level) {
    $q = "SELECT name, guid, hero, star, coin, level
          FROM $this->table
          LEFT JOIN User ON User._id = Level.user_id
          WHERE User.guid = ? && level = ?
          ORDER BY coin DESC";
    return DB::select($q, array ($guid, $level) );
  }

  public function GetUserDataByGUID($guid) {
    $q = "SELECT  type, max(coin) as coin, User.name, User.guid, star, hero, level
          FROM $this->table
          LEFT JOIN User ON User._id = Level.user_id
          WHERE User.guid = ?
          GROUP BY level";

    return DB::select($q, array ($guid) );
  }

  //============================ Multiplayer ==========================
  public function GetTrophyNumByUID($user_id) {
    $q = "SELECT  type, coin, star, hero, level
          FROM $this->table
          WHERE user_id = ? && type = 'multi'";

    $r = DB::select($q, array ($user_id) );
    $plus=0;
    $minus=0;

    foreach ($r as $record) {
        if ($record->star == 0) $minus+=15;
        if ($record->star > 0) $plus+=30;
    }
    return Utility::Clamp($plus-$minus, 0, $plus);
  }



  //============================ Insert ==========================
  public function SaveLevel($data, $user_id) {
      $q = "INSERT INTO $this->table (star, coin, hero, type, level, carry_spell_set,
                                      segment_detail,user_id)
            VALUES (?, ?, ?, ?, ?, ? ,?, ?)";
      DB::insert($q, array ($data->star, $data->coins, $data->hero, $data->game_mode,
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

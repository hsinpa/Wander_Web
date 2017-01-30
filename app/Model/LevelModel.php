<?php

namespace App\Model;

use DB;
use Eloquent;
use App\Model\Utility;

class LevelModel extends Eloquent {
  protected $table = 'Level';

  //============================ Retrieve ==========================
  public function GetTotalTime($organization_id = 0) {
    $q = "SELECT SUM(PR.roundTime) as time, CAST(Level.create_time AS DATE) as date
          FROM Level
          LEFT JOIN PrepareRecord AS PR ON PR.level_id = Level._id
          LEFT JOIN User ON User._id = Level.user_id
          LEFT JOIN Sale ON Sale.level_id = Level._id
          WHERE PR.roundTime IS NOT NULL && type != 'multi' "
          . (($organization_id != 0) ? "&& User.organization_id = $organization_id" : "").
          " GROUP BY DATE(Level.create_time)
          ORDER BY Level.create_time";
    return DB::select($q);
  }

  public function GetTotalLevel($organization_id = 0) {
    $q = "SELECT COUNT(Level.level) as levels, DATE(Level.create_time) as create_time
          FROM Level
          LEFT JOIN User ON User._id = Level.user_id
          WHERE type != 'multi' "
          . (($organization_id != 0) ? "&& User.organization_id = $organization_id" : "").
      	  "	GROUP BY  DATE(Level.create_time)
          ORDER BY Level.create_time";
    return DB::select($q);
  }

  public function GetUserTotalTime($user_id) {
    $q = "SELECT SUM(PR.roundTime) as time, CAST(Level.create_time AS DATE) as date
          FROM Level
          LEFT JOIN PrepareRecord AS PR ON PR.level_id = Level._id
          WHERE PR.roundTime IS NOT NULL && type != 'multi'
                && user_id = ?
          GROUP BY DATE(Level.create_time)
          ORDER BY Level.create_time";
    return DB::select($q, array($user_id));
  }

  public function GetUserTotalLevelByTime($user_id) {
    $q = "SELECT COUNT(Level.level) as levels, DATE(Level.create_time) as create_time
          FROM Level
          WHERE type != 'multi' && user_id = ?
      		GROUP BY  DATE(Level.create_time)
          ORDER BY Level.create_time";
    return DB::select($q, array($user_id));
  }

  public function GetUserTotalLevel($user_id) {
    $q = "SELECT COUNT(Level.level) as 'number', level, user_id
          FROM Level
          WHERE type != 'multi' && user_id = ?
          GROUP BY  level
          ORDER BY Level.level";
    return DB::select($q, array($user_id));
  }

  public function GetUserCurrentStatus($user_id) {
    $q = "SELECT level, user_id, star
          FROM Level
          WHERE type != 'multi' && user_id = ?
          ORDER BY level DESC, star DESC";
    return DB::select($q, array($user_id));
  }


  public function GetAveragePlayPerLevel($organization_id = 0) {
    $q = "SELECT AVG(Level.level) as avgLevel, User.name, user_id as id
          FROM Level
          LEFT JOIN User ON Level.user_id = User._id
          WHERE type != 'multi' "
          . (($organization_id != 0) ? "&& User.organization_id = $organization_id" : "").
          " GROUP BY Level.user_id";
    return DB::select($q);
  }

  public function GetUserByLevel($organization_id = 0) {
    $q = "SELECT MAX(Level.level) as MaxLevel, User.name, user_id as id
          FROM Level
          LEFT JOIN User ON Level.user_id = User._id
          WHERE type != 'multi'"
          . (($organization_id != 0) ? "&& User.organization_id = $organization_id" : "").
          " GROUP BY Level.user_id";
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
    $q = "SELECT type as game_mode, max(star) as star, max(coin) as coins, User.name, User.guid,
           hero, level
          FROM (SELECT * FROM $this->table ORDER BY star DESC) as Level
          LEFT JOIN User ON User._id = Level.user_id
          WHERE User.guid = ? && type = 'campaign' && star != 0
          GROUP BY level";

    return DB::select($q, array ($guid) );
  }

  public function GetMaxLevel() {
    $q = "SELECT max( level ) AS level
          FROM $this->table
          WHERE type = 'campaign'";

    return DB::select($q);
  }

  public function CheckCompleteRate($p_organizationId ) {
    $q = "SELECT Level.*, Max(Level.level) as max
          FROM (SELECT * FROM Level ORDER BY level DESC) as Level
          LEFT JOIN User ON User._id = Level.user_id
          WHERE type = 'campaign' "
          . (($p_organizationId != 0) ? "&& User.organization_id = $p_organizationId" : "").
          " GROUP BY Level.user_id";

    return DB::select($q);
  }

  //============================ CMS Assessment Metric Group ==========================
  public function GetAll($organization_id = 0) {
    $q = "SELECT Level.*
          FROM Level
          LEFT JOIN User ON User._id = Level.user_id
          WHERE type != 'multi' "
          . (($organization_id != 0) ? " && User.organization_id = $organization_id" : "");
    return DB::select($q);
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

  public function GetAverageUserData($level, $guid) {
    $q = "SELECT Level._id, coin, hero, user_id, name, trophy
          FROM Level
          LEFT JOIN User ON User._id = Level.user_id
          WHERE type = 'multi'
                && Level.level = ?
                && User.guid != ?
                && star = 1
          GROUP BY Level._id
          ORDER BY Level.coin DESC, trophy DESC";
    $allLevelData = DB::select($q, array( $level, $guid ));
    return $allLevelData;
  }

  public function FindNearestMatch( $level, $guid ) {
    $q = "SELECT Level._id, max(coin) as coin, hero, user_id, name, trophy, guid
          FROM Level
          LEFT JOIN User ON User._id = Level.user_id
          WHERE type = 'multi'
                && Level.level = ?
                && star = 1
                && coin > 3000
          GROUP BY guid
          ORDER BY trophy DESC,Level.coin DESC";
    $allLevelData = DB::select($q, array( $level ));


    $container = array();

    foreach ($allLevelData as $key => $value) {
      //Find player's index
      if ($value->guid == $guid) {
        //if index is the first element, find the index behind you
        if ($key == 0) {
          array_push($container, $allLevelData[$key+1]);
        } else {
          //find player front of you
          array_push($container, $allLevelData[$key-1]);
        }
        return $container;
      }
    }
    return $allLevelData;
  }

  public function GetUserDataByName($level, $name) {
    $q = "SELECT Level._id, MAX(coin) as coin, hero, user_id, name
          FROM Level
          LEFT JOIN User ON User._id = Level.user_id
          WHERE  Level.level = ? && User.name = ?
          GROUP BY Level.user_id
          ORDER BY Level.coin DESC";
    $allLevelData = DB::select($q, array( $level, $name ));
    return $allLevelData;
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

<?php
namespace App\Model;

use Eloquent;
use DB;

class CMSLevelModel extends Eloquent {
  protected $table = 'LevelEditor';

  public function BuildDefaultLevel($user_id) {
    $key = 46;
    $query = "INSERT INTO $this->table (`name`, map, gold, labor, mana, round, gold_target,
                      competitor, villagers, `event`, preset, `unlock`, description, user_id)
              SELECT `name`, map, gold, labor, mana, round, gold_target,
               competitor, villagers, `event`, preset, `unlock`, description, ?
              FROM $this->table
              where user_id = ?";
    DB::insert($query, array($user_id, $key));
  }

  public function LoadLevelByUser($user_id) {
    $q = "SELECT _id, `name`, map, gold, labor, mana, round, gold_target,
                  competitor, villagers, `event`, preset, `unlock`, description
          FROM $this->table
          WHERE user_id = ?";
    return DB::select($q, array($user_id));
  }

  //Save
  public function SaveLevel($data, $user_id, $villagers, $event, $preset, $unlock) {
    $q = "INSERT INTO $this->table(`name`, map, gold, labor, mana, round, gold_target,
     competitor, villagers, `event`, preset, `unlock`, description, user_id)
          VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    DB::insert($q, array ($data["level_name"], $data["map"], $data["gold"],
    $data["labor"], $data["mana"], $data["round"], $data["gold_target"], $data["competitor"],
     $villagers, $event, $preset, $unlock, $data["description"], $user_id) );
    return DB::getPdo()->lastInsertId();
  }

  //Update Data
  public function UpdateLevel($data, $user_id, $villagers, $event, $preset, $unlock) {
    $q = "UPDATE $this->table
          SET `name` = ?, map = ?, gold = ?, labor = ?, mana =?, round = ?, gold_target = ?,
              competitor = ?, villagers = ?, `event` = ?, preset = ?, `unlock` = ?, description=?
           WHERE user_id = ? && _id = ?";

    DB::update($q, array ($data["level_name"], $data["map"], $data["gold"], $data["labor"],
     $data["mana"], $data["round"], $data["gold_target"], $data["competitor"],$villagers,
     $event, $preset, $unlock, $data["description"], $user_id, $data["level_id"] ) );
    return $data["level_id"];
  }

  public function DeleteLevel($user_id, $level_id) {
    $q = "DELETE FROM $this->table
          WHERE user_id = ? && _id = ?";
    DB::delete($q, array($user_id, $level_id));
  }
}

<?php

namespace App\Model;

use DB;
use Eloquent;
use App\Model\Utility;

class ShadowDataModel extends Eloquent {
  protected $table = 'ShadowDataRecord';

  public function GetShadowData($level) {
    $q = "SELECT Level._id, MAX(coin) as coin, hero, user_id, name, level
          FROM $this->table as S
          LEFT JOIN Level ON S.level_id = Level._id
          LEFT JOIN User ON User._id = Level.user_id
          WHERE  Level.level = ?
          GROUP BY Level.user_id
          ORDER BY Level.coin DESC";
    return DB::select($q, array( $level ));
  }
}

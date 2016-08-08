<?php namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Model\LevelModel;
use App\Model\SaleModel;
use App\Model\RecordModel;
use App\Model\InteractionModel;
use App\Model\UserModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class WebAnaCtrl extends Controller {

  function __construct(LevelModel $level, SaleModel $sale, RecordModel $record,
    InteractionModel $interaction, UserModel $user) {
    $this->_user = $user;
    $this->_interaction = $interaction;
    $this->_record = $record;
    $this->_sale = $sale;
    $this->_level = $level;
  }

  public function AnalyticsTestPortal() {
    return json_encode($this->_user->GetUserAllUser());
  }

  public function GetAllDataByGUID($guid) {
    return json_encode($this->_level->GetAllByGUID( $guid ));
  }

  public function GetSpellLevelAnalysis($guid) {
     $result = $this->_level->GetAllByGUID( $guid );
     $spellJSONList = [];
     foreach ($result as $list) {
      //Check no level hero no repeat
       $spellJson = json_decode( $list->carry_spell_set );
       if ($spellJson == null) continue;
       foreach ($spellJson as $spell) {
            $jsonObj = new \stdClass();
            $jsonObj->carrySpell = $spell;
            $jsonObj->level = $list->level;
            $jsonObj->hero = $list->hero;
            array_push($spellJSONList, $jsonObj);
       }
     }

    return json_encode($spellJSONList);
  }

}

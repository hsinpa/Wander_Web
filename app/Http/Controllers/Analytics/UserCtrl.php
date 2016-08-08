<?php namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Model\LevelModel;
use App\Model\SaleModel;
use App\Model\RecordModel;
use App\Model\InteractionModel;
use App\Model\UserModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class UserCtrl extends Controller {

  function __construct(LevelModel $level, SaleModel $sale, RecordModel $record,
    InteractionModel $interaction, UserModel $user) {
    $this->_user = $user;
    $this->_interaction = $interaction;
    $this->_record = $record;
    $this->_sale = $sale;
    $this->_level = $level;
  }

  //Temporaily manually import
  public function ImportUnityAnalyticsData(Request $request) {
    $outerData = $request->json()->all();
    foreach ($outerData as $json) {

      $coreData = $json["custom_params"];

      switch ($json["name"]) {
        case 'LevelProgression':
          $round = json_decode($coreData["round"]);

          break;

        case 'BtnInteraction':
          break;

        default:
          break;
      }
    }
  }

  public function GetRanking($level) {
    return json_encode($this->_level->GetAllByLevel( $level ), JSON_UNESCAPED_UNICODE);
  }

  public function SaveGameRecord(Request $request) {
    $data = (object) $request->json()->all();
    $gameData = $this->_level->GetByGUID($data->id, $data->level);
    $userData = $this->_user->GetUserByGuid($data->id);

    $user_id=(count($userData)<=0) ? $this->_user->InsertUser($data) : $userData[0]->_id;


    //If no record then save
    // if (count($gameData) <= 0) {
    $r = $this->_level->SaveLevel($data, $user_id);
    $level_id =  $r;
    //if insert coin is higher than previous one, then update it
    //}
    // else {
    //   if ($gameData[0]->coin <= $data->coins) {
    //       $this->_level->UpdateLevel($data);
    //   }
    //   $level_id = $gameData[0]->_id;
    // }

    $this->_sale->SaveSale($data->sale, $level_id, "player");
    $this->_sale->SaveSale($data->competitor_sale, $level_id, "competitor");

    $this->_record->SaveRecord($data->report, $data->competitor_report, $level_id);
    $this->_interaction->SaveRecord($data->interaction, $level_id);
  }
}

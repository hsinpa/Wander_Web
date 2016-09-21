<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSLevelModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class CMSLevelCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSLevelModel $level) {
    $this->_user = $user;
    $this->_level = $level;
  }

  public function ParseRawData($inputArray) {
    $p_string = "";
    for ($k = 0; $k < count($inputArray); $k++) {
        $p_string .= $inputArray[$k]."&";
    }
    $p_string = substr($p_string, 0, -1);
    return $p_string;
  }

  public function GetLevel($user_id) {
      $result = $this->_level->LoadLevelByUser($user_id);
      return  json_encode($result);
  }

  //Return with actual html
  public function LoadLevel() {
    $user_id = $this->_user->GetUserID(session('cms.token'));
    $user_data = $this->_user->GetUserData(session('cms.token'));

    if (!$user_id) return redirect('cms/logout');

    $rawLevelData = $this->_level->LoadLevelByUser($user_id);
    return view('cms.level.level',
     ["raw" => $rawLevelData,
      "user_id" => $user_id ,
      "page"=>"level",
      "user_name" => $user_data->name]);
  }

  public function SaveLevel(Request $post) {
    $all = $post->all();
    $user_id = $this->_user->GetUserID($all["cms_token"]);
    if (!$user_id) return redirect('cms/logout');

    //Formating Event style
    $event = $this->ParseRawData($all["event"]);

    //Formating Preset style
    $preset = "";
    if (array_key_exists('preset', $all)) {
      for ($i = 0; $i < count($all["preset"]); $i++) {
        $preset .= $all["preset"][$i].",".$all["presetNum"][$i]."&";
      }
      $preset = substr($preset, 0, -1);
    }

    //Formating unlock item
    $unlock = (array_key_exists('unlock', $all)) ? $this->ParseRawData($all["unlock"]) : "";
    $villagers = $this->ParseRawData($all["villager"]);
    // echo $event;
    // echo $preset;
    // echo $unlock;
    // echo $user_id;

    //If leve_id is -1 = save / update
    if ($all["level_id"] != -1) {
      return ($this->_level->UpdateLevel($all, $user_id, $villagers, $event, $preset, $unlock));
    } else {
      return ($this->_level->SaveLevel($all, $user_id, $villagers, $event, $preset, $unlock));
    }
  }

  public function DeleteLevel(Request $post) {
    $all = $post->all();
    $user_id = $this->_user->GetUserID($all["cms_token"]);
    $this->_level->DeleteLevel($user_id, $all["level_id"]);

    return json_encode(array ('Message'=>"Delete Success"));
  }
}

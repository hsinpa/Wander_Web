<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\LevelModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class CMSAssessmentCtrl extends Controller {

  function __construct(LevelModel $level, CMSUserModel $user ) {
    $this->_user = $user;
    $this->_level = $level;
  }

  public function GetUsageData() {
    $totalPlayTime = $this->_level->GetTotalTime();
    $totalPlayLevel = $this->_level->GetTotalLevel();
    $totalUserPlayLevel = $this->_level->GetUserByLevel();

    foreach ($totalPlayTime as $key => $value) {
      $value->time =round( ($value->time / 60) / 24 , 2);
    }

    return json_encode(
    [ "totalPlay" => ["data" => $totalPlayTime, "xAxis"=>"Date", "yAxis"=>"Time(Hour) "],
      "totalLevel" => ["data" => $totalPlayLevel, "xAxis"=>"Date", "yAxis"=>"Levels of Play"],
      "userLevel" => $totalUserPlayLevel
    ]);
  }

  public function LoadPage() {
    $user_data = $this->_user->GetUserData(session('cms.token'));

    return view('cms.assessment.assessment',
      ['title' => 'Analytics Demo',"page"=>"assessment","user_name" => $user_data->name]);
  }
}

<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\LevelModel;
use App\Model\UserModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class CMSAssessmentCtrl extends Controller {

  function __construct(LevelModel $level, CMSUserModel $user, UserModel $gameUser ) {
    $this->_user = $user;
    $this->_gameUser = $gameUser;
    $this->_level = $level;
  }

  public function GetUsageData($organization_id) {
    $totalPlayTime = $this->_level->GetTotalTime($organization_id);
    $totalPlayLevel = $this->_level->GetTotalLevel($organization_id);
    $totalUserPlayLevel = $this->_level->GetUserByLevel($organization_id);
    $allOrganization = $this->_gameUser->GetAllOrganization();

    foreach ($totalPlayTime as $key => $value) {
      $value->time =round( ($value->time / 60) / 24 , 2);
    }

    return json_encode(
    [ "totalPlay" => ["data" => $totalPlayTime, "xAxis"=>"Date", "yAxis"=>"Time(Hour) "],
      "totalLevel" => ["data" => $totalPlayLevel, "xAxis"=>"Date", "yAxis"=>"Levels of Play"],
      "userLevel" => $totalUserPlayLevel, "allOrganization" => $allOrganization,
      "metric" => $this->GetMetric($organization_id)
    ]);
  }

  public function GetUsageByUserData($user_id) {
    $totalPlayTime = $this->_level->GetUserTotalTime($user_id);
    $totalPlayLevel = $this->_level->GetUserTotalLevelByTime($user_id);
    $totalUserPlayLevel = $this->_level->GetUserTotalLevel($user_id);

    foreach ($totalPlayTime as $key => $value) {
      $value->time =round( ($value->time / 60) / 24 , 2);
    }

    return json_encode(
    [ "totalPlay" => ["data" => $totalPlayTime, "xAxis"=>"Date", "yAxis"=>"Time(Hour) "],
      "totalLevel" => ["data" => $totalPlayLevel, "xAxis"=>"Date", "yAxis"=>"Levels of Play"],
      "userLevel" => $totalUserPlayLevel
    ]);
  }

  public function GetMetric($organization_id) {
    $allLevelData = $this->_level->GetAll($organization_id);
    $maxLevel = $this->_level->GetMaxLevel($organization_id)[0]->level;
    $totalPlayTime = $this->_level->GetTotalTime($organization_id);
    $totalAvgPlayLevel = $this->_level->GetAveragePlayPerLevel($organization_id);
    $allOrganizationUser = $this->_level->CheckCompleteRate($organization_id);

    //Calculate Assessment Metric
    $metric = ["length" => count($allLevelData)];
    foreach ($allLevelData as $key => $value) {
      //Average star
      $metric = Utility::AppendObjectNum($metric, "star", $value->star);
    }
    //Average Time
    foreach ($totalPlayTime as $key => $value) {
      $metric = Utility::AppendObjectNum($metric, "average_time", $value->time);
    }
    //Average plays
    foreach ($totalAvgPlayLevel as $key => $value) {
      $metric = Utility::AppendObjectNum($metric, "average_play", $value->avgLevel);
    }

    //Completion Rate
    $metric["complete_rate"] = 0;
    foreach ($allOrganizationUser as $key => $value) {
      if ($value->max == $maxLevel) $metric["complete_rate"]++;
    }

    //End Calculation
    $metric["complete_rate"] = round(($metric["complete_rate"] / count($allOrganizationUser)*100), 2);
    $metric["star"] = round($metric["star"] / $metric["length"], 2);
    $metric["average_time"] = round( ($metric["average_time"] / 60 ) / count($allLevelData), 2);
    $metric["average_play"] = round( $metric["average_play"] / count($totalAvgPlayLevel), 2);

    return $metric;
  }

  public function LoadPage() {
    $user_data = $this->_user->GetUserData(session('cms.token'));
    return view('cms.assessment.assessment',
      ['title' => 'Analytics Demo',"page"=>"assessment","user_name" => $user_data->name]);
  }
}

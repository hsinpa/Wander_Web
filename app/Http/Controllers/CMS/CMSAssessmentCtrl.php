<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSLevelModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class CMSAssessmentCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSLevelModel $level) {
    $this->_user = $user;
    $this->_level = $level;
  }

  public function LoadPage() {
    $user_data = $this->_user->GetUserData(session('cms.token'));

    return view('cms.assessment.assessment',
      ['title' => 'Analytics Demo',"page"=>"assessment","user_name" => $user_data->name]);
  }
}

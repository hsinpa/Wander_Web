<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSLevelModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class CMSLicenseCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSLevelModel $level) {
    $this->_user = $user;
    $this->_level = $level;
  }

  public function LoadPage() {
    $user_data = $this->_user->GetUserData(session('cms.token'));

    return view('cms.license.license',
      ['title' => 'Wrainbo | CMS | License Management',
        "page"=>"license",
       "user_name" => $user_data->name]);
  }
}

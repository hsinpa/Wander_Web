<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSLicenseModel;


use App\Model\Utility;
use Illuminate\Http\Request;

class CMSLicenseCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSLicenseModel $license) {
    $this->_user = $user;
    $this->_license = $license;
  }

  public function LoadPage() {
    $user_data = $this->_user->GetUserData(session('cms.token'));
    $activeLicenses = $this->_license->GetActiveLicenses($user_data->name);
    $totalLicenses = $this->_license->GetLicenseCount($user_data->name);
    $availableLicenses = $this->_license->GetAvailableLicenses($user_data->name);

    return view('cms.license.license',
      ['title' => 'Wrainbo | CMS | License Management',
        "page"=>"license",
        "user_name" => $user_data->name,
        "active_licenses" => $activeLicenses,
        "total_licenses" => $totalLicenses,
        "available_licenses" => $availableLicenses]);
  }
}

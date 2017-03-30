<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSLicenseModel;
use Validator;
use Illuminate\Support\Facades\Log;


use App\Model\Utility;
use Illuminate\Http\Request;

class CMSPaymentCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSLicenseModel $license) {
    $this->_user = $user;
    $this->_license = $license;
  }

  public function LoadPage() {
    $user_data = $this->_user->GetUserData(session('cms.token'));
    $activeLicenses = $this->_license->GetActiveLicenses($user_data->_id);
    $totalLicenses = $this->_license->GetLicenseCount($user_data->_id);
    $availableLicenses = $this->_license->GetAvailableLicenses($user_data->_id);

    return view('cms.license.payment.payment',
      ['title' => 'Wrainbo | CMS | Payment',
        "page"=>"payment",
        "user_name" => $user_data->name,
        "active_licenses" => $activeLicenses,
        "total_licenses" => $totalLicenses,
        "available_licenses" => $availableLicenses]);
  }
}

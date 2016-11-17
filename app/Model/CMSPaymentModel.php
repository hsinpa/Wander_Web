<?php
namespace App\Model;

use Eloquent;
use DB;
use Illuminate\Support\Facades\Log;

class CMSPaymentModel extends Eloquent {
  protected $table = 'CMS_License';
  protected $userTable = 'CMS_User';
  private $sha_key = "wrainbo2016hsin";

  //License information
  public function GetActiveLicenses($_id) {
    $r = DB::table($this->table)->where('user_id',$_id)->count();
    return ($r);
  }

  public function GetLicenseCount($_id) {
    $r = DB::table($this->userTable)->where('_id',$_id)->value('license_count');
    return $r;
  }

  public function GetAvailableLicenses($_id) {
    $r = self::GetLicenseCount($_id)-self::GetActiveLicenses($_id);
    return $r;
  }

  //Buy more licenses
  public function BuyLicenses($id, $amount) {
    \Stripe\Stripe::setApiKey("sk_test_hx194iFHfvBWG6Nanzq9dj0d");
  }

}

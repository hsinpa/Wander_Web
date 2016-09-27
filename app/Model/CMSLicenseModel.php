<?php
namespace App\Model;

use Eloquent;
use DB;
use Illuminate\Support\Facades\Log;

class CMSLicenseModel extends Eloquent {
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
  //Register new license
  public function RegisterEmail($id, $email, $department) {
    $totalLicenses = self::GetAvailableLicenses($id);
    if ($totalLicenses > 0){
      if (!empty($department)) {
        $r = DB::table($this->table)->insert(['user_id' => $id, 'email' => $email, 'department' => $department]);
        return $r;
      } else {
        $r = DB::table($this->table)->insert(['user_id' => $id, 'email' => $email]);
        return $r;
      }
    } else {
      return redirect ('cms/license')
        ->withErrors('No more licenses available. Please purchase additional licenses.');
    }
  }

}

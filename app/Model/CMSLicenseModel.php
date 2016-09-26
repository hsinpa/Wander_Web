<?php
namespace App\Model;

use Eloquent;
use DB;

class CMSLicenseModel extends Eloquent {
  protected $table = 'CMS_License';
  protected $userTable = 'CMS_User';
  private $sha_key = "wrainbo2016hsin";

  public function GetActiveLicenses($username) {
    $q = "SELECT * FROM $this->table
          WHERE username = ?";
    $r = DB::select($q, array($username));
    return (count($r));
  }
  //Utility function
  public function GetLicenseCount($username) {
    $r = DB::table('cms_user')->where('name',$username)->value('license_count');
    return $r;
  }

  public function GetAvailableLicenses($username) {
    $r = self::GetLicenseCount($username)-self::GetActiveLicenses($username);
    return $r;
  }

}

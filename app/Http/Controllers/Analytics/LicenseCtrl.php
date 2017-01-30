<?php namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Model\LicenseModel;
use App\Model\PromoModel;
use App\Model\UserModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class LicenseCtrl extends Controller {

  function __construct(LicenseModel $license, PromoModel $promo, UserModel $user) {
    $this->_user = $user;
    $this->_license = $license;
    $this->_promo = $promo;
  }

  public function ActivatePromoCode(Request $request) {
    $dataArray = (object) $request->json()->all();
    $message = array("error_status" => true);
    $promoRecord = $this->_promo->GetPromoteCode( $dataArray->code );
    $usedTime = $this->_promo->CheckDuplicate($dataArray->code, $dataArray->email);

    if (count($promoRecord) > 0) {
      $promo = $promoRecord[0];
      $now = time();
      $startDate = strtotime($promo->start_time);
      $endDate = strtotime($promo->end_time);
        //if code is has not been used and within time constraint, and never be used
        if ((($promo->isOnce && $promo->number_used == 0) || !$promo->isOnce ) &&
              ($now >= $startDate && $now <= $endDate) && $usedTime <= 0) {

          //Activate
          $this->_promo->ActivatePromoteCode($dataArray->code, $dataArray->email);
          $message["error_message"] = "Success";
          $message["error_status"] = false;
          $message["license"] = $promoRecord[0]->license_levels;
        } else {
        $message["error_message"] = "Promo code is not valid";
      }
    } else {
      $message["error_message"] = "Promo code not exist";
    }
    return json_encode( $message, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK );
  }



}

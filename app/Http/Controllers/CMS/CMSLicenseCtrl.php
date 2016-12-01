<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSLicenseModel;
use Validator;
use Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;


use App\Model\Utility;
use Illuminate\Http\Request;

class CMSLicenseCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSLicenseModel $license) {
    $this->_user = $user;
    $this->_license = $license;
  }

  public function RegisterEmail(Request $post) {
    $all = $post->all();
    $user_id = $this->_user->GetUserID($all["cms_token"]);
    $post1 = Input::get('email');
    $post2 = $post->input('department');


    $validator = Validator::make($post->all(), [
        'email' => 'Required|Min:3|Max:200|Email',
        'department' => 'Min:1|Max:200|Alpha'
      ]);
    if ($validator->fails()) {
      return redirect ('cms/license')
        ->withErrors($validator)
        ->withInput();
    } else {
      foreach ($post1 as $email) {
        $this->_license->RegisterEmail($user_id,$email,$post2);
      }
      return redirect ('cms/license');
    }
  }

  //Buy more licenses
  public function Charge(Request $post) {
    //Price per key by type (in dollars)
    $pricePerKey[0] = 50;  // Basic
    $pricePerKey[1] = 75;  // Pro
    $pricePerKey[2] = 100; // Pro+

    \Stripe\Stripe::setApiKey("sk_test_hx194iFHfvBWG6Nanzq9dj0d");

    // Get the credit card details submitted by the form
    $token = $_POST['stripeToken'];
    // Get number of keys
    $keyCount = Input::get('purchase');;
    // Get type of key
    $keyType = Input::get('license-type');

    // Calculate total charge amount
    if ($keyType == 0) {
      $amount = $keyCount * ($pricePerKey[0]*10);
    } else if ($keyType == 1) {
      $amount = $keyCount * ($pricePerKey[1]*10);
    } else if ($keyType == 2) {
      $amount = $keyCount * ($pricePerKey[2]*10);
    }

    // Create a charge: this will charge the user's card
    try {
      $charge = \Stripe\Charge::create(array(
        "amount" => $amount, // Amount in cents
        "currency" => "usd",
        "source" => $token,
        "description" => "Example charge"
        ));
    } catch(\Stripe\Error\Card $e) {
      return redirect ('cms/license')
        ->withErrors($e)
        ->withInput();
    }
    $user_id = $this->_user->GetUserID(session('cms.token'));
    $this->_license->AddMoreLicenses($user_id,$keyCount);
    Session::flash('success', 'Successfully purchased additional licenses.');
    return redirect ('cms/license');
  }


  public function LoadPage() {
    $user_data = $this->_user->GetUserData(session('cms.token'));
    $activeLicenses = $this->_license->GetActiveLicenses($user_data->_id);
    $totalLicenses = $this->_license->GetLicenseCount($user_data->_id);
    $availableLicenses = $this->_license->GetAvailableLicenses($user_data->_id);

    return view('cms.license.license',
      ['title' => 'Wrainbo | CMS | License Management',
        "page"=>"license",
        "user_name" => $user_data->name,
        "active_licenses" => $activeLicenses,
        "total_licenses" => $totalLicenses,
        "available_licenses" => $availableLicenses]);
  }
}

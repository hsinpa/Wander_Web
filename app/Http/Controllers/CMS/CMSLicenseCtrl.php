<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSLicenseModel;
use Validator;
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
    require_once('./config.php');

    $token  = $_POST['stripeToken'];

    $customer = \Stripe\Customer::create(array(
        'email' => 'customer@example.com',
        'source'  => $token
    ));

    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => 5000,
        'currency' => 'usd'
    ));

    echo '<h1>Successfully charged $50.00!</h1>';
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

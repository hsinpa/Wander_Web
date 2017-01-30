<?php namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use App\Model\UserModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class DataReceiverCtrl extends Controller {

  function __construct( UserModel $user) {
    $this->_user = $user;
  }

  //FBShare, FBInvite, Donation
  public function SocialMediaUpdate(Request $request) {
    $data = (object) $request->json()->all();
    $this->_user->UserSocialMediaUpdate( $data->guid, $data->column, $data->number);
  }

}

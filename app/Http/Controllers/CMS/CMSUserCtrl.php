<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSLevelModel;

use App\Model\Utility;
use Illuminate\Http\Request;

class CMSUserCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSLevelModel $level) {
    $this->_user = $user;
    $this->_level = $level;
  }

  function register(Request $data) {
    $all = $data->all();
    $userID = $this->_user->Register($all["username"], $all["password"]);

    //Build default level
    $this->_level->BuildDefaultLevel($userID);
  }

  function logout () {
    session()->flush();
    return redirect('cms');
  }

  function login (Request $data) {
    $all = $data->all();
    if ($this->_user->Login($all["username"], $all["password"])) {
        //Enter
        $this->_user->RefreshToken($all["username"]);
        return redirect('cms/level');
    } else {
        //No this account
        return back()->withInput();
    }
  }
}

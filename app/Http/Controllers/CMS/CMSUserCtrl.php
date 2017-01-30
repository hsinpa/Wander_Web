<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSLevelModel;
use App\Model\UserModel;

use App\Model\Utility;
use Illuminate\Http\Request;
use Mail;

class CMSUserCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSLevelModel $level, UserModel $mUser) {
    $this->_user = $user;
    $this->_level = $level;
    $this->_mUser = $mUser;
  }

  public function CreateDummyUser($level, $num ) {
    $email = "";
    for ($i = 0; $i < $num; $i++) {
      $single_email = $this->_mUser->CreateDummyUser($level);
      $email .= $single_email."\n";
    }
    return $email;
  }

  public function CreateYunusUser() {
    // if (($handle = fopen(public_path().'/lib/yunus_player.csv', "r")) !== FALSE) {
    //     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    //         $name = $data[0];
    //         $email = $data[1];
    //
    //         $this->_mUser->CreateCompanyUser($name, $email, 2);
    //
    //     }
    //     fclose($handle);
    // }

    if (($handle = fopen(public_path().'/lib/yunus_player.csv', "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $name = $data[0];
            $email = $data[1];

            $this->_mUser->EditPasswordByEmail("Welcome123", $email);
        }
        fclose($handle);
    }

  //  GetAllByOrganization
  }

  public function SendEmailReminder(Request $request) {
      // $user =  (object)$request->all();
      $user = (object) $request->all();

      Mail::send('email.emailReminder', ['user' => $user],
          function ($m) use ($user) {
            $m->from('wrainbolearning@gmail.com', 'Wrainbo');
            $m->to("team@wrainbo.com", $user->name)->subject('Request for Demo : '.$user->name);
      });
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

<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSSpellEditorModel;
use Validator;


use App\Model\Utility;
use Illuminate\Http\Request;

class CMSSpellEditorCtrl extends Controller {

  function __construct( CMSUserModel $user) {
    $this->_user = $user;
  }

  public function LoadPage(Request $request) {
    $user_id = $this->_user->GetUserID(session('cms.token'));
    $user_data = $this->_user->GetUserData(session('cms.token'));
    if ($request->session()->has('spell-name')) {
      $spell_name = session('spell-name');
    } else {
      $spell_name = "";
    }
    if ($request->session()->has('spell-description')) {
      $spell_description = session('spell-description');
    } else {
      $spell_description = "";
    }
    if ($request->session()->has('spell-icon')) {
      $spell_icon = session('spell-icon');
    } else {
      $spell_icon = "";
    }

    return view('cms.spellEditor.spellEditor',
      ['title' => 'Spell Editor',
        "page"=>"spellEditor",
        "user_name" => $user_data->name,
        "user_id" => $user_data->_id,
        "spell_name" => $spell_name,
        "spell_description" => $spell_description,
        "spell_icon" => $spell_icon,]);
  }
}

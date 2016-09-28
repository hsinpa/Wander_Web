<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSEditorModel;
use Validator;
use Illuminate\Support\Facades\Log;


use App\Model\Utility;
use Illuminate\Http\Request;

class CMSEditorCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSEditorModel $game) {
    $this->_user = $user;
    $this->_game = $game;
  }

  public function LoadPage() {
    $user_id = $this->_user->GetUserID(session('cms.token'));
    $user_data = $this->_user->GetUserData(session('cms.token'));

    return view('cms.editor.editor',
      ['title' => 'Game Editor',
        "page"=>"editor",
        "user_name" => $user_data->name,
        "user_id" => $user_data->_id]);
  }
}

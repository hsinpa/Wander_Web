<?php namespace App\Http\Controllers\CMS;
use App\Http\Controllers\Controller;
use App\Model\CMSUserModel;
use App\Model\CMSEditorModel;
use App\Model\CMSElementEditorModel;
use Validator;
use Illuminate\Support\Facades\Input;


use App\Model\Utility;
use Illuminate\Http\Request;

class CMSElementEditorCtrl extends Controller {

  function __construct( CMSUserModel $user, CMSElementEditorModel $element) {
    $this->_user = $user;
    $this->_element = $element;
  }

  public function LoadPage() {
    $user_id = $this->_user->GetUserID(session('cms.token'));
    $user_data = $this->_user->GetUserData(session('cms.token'));

    return view('cms.elementEditor.elementEditor',
      ['title' => 'Element Editor',
        "page"=>"elementEditor",
        "user_name" => $user_data->name,
        "user_id" => $user_data->_id]);
  }

  public function SendSpell(Request $post) {
    $all = $post->all();
    $post1 = Input::get('spell-name');
    $post2 = Input::get('spell-description');
    $post3 = Input::get('spell-icon');

    session(['spell-name' => $post1]);
    session(['spell-description' => $post2]);
    session(['spell-icon' => $post3]);

    return redirect ('cms/spellEditor');
  }
}

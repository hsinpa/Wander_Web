<?php
namespace App\Model;

use Eloquent;
use DB;
use Illuminate\Support\Facades\Log;

class CMSEditorModel extends Eloquent {
  protected $table = 'CMS_License';
  protected $userTable = 'CMS_User';
  private $sha_key = "wrainbo2016hsin";


}

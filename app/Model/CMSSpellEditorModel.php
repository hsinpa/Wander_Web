<?php
namespace App\Model;

use Eloquent;
use DB;

class CMSSpellEditorModel extends Eloquent {
  function __construct( CMSUserModel $user, CMSSpellEditorModel $spell) {
    $this->_user = $user;
    $this->_spell = $spell;
  }
}

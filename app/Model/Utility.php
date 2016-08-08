<?php

namespace App\Model;

class Utility {

  public static function ParseStringJSON(string $jString) {
      //echo substr($jString, 1, -1);
      return json_decode( $jString );
  }
}

<?php

namespace App\Model;

class Utility {

  public static function ParseStringJSON(string $jString) {
      //echo substr($jString, 1, -1);
      return json_decode( $jString );
  }

  public static function Clamp($current, $min, $max) {
    return max($min, min($max, $current));
  }

  public static function GetHashString($value) {
    $sha_key = "wrainbo2016hsin";
    return hash("sha256", $value.$sha_key);
  }

  public static function SortRanking($dataArray, $selfGuid) {
    $posArrayNum = max(0, min(count($dataArray), 20));
    $topTen = array_slice($dataArray,0, $posArrayNum);
    $index = -1;
    for($i=0;$i<count($dataArray);$i++) {
      if ($dataArray[$i]->guid == $selfGuid) {
        $index = $i;
        break;
      }
    }
    //$clamped = max($min, min($max, $current));
    //If no user record
    if ($index == -1) {
      $dataArray = $topTen;
    } else {
      $upperLimit = max($index, min(count($dataArray), ($index+10)));
      $bottomLimit = max(0, min($index, ($index-10)));
      $dataArray = array_slice($dataArray, $bottomLimit, $upperLimit);
    }
    return json_encode(array("TopTen" => $topTen, "SelfRank"=>$dataArray, "Rank"=>$index),
                              JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
  }

  public static function GenerateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  public static function HashPassword($password) {
    $sha_key = "wrainbo2016hsin";
    return hash("sha256", $password.$sha_key);
  }

  //Append number to an object
  public static function AppendObjectNum($p_object, $key, $num) {
    if (!array_key_exists($key, $p_object)) {
      $p_object[$key] = $num;
    } else {
      $p_object[$key] += $num;
    }
    return $p_object;
  }

  public static function GetFullAppName($string) {
    $title = "Business Venture";
    if ($string == "BizVenture")  {
      $title = "Business Venture";
    } elseif ($string == "BizBattle") {
      $title = "Business Battle";
    }
    return $title;
  }
}

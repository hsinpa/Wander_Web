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
    $posArrayNum = max(0, min(count($dataArray), 10));
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
      $upperLimit = max($index, min(count($dataArray), ($index+4)));
      $bottomLimit = max(0, min($index, ($index-4)));
      $dataArray = array_slice($dataArray, $bottomLimit, $upperLimit);
    }

    return json_encode(array("TopTen" => $topTen, "SelfRank"=>$dataArray, "Rank"=>$index),
                              JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
  }

}

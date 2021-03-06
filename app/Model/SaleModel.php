<?php
namespace App\Model;

use Eloquent;
use DB;

class SaleModel extends Eloquent {
  protected $table = 'Sale';

  public function SaveSale($data, $level_id, $seller) {
      foreach ($data as $value) {
        $q = "INSERT INTO $this->table (round, product, magic_type, quote_quantity,
              sale_quantity, price, level_id, seller, customer)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        DB::insert($q, array ($value["round"], $value["product"], $value["magic_type"],
        $value["quote_quantity"], $value["sale_quantity"], $value["price"], $level_id, $seller,
         $value["customer"] ) );
      }
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;

class Product extends Model
{
    use HasFactory;
    
    static public function productAddToCart($id){
        if(!empty($id) && is_numeric($id)){
            if($product = self::find($id)->toArray()){
              Cart::add($product['id'], $product['title'], $product['price'], 1, array());
              Session::flash("sm",$product['title']." added to cart" );
            }
        }
    }
    
    static public function productUpdateCart($id,$op){
        if(!empty($id) && is_numeric($id)){
            if(!empty($op)){
               if($op === "+"){
                   Cart::update($id,['quantity'=>1]);
               }elseif ($op === "-") {
                     Cart::update($id,['quantity'=>-1]);
                }
            }
        }
    }
}

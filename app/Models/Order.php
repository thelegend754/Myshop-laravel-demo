<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session,Cart;

class Order extends Model
{
    use HasFactory;
    
    static public function saveOrder(){
        $order = new self();
        $order->user_id = Session::get("user_id");
        $order->data = serialize(Cart::getContent()->toArray());
        $order->total = Cart::getTotal();
        $order->save();
        Cart::clear();
    }
}

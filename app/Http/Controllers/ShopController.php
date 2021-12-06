<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart,Session;
use App\Models\Order;


class ShopController extends Controller
{
    static public function addToCart(Request $request){
        Product::productAddToCart($request->product_id);
        
    }
    
    static public function updateCart(Request $request){
        Product::productUpdateCart($request->product_id,$request->op);
    }
    
    static public function showCart(){
        return view('cart');
    }
    
    static public function removeProduct($id){
        Cart::remove($id);
        return redirect('shop/cart');
    }
    
    static public function deleteCart(){
        Cart::clear();
        return redirect('/');
    }
    
    static public function saveOrder(){
        if(Session::has("user_id")){
            if(Cart::isEmpty()){
                return redirect('/');
            }
        Order::saveOrder();
         Session::flash("sm","your order was saved");
         return redirect("/");
        }
    }
    
}

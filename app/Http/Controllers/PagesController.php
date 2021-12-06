<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;

class PagesController extends Controller
{
    static public function getCategories(){
        self::$data['categories'] = Categorie::all()->toArray();
        return view("home",self::$data);

    }
    
    static public function showCatProducts($cat_url){
        $category  = Categorie::where('url', $cat_url)->first()->toArray();
        self::$data['products'] = Product::where('categorie_id',$category['id'] )->get()->toArray();
        return view("products",self::$data);

    }
    
    static public function showProduct($product_url){
        self::$data['product']  = Product::where('url', $product_url)->first()->toArray();
        return view("product",self::$data);
    }
}

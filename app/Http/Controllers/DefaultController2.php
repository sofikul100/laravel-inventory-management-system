<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Auth;
use App\supplier;
use App\unit;
use App\category;
class DefaultController2 extends Controller
{
    public function getproducts(Request $request){
         $category_id = $request->category_id;
         $get_product = product::where('category_id',$category_id)->get();
         return response()->json($get_product);
    }
    public function getstock (Request $request){
         $product_id = $request->product_id;
         $stock = product::where('id',$product_id)->first()->quantity;
         return response()->json($stock);
         
    }
}

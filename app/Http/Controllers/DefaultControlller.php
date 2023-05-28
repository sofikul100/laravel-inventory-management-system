<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Auth;
use App\supplier;
use App\unit;
use App\category;
class DefaultControlller extends Controller
{
   public function getcategory (Request $request){
            $category = $request->supplier_id;
            $get_category = product::with(['category'])->select('category_id')->where('supplier_id',$category)->groupBy('category_id')->get();
            //dd($get_category->toArray());
            return response()->json($get_category);
   }
   public function getproduct (Request $request){
          $product = $request->category_id;
          $all_product = product::where('category_id',$product)->get();
          return response()->json($all_product);
   }
}

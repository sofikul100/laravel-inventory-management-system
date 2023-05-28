<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use Auth;
use App\supplier;
use App\unit;
use App\category;
class ProductController extends Controller
{
      public function view (){
          $product_view = product::all();
          return view ('product.product_view',compact('product_view'));
      }
      public function add (){
          $data['suppliers']=supplier::all();
          $data['units'] = unit::all();
          $data['categories'] = category::all();
          return view ('product.product_add_form',$data);
      }
      public function store (Request $request){
           $product_store = new product();
           $product_store->supplier_id = $request->supplier;
           $product_store->unit_id     = $request->unit;
           $product_store->category_id = $request->category;
           $product_store->quantity = '0';
           $product_store->name     = $request->name;
           $product_store->created_by = Auth::user()->id;
           $product_store->save();
        $massage = array(
            'massage' => 'Product Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.view')->with($massage);
      }
      public function edit ($id){
            
            $product_edit = product::find($id);
              $data['suppliers'] = supplier::all();
              $data['units'] = unit::all();
              $data['categories'] = category::all();
            return view ('product.product_edit_form',$data,compact('product_edit'));
      }
      public function update (Request $request,$id){
        $product_update = product::find($id);
        $product_update->supplier_id = $request->supplier;
        $product_update->unit_id     = $request->unit;
        $product_update->category_id = $request->category;
        $product_update->quantity = '0';
        $product_update->name     = $request->name;
        $product_update->updated_by = Auth::user()->id;
        $product_update->save();
        $massage = array(
            'massage' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.view')->with($massage);
      }
      public function delete($id){
           $product_delete = product::find($id);
           $product_delete->delete();
        $massage = array(
            'massage' => 'Product deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.view')->with($massage);
      }
}

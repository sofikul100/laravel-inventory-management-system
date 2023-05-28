<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use PDF;
use DB;
use App\category;
use App\supplier;
use App\unit;
class StockController extends Controller
{
    public function stock_report (){
        $products = product::all();
        return view ('stock.stock_report_view',compact('products'));
    }

    public function stock_download(){
      $data['products'] = DB::table('products')->get();
	  $pdf = PDF::loadView('stock.stock_download', $data);
	  $pdf->SetProtection(['copy', 'print'], '', 'pass');
	  return $pdf->stream('document.pdf');
    }

    public function proudct_supplier_wise_report (){
        $supplier = supplier::all();
        $category = category::all();
        return view ('stock.product_supplier_wise_view',compact('supplier','category'));
    }
    public function supplier_wise_pdf (Request $request){
        $data['supplier'] = product::orderBy('supplier_id','asc')->orderBy('category_id','asc')->where('supplier_id',$request->supplier_id)->get();
        $pdf = PDF::loadView('stock.supplier_wise_PDF', $data);
	   $pdf->SetProtection(['copy', 'print'], '', 'pass');
	   return $pdf->stream('document.pdf');
    }
    public function category_wise_pdf (Request $request){
       $data['category'] = product::where('category_id',$request->product_id)->get();
       $pdf = PDF::loadView('stock.category_wise_PDF', $data);
	   $pdf->SetProtection(['copy', 'print'], '', 'pass');
	   return $pdf->stream('document.pdf'); 
    }
}

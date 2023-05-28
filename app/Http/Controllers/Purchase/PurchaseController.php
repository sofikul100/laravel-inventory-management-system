<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\purchase;
use Auth;
use App\category;
use App\supplier;
use App\unit;
use App\product;
use DB;
use PDF;
class PurchaseController extends Controller
{
     public function view (){
          $purchase_view = purchase::orderBy('date','desc')->orderBy('id','desc')->get();
          return view ('purchase.purchase_view',compact('purchase_view'));
     }
     public function add (){
         $supplier_view = supplier::all();
         return view ('purchase.purchase_add_form',compact('supplier_view'));
     }
     public function store (Request $request){
          if($request->category_id == null){
               $massage = array(
            'massage' => ' Sorry ! Your do not add any item',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($massage);
          }else{
             $category_count = count($request->category_id);
             for($i = 0; $i < $category_count; $i++){
                 $category_store  = new purchase();
                 $category_store->date = date('Y-m-d',strtotime($request->date[$i]));
                 $category_store->purchase_no     = $request->purchase_no[$i];
                 $category_store->supplier_id     = $request->supplier_id[$i];
                 $category_store->product_id      = $request->product_id[$i];
                 $category_store->category_id     = $request->category_id[$i];
                 $category_store->description     = $request->description[$i];
                 $category_store->buying_quantity = $request->psc_kg[$i];
                 $category_store->unit_price      = $request->single_product_price[$i];
                 $category_store->buying_price    = $request->total_price[$i];
                 $category_store->status          = "0";
                 $category_store->created_by = Auth::user()->id;

                 $category_store->save();
                    $massage = array(
                    'massage' => ' your purchase save successfully',
                    'alert-type' => 'success'
                    );
                  
             } 
          }
          return redirect()->back()->with($massage);
     }

     public function delete($id){
          $purchase_delete = purchase::find($id);
          $purchase_delete->delete();
          $massage = array(
          'massage' => ' your purchase deleted successfully',
          'alert-type' => 'success'
          );
          return redirect()->back()->with($massage);
     }
     public function approve(){
          $purchase_view = purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
          return view ('purchase.purchase_approve',compact('purchase_view'));
     }
     public function approved_stock ($id){
         $approve = purchase::find($id);
         //this code for stock 
         $stock = product::where('id',$approve->product_id)->first();
         $stock_sum = ((float)$approve->buying_quantity) + ((float) $stock->quantity);
         $stock->quantity = $stock_sum;
         if($stock->save()){
              DB::table('purchases')->where('id',$id)->update(['status'=> 1]);
         }
           $massage = array(
          'massage' => ' your purchase Approved successfully',
          'alert-type' => 'success'
          );
          return redirect()->back()->with($massage);
     }
 


     public function parchase_report (){
          return view ('Purchase.daily_parchase_report');
     }

     public function purchase_pdf (Request $request){
           $start_date = date('Y,m,d',strtotime($request->start_date));
         $end_date   = date('Y,m,d',strtotime($request->end_date));
         $data['start_date'] = date('Y-m-d',strtotime($request->start_date));
         $data['end_date']   = date('Y-m-d',strtotime($request->end_date));
         $data['alldata'] = purchase::whereBetween('date',[$start_date,$end_date])->where('status','1')->get();
         $pdf = PDF::loadView('Purchase.parchase_report_PDF', $data);
	     return $pdf->stream('document.pdf');
     }

}

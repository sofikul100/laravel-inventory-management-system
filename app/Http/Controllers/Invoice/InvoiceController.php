<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\purchase;
use Auth;
use App\category;
use App\supplier;
use App\unit;
use App\product;
use DB;
use App\invoice;
use App\customer;
use App\invoice_deteils;
use App\payment;
use App\payment_deteils;
use PDF;
class InvoiceController extends Controller
{
    public function view (){
        $invoice_view = invoice::orderBy('date','desc')->orderBy('id','desc')->where('status',1)->get();
        return view ('invoice.invoice_view',compact('invoice_view'));
    }
    public function add(){
        $data['categorys'] = category::all();
        ///automatic number generate 
        $invoice_data = invoice::orderBy('id','desc')->first();
        if($invoice_data == null){
            $firstReg = "0";
            $data['invoice_no'] = $firstReg + 1;
        }else{
            $invoice_data = invoice::orderBy('id','desc')->first()->invoice_no;
            $data['invoice_no'] = $invoice_data  + 1;    
        }
        $data['customers'] = customer::all();
        return view ('invoice.invoice_add',$data);
    }
    public function store (Request $request){
           if($request->category_id == null){
             $massage = array(
            'massage' => ' Sorry ! Your do not add any item',
            'alert-type' => 'error'
                  );
               return redirect()->back()->with($massage);     
           }else{
              //check total_prices and partial_paid
              if($request->total_prices < $request->partial_paid){
                   $massage = array(
                    'massage' => ' Sorry ! partial_amount can not be grather than total_prices',
                    'alert-type' => 'error'
                        );
                 return redirect()->back()->with($massage); 
              }else{
                  $invoice = new invoice();
                  $invoice->invoice_no = $request->invoice_no;
                  $invoice->date= date('Y-m-d',strtotime($request->date));
                  $invoice->description   = $request->description;
                  $invoice->status        = "0";
                  $invoice->created_by    = Auth::user()->id;
                  
                  DB::transaction(function () use($request,$invoice) {
                         if($invoice->save()){
                             //counting category_id
                             $category_count = count($request->category_id);
                             for($i = 0; $i < $category_count;$i++){
                                 $invoice_deteils = new invoice_deteils();
                                 $invoice_deteils->invoice_id = $invoice->id;
                                 $invoice_deteils->date = date('Y-m-d',strtotime($request->date));
                                 $invoice_deteils->category_id = $request->category_id[$i];
                                 $invoice_deteils->product_id  = $request->product_id[$i];
                                 $invoice_deteils->quantity    = $request->psc_kg[$i];
                                 $invoice_deteils->single_product_price =$request->single_product_price[$i];
                                 $invoice_deteils->total = $request->total_price[$i];
                                 $invoice_deteils->status = "0";
                                 $invoice_deteils->save();
                             }
                             if($request->customer_id == "0"){
                                 $customer = new customer();
                                 $customer->name = $request->name;
                                 $customer->phone = $request->phone;
                                 $customer->email = $request->email;
                                 $customer->address = $request->address;
                                 $customer->save();
                                 $customer_id = $customer->id;
                             }else{
                                 $customer_id = $request->customer_id; 
                             }
                             //payment model call
                             $payment = new payment();
                            $payment_deteils = new payment_deteils();
                             $payment->invoice_id  = $invoice->id;
                             $payment->customer_id = $customer_id;
                             $payment->paid_status = $request->paid_status;
                             $payment->discount_amount =$request->discount;
                             $payment->total_amount    = $request->total_prices;
                             if($request->paid_status == "full_paid"){
                                 $payment->paid_amount = $request->total_prices;
                                 $payment_deteils->current_paid_amount  = $request->total_prices;
                                 $payment->due_amount  = "0";

                             }elseif($request->paid_status == "full_due"){
                                  $payment->paid_amount = "0";
                                  $payment_deteils->current_paid_amount = "0";
                                  $payment->due_amount =$request->total_prices;

                             }elseif($request->paid_status == "partial_paid"){
                                      $payment->paid_amount = $request->partial_paid;
                                      $payment_deteils->current_paid_amount = $request->partial_paid;
                                      $payment->due_amount =  $request->total_prices - $request->partial_paid; 
                             }
                             $payment->save();
                             $payment_deteils->invoice_id = $invoice->id;
                             $payment_deteils->date = date('Y-m-d',strtotime($request->date));
                             $payment_deteils->save();
                         }
                  });
                  
              }
           }
            $massage = array(
            'massage' => 'your data save successfully',
            'alert-type' => 'success'
            );
          return redirect()->back()->with($massage); 

    }

    public function approve(){
        $invoice_approve = invoice::orderBy('date','desc')->orderBy('id','desc')->where('status',0)->get();
        return view ('invoice.invoice_approve',compact('invoice_approve'));
    }
    public function delete ($id){
        $invoice_delete = invoice::find($id);
        invoice_deteils::where('invoice_id',$id)->delete();
        payment::where('invoice_id',$id)->delete();
        payment_deteils::where('invoice_id',$id)->delete();
        $invoice_delete->delete();
        $massage = array(
            'massage' => 'your data delete successfully',
            'alert-type' => 'success'
            );
          return redirect()->back()->with($massage); 
    }
    public function approve_click ($id){
        $invoice_approve_click = invoice::find($id);
        return view ('invoice.invoice_page',compact('invoice_approve_click'));
    }

    //stock management stystem
    public function approvestore(Request $request,$id){
         foreach($request->quantity as $key => $val){
              $invoice_deteils = invoice_deteils::where('id',$key)->first();
               $product = product::where('id',$invoice_deteils->product_id)->first();
               if($product->quantity < $invoice_deteils->quantity){
                    $massage = array(
                    'massage' => 'you are not buy product graher than current stock',
                    'alert-type' => 'error'
                     );
                     return redirect()->back()->with($massage); 
              }
            }
              $invoice = invoice::find($id);
              $invoice->approve_by = Auth::user()->id;
              $invoice->status     = "1";
              
              DB::transaction(function () use($request,$invoice,$id){
                 foreach($request->quantity as $key =>$val){
                      $invoice_deteils = invoice_deteils::where('id',$key)->first();
                      $invoice_deteils->status = "1";
                      $invoice_deteils->save();
                      $product = product::where('id',$invoice_deteils->product_id)->first();
                      $product->quantity = ((float)$product->quantity) - ((float)$invoice_deteils->quantity);
                      $product->save();                     
                 }
                 $invoice->save();
              });
              $massage = array(
                    'massage' => 'product save successfully',
                    'alert-type' => 'success'
                     );
             return redirect()->back()->with($massage);
      
            
    }
    //pdf for
    public function invoice_print_view_page (){
        $invoice_pdf = invoice::orderBy('date','desc')->orderBy('id','desc')->where('status',1)->get();
        return view ('invoice.invoice_print_view_page',compact('invoice_pdf'));
    }



    function PrintInvoice($id) {
	$data['invoice_approve_click'] = invoice::find($id);
	$pdf = PDF::loadView('invoice.invoice_pdf_print', $data);
	return $pdf->stream('document.pdf');
    }




    public function search_invoice (){
        return view ('invoice.search_invoice');
    }
    public function invoice_show (Request $request){
         $start_date = date('Y,m,d',strtotime($request->start_date));
         $end_date   = date('Y,m,d',strtotime($request->end_date));
         $data['start_date'] = date('Y-m-d',strtotime($request->start_date));
         $data['end_date']   = date('Y-m-d',strtotime($request->end_date));
         $data['alldata'] = invoice::whereBetween('date',[$start_date,$end_date])->where('status','1')->get();
         $pdf = PDF::loadView('invoice.date_according_invoice', $data);
	     return $pdf->stream('document.pdf');
    }

}
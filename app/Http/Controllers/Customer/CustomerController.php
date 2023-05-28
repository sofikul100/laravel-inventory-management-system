<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\customer;
use Auth;
use App\payment;
use App\payment_deteils;
use PDF;
class CustomerController extends Controller
{
    public function view()
    {
        $customer_view = customer::all();
        return view('customer.customer_view', compact('customer_view'));
    }
    public function add()
    {
        return view('customer.customer_add_form');
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|min:11',
            'address' => 'required'
        ]);
        $customer_add = new customer();
        $customer_add->name = $request->name;
        $customer_add->email = $request->email;
        $customer_add->phone = $request->phone;
        $customer_add->address = $request->address;
        $customer_add->created_by = Auth::user()->id;
        $customer_add->save();
        $massage = array(
            'massage' => 'customer Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.view')->with($massage);
    }
    public function edit($id)
    {
        $customer_edit = customer::find($id);
        return view('customer.customer_edit', compact('customer_edit'));
    }
    public function update(Request $request, $id)
    {
        $customer_update = customer::find($id);
        $customer_update->name = $request->name;
        $customer_update->email = $request->email;
        $customer_update->phone = $request->phone;
        $customer_update->address = $request->address;
        $customer_update->updated_by = Auth::user()->id;
        $customer_update->save();
        $massage = array(
            'massage' => 'customer Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.view')->with($massage);
    }
    public function delete($id)
    {
        $customer_delete = customer::find($id);
        $customer_delete->delete();
        $massage = array(
            'massage' => 'customer Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('customer.view')->with($massage);
    }


    public function credit_customer (){
       $payment = payment::whereIn('paid_status',['full_due','partial_paid'])->get();
        return view ('customer.customer_credit_page',compact('payment'));
    }

    public function download_pdf_customer (){
         $data['payment'] = payment::whereIn('paid_status',['full_due','partial_paid'])->get();
         $pdf = PDF::loadView('customer.customer_pdf_download', $data);
	     return $pdf->stream('document.pdf');
    }

    public function credit_customer_edit($id){
       $payment = payment::where('id',$id)->first();
       return view ('customer.customer_credit_edit',compact('payment'));
    }

    public function dueamount(Request $request,$id){
        if($request->paid_amount > $request->full_due_amount){
            $massage = array(
            'massage' => 'your amount is big than previous due amount',
            'alert-type' => 'error'
             );
          return redirect()->back()->with($massage);
        }else{
          $payment= payment::where('invoice_id',$id)->first();
          $payment_update = new payment_deteils();

          if($request->paid_status == "full_due"){
              $payment->paid_amount = $payment->paid_amount + $request->full_due;
              $payment->due_amount  = "0";
              $payment_update->current_paid_amount =  $request->full_due;
          }elseif($request->paid_status == "partial_paid"){
              $payment->paid_amount = $payment->paid_amount + $request->paid_amount;
              $payment->due_amount  = $payment->due_amount - $request->paid_amount;
              $payment_update->current_paid_amount = $request->paid_amount;
              $payment->paid_status = $request->paid_status;
          }

          $payment->save();
          $payment_update->date = date('Y-m-d',strtotime($request->date));
          $payment_update->invoice_id = $id;
          $payment_update->updated_by = Auth::user()->id;
          $payment_update->save();
        }
            $massage = array(
            'massage' => 'Successfully',
            'alert-type' => 'success'
             );
          return redirect()->back()->with($massage);
    }



    public function due_summary ($id){
     $data['payment'] = payment::where('invoice_id',$id)->first();
     $pdf = PDF::loadView('customer.customer_due_summary', $data);
	     return $pdf->stream('document.pdf');
    }

    public function paid_customer (){
        $payment = payment::where('paid_status' ,'!=' ,'full_due')->get();
        return view ('customer.paid_customer_list',compact('payment'));
    }

    public function customer_paid_list_pdf ($id){
        $data['payment'] = payment::where('invoice_id',$id)->first();
        $pdf = PDF::loadView('customer.customer_paid_list_pdf', $data);
	     return $pdf->stream('document.pdf');
    }


    public function customer_report (){
        $customer = customer::all();
        return view('customer.customer_wise_report',compact('customer'));
    }

    public function credit_customer_report (Request $request){
         $data['payment'] = payment::where('customer_id',$request->credit_customer)->first();
        $pdf = PDF::loadView('customer.credit_customer_report_select', $data);
	     return $pdf->stream('document.pdf');
    }

    public function paid_customer_report_pdf (Request $request){
         $data['payment'] = payment::where('customer_id',$request->paid_customer)->first();
        $pdf = PDF::loadView('customer.paid_customer_report_select', $data);
	     return $pdf->stream('document.pdf');
    }


}

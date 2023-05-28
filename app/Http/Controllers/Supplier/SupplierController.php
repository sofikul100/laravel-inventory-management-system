<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\supplier;
use Auth;
class SupplierController extends Controller
{
     public function view (){
         $supplier_view = supplier::all();
         return view ('supplier.supplier_view',compact('supplier_view'));
     }
     public function add (){
          return view ('supplier.supplier_add_form');
     }
     public function store (Request $request){
          $validation = $request->validate([
              'name'=>'required',
              'phone'=>'required|numeric|min:11',
              'email'=>'required|email|unique:suppliers,email',
              'address'=>'required'
          ]);
          $supplier_add = new supplier();
          $supplier_add->name = $request->name;
          $supplier_add->email = $request->email;
          $supplier_add->phone = $request->phone;
          $supplier_add->address = $request->address;
          $supplier_add->created_by = Auth::user()->id;
          $supplier_add->save();
        $massage = array(
            'massage' => 'Supplier Add Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('supplier.view')->with($massage);
     }
     public function edit($id){
          $supplier_edit = supplier::find($id);
          return view ('supplier.supplier_edit',compact('supplier_edit'));
     }
    public function update(Request $request,$id)
    {
        $supplier_update = supplier::find($id);
        $supplier_update->name = $request->name;
        $supplier_update->email = $request->email;
        $supplier_update->phone = $request->phone;
        $supplier_update->address = $request->address;
        $supplier_update->updated_by = Auth::user()->id;
        $supplier_update->save();
        $massage = array(
            'massage' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('supplier.view')->with($massage);
    }
    public function delete($id){
        $supplier_delete = supplier::find($id);
        $supplier_delete->delete();
        $massage = array(
            'massage' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('supplier.view')->with($massage);
    }
}

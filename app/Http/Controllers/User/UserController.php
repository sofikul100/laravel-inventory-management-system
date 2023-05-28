<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
class UserController extends Controller
{
    public function view (){
        $user_view = User::all();
        return view ('user.user_view',compact('user_view'));
    }
    public function add (){
        $user_type = Role::all();
        return view ('user.user_add_form',compact('user_type'));
    }
    public function store (Request $request){
         $validation = $request->validate([
             'name'=>'required',
             'user_type'=>'required',
             'email'=>'required|unique:Users,email|email',
             'password'=>'required|min:6'
         ]);
         $user_store = new User();
         $user_store->name = $request->name;
         $user_store->user_type = $request->user_type;
         $user_store->email     = $request->email;
         $user_store->password  = bcrypt($request->password);
         $user_store->save();
         $massage=array(
             'massage'=>'Add Successfully',
             'alert-type'=>'success'
         );
        return redirect()->route('user.view')->with($massage);
    }
    public function edit ($id){
       $user_edit =User::find($id);
       $user_type = Role::all();
       return view ('user.user_edit_form',compact('user_edit','user_type'));
    }
    public function update(Request $request,$id)
    {
        // $validation = $request->validate([
        //     'name' => 'required',
        //     'user_type' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        $user_update =  User::find($id);
        $user_update->name = $request->name;
        $user_update->user_type = $request->user_type;
        $user_update->email     = $request->email;
        $user_update->save();
        $massage = array(
            'massage' => 'updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($massage);
    }
    public function delete ($id){
          $user_delete = User::find($id);
          $user_delete->delete();
        $massage = array(
            'massage' => 'deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($massage);
    }
}

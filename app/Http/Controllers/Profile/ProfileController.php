<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
class ProfileController extends Controller
{
   public function view (){
      $profile_view = User::find(Auth::user()->id);
      return view ('profile.profile_view',compact('profile_view'));
   }
   public function edit ($id){
       $profile_edit = User::find($id);
      return view ('profile.profile_edit_form',compact('profile_edit'));
   }
   public function update(Request $request,$id){
        $validation = $request->validate([
            'name'=>'required',
            'phone'=>'required|numeric',
            'address'=>'required',
            'email'=>'required|email',
            'photo'=>'required',
        ]);
        $profile_update = User::find($id);
        $profile_update->name = $request->name;
        $profile_update->phone = $request->phone;
        $profile_update->address =$request->address;
        $profile_update->email = $request->email;
        if($request->file('photo')){
            $image = $request->file('photo');
            @unlink(public_path('pos/image/profile_images/'.$profile_update->photo));
            $convert = date('YmdHi').".".$image->getClientOriginalExtension();
            $image->move(public_path('pos/image/profile_images/'),$convert);
            $profile_update['photo']=$convert;
        }
        $profile_update->save();
        $massage = array(
            'massage' => 'deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.view')->with($massage);
    }
    public function passwordform(){
        return view ('profile.password_change_form');
    }
    public function password_update (Request $request){
           $validation = $request->validate([
               'current_password'=>'required',
               'new_password'=>'required|min:6',
               'confirm_password'=> 'required_with:new_password|same:new_password|required',
           ]);
        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])){
           
           $change = User::find(Auth::user()->id);
           $change->password = bcrypt($request->confirm_password);
           $change->save();
            $massage = array(
                'massage' => 'Your password change successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('profile.view')->with($massage);
        }else{
            $massage = array(
                'massage' => 'your current password not match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($massage);
        }
    }


   }


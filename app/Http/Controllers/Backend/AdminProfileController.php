<?php

namespace App\Http\Controllers\Backend;
use App\Models\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminProfileController extends Controller
{
   public function AdminProfile(){
    $adminData = Admin::find(1);
    return view('admin.admin_profile_view', compact('adminData'));
   }

   public function AdminProfileEdit(){
    $adminData = Admin::find(1);
    return view('admin.admin_profile_edit', compact('adminData'));
   }

   public function AdminProfileStore(Request $request){
    $data = Admin::find(1);
    $data->name = $request->name;
    $data->email = $request->email;

    if($request->file('profile_photo_path')){
        $file = $request->file('profile_photo_path');
        @unlink(public_path('uploads/admin_images/'.$data->profile_photo_path));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('uploads/admin_images'), $filename);
        $data['profile_photo_path'] = $filename;
    }

    $data->save();

    $notification = array(
        'message'  =>  'Admin Profile Updated Successfully',
        'alert-type'  =>  'success'
    );

    return redirect()->route('admin.profile')->with($notification);

   }

   public function AdminChangePassword(){
    return view('admin.admin_change_password');
   }

   public function AdminUpdatePassword(Request $request){
    $validated = $request->validate([
        'current_password' =>  'required',
        'password' =>  'required|confirmed',
    ]);

    $hashedPassword = Admin::find(1)->password;
    if (Hash::check($request->current_password,$hashedPassword)) {
        $admin = Admin::find(1);
        $admin->password = Hash::make($request->password);
        $admin->save();
        Auth::logout();
        return redirect()->route('admin.logout');
    }else{
        $notification = array(
            'message' => 'password not updated',
            'alert-type' => 'error',
        );

        return redirect()->back()->with($notification);
    }
   }

}

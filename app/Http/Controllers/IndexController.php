<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Index(){
        return view('frontend.index');
    }

    public function UserLogout(){
        Auth::logout();

        return redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->profile_photo_path){
            $image = $request->profile_photo_path;
            @unlink(public_path('uploads/user_images/'.$user->profile_photo_path));
            $img_name = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path('uploads/user_images'), $img_name);
            $user['profile_photo_path'] = $img_name;
        }
        $user->save();

        $notification =array(
            'message'       => 'User Profile Updated Successfully',
            'alert-type'    => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function UserChangePassword(){
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function UserUpdatePassword(Request $request){
        $validated = $request->validate([
            'oldpassword'   => 'required',
            'password'      => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('user.logout');
        }else{
            $notification = array(
                'message'       => 'Current Password Not Matched',
                'alert-type'    => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.home');
    }
    public function ChangePassword()
    {
        return view('admin.auth.passwordchange');
    }

    public function Update_pass(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=Admin::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();  
                      $notification = array(
                        'message' => 'رمز با موفقیت تغییر داده شد',
                        'alert-type' => 'success'
                         );
                       return Redirect()->route('admin.login')->with($notification); 
                 } else {
                     $notification = array(
                        'message' => 'رمز عبور جدید و تأیید رمز عبور مطابقت ندارند!',
                        'alert-type' => 'error'
                         );
                       return Redirect()->back()->with($notification);
                 }     
      } else {
        $notification = array(
                'message' => 'رمز عبور قدیمی مطابقت ندارد!',
                'alert-type' => 'error'
                 );
               return Redirect()->back()->with($notification);
      }
    }

    public function Logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'با موفقیت خارج شدید',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.login')->with($notification);
    }
}
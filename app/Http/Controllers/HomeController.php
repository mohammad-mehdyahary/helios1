<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function changePassword(){
        return view('auth.changepassword');
    }

    public function updatePassword(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpass;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=User::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();  
                      $notification=array(
                        'message'=>'رمز عبور با موفقیت تغییر کرد! اکنون با رمز عبور جدید خود وارد شوید',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('login')->with($notification); 
                 }else{
                     $notification=array(
                        'message'=>'رمز عبور جدید و تأیید رمز عبور مطابقت ندارند!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }     
      }else{
        $notification=array(
                'message'=>'رمز عبور قدیمی مطابقت ندارد!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }

    }

    public function Logout()
    {
        // Auth::logout();
        Auth::logout();
        $notification = array(
            'message' => 'با موفقیت خارج شدید',
            'alert-type' => 'success'
        );
        return Redirect()->route('login')->with($notification);
    }
}

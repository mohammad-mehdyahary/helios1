<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function AdminSiteSetting()
    {
        $setting = DB::table('sitesetting')->first();
        return view('admin.setting.site_setting',compact('setting'));
    }
    public function UpdateSiteSetting(Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['email'] = $request->email;
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['instagram'] = $request->instagram;
        $data['telegram'] = $request->telegram;
        DB::table('sitesetting')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'تنظیمات با موفقیت آپدیت شد',
            'alert-type' => 'success'
             );
           return Redirect()->back()->with($notification);
    }
}

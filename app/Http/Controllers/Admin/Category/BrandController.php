<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Admin\Brand;
use DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function brand()
    {
        $brand = Brand::all();
        return view('admin.category.brand',compact('brand'));
    }
    public function storebrand(Request $request)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|max:55',

        ]);
        $data=array();
        $data['brand_name']=$request->brand_name;
        $image = $request->file('brand_logo');
        // DB::table('brands')->insert($data);
           if ($image) {           
               $image_name = date('dmy_H_s_i');
               $ext = strtolower($image->getClientOriginalExtension());
               $image_full_name = $image_name.'.'.$ext;
               $upload_path = 'public/media/brand/';
               $image_url = $upload_path.$image_full_name;
               $success = $image->move($upload_path,$image_full_name);
               
               $data['brand_logo'] = $image_url;
               $brand = DB::table('brands')->insert($data);
               $notification = array(
                    'message' => 'برند با موفقیت اضافه شد',
                    'alert-type' => 'success'
                     );
                   return Redirect()->back()->with($notification);
           } else {
               $brand = DB::table('brands')->insert($data);
               $notification = array(
                'message' => 'انجام شد',
                'alert-type' => 'success'
                 );
               return Redirect()->back()->with($notification);
           }
    }
    public function DeleteBrand($id)
    {
        $data = DB::table('brands')->where('id',$id)->first();
        $image = $data->brand_logo;
        unlink($image);
        $brand = DB::table('brands')->where('id',$id)->delete();
        $notification = array(
            'message' => 'برند با موفقیت حذف شد',
            'alert-type' => 'success'
             );
           return Redirect()->back()->with($notification);
    }
    public function EditBrand($id)
    {
        $brand = DB::table('brands')->where('id',$id)->first();
        return view('admin.category.edit_brand',compact('brand'));
    }
    public function UpdateBrand(Request $request, $id)
    {

        $oldlogo = $request->old_logo;
        $data=array();
        $data['brand_name']=$request->brand_name;
        $image = $request->file('brand_logo');
        // DB::table('brands')->insert($data);
           if ($image) {  
               unlink($oldlogo);         
               $image_name = date('dmy_H_s_i');
               $ext = strtolower($image->getClientOriginalExtension());
               $image_full_name = $image_name.'.'.$ext;
               $upload_path = 'public/media/brand/';
               $image_url = $upload_path.$image_full_name;
               $success = $image->move($upload_path,$image_full_name);
               
               $data['brand_logo'] = $image_url;
               $brand = DB::table('brands')->where('id',$id)->update($data);
               $notification = array(
                    'message' => 'برند با موفقیت بروزرسانی شد',
                    'alert-type' => 'success'
                     );
                   return Redirect()->route('brands')->with($notification);
           } else {
            $brand = DB::table('brands')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'بروزرسانی بدون عکس',
                'alert-type' => 'success'
                 );
                 return Redirect()->route('brands')->with($notification);
                }
    }
}

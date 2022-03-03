<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class WishlistController extends Controller
{
    public function addWishList($id)
    {
        $userid = Auth::id();
        $check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();
        $data = array(
            'user_id' => $userid,
            'product_id' => $id,
        );
        if (Auth::Check()) {
            
            if ($check) {
           return \Response::json(['error' => ' محصول در لیست علاقه مندی های شما قرار دارد']);
               
            } else {
                DB::table('wishlists')->insert($data);
                return \Response::json(['success' => 'محصول به لیست علاقه مند ها اضافه شد']);
            }
            

        } else {
           return \Response::json(['error' => 'ابتدا وارد حساب کاربری خود شوید']);
        }
        
    }
}

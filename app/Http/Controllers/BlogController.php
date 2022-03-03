<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class BlogController extends Controller
{
    public function Blog()
    {
        $post = DB::table('posts')
        ->join('post_category','posts.category_id','post_category.id')
        ->select('posts.*','post_category.category_name_en','post_category.category_name_fa')
        ->get();
        // return response()->json($post);
        return view('pages.blog',compact('post'));
    }
    public function LanguageEn()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','english');
        return redirect()->back();
    }
    public function LanguageFa()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','farsi');
        return redirect()->back();
    }
    public function BlogSingle($id)
    {
        $posts = DB::table('posts')->where('id',$id)->get();
        return view('pages.blog_single',compact('posts'));

    }
}

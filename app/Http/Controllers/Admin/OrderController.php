<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function NewOrder()
    {
        $order = DB::table('orders')->where('status',0)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function ViewOrder($id)
    {
        $order = DB::table('orders')
           ->join('users','orders.user_id','users.id')
           ->select('orders.*','users.name','users.phone')
           ->where('orders.id',$id)
           ->first();
        //    dd($order);
        $shipping = DB::table('shipping')->where('order_id',$id)->first();
        // dd($shipping);
        $detalis = DB::table('orders_detalis')
             ->join('products','orders_detalis.product_id','products.id')
             ->select('orders_detalis.*','products.product_code','products.image_one')
             ->where('orders_detalis.order_id',$id)
             ->get();
            //  dd($detalis);
            return view('admin.order.view_order',compact('order','shipping','detalis'));
    }
    public function PaymentAccept($id)
    {
        DB::table('orders')->where('id',$id)->update(['status'=>1]);
        $notification = array(
            'message' => 'تاییده پرداخت صحیح انجام شد',
            'alert-type' => 'success'
             );
           return Redirect()->route('admin.neworder')->with($notification); 
    }
    public function PaymentCancel($id)
    {
        DB::table('orders')->where('id',$id)->update(['status'=>4]);
        $notification = array(
            'message' => 'سفارش لغو شد',
            'alert-type' => 'success'
             );
             return Redirect()->route('admin.neworder')->with($notification); 
    }
    public function AcceptPayment()
    {
        $order = DB::table('orders')->where('status',1)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function CancelOrder()
    {
        $order = DB::table('orders')->where('status',4)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function ProseccPayment()
    {
        $order = DB::table('orders')->where('status',2)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function SuccessPayment()
    {
        $order = DB::table('orders')->where('status',3)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function DeleveryProcess($id)
    {
        DB::table('orders')->where('id',$id)->update(['status'=>2]);
        $notification = array(
            'message' => 'ارسال به تحویل',
            'alert-type' => 'success'
             );
           return Redirect()->route('admin.accept.payment')->with($notification); 
    }
    public function DeleveryDone($id)
    {

        $product = DB::table('orders_detalis')->where('order_id',$id)->get();
        foreach ($product as $row) {
            DB::table('products')
                ->where('id',$row->product_id)
                ->update(['product_quantity' => DB::raw('product_quantity-'.$row->quantity) ]);

        }

        DB::table('orders')->where('id',$id)->update(['status'=>3]);
        $notification = array(
            'message' => 'محصول تحویل داده شد',
            'alert-type' => 'success'
             );
           return Redirect()->route('admin.success.payment')->with($notification); 
    }
    public function Adminseo()
    {
        $seo = DB::table('seo')->first();
        return view('admin.coupon.seo',compact('seo'));
    }
    public function Updateseo(Request $request)
    {
        $id = $request->id;

        $data = array();
        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['bing_analytics'] = $request->bing_analytics;
        DB::table('seo')->where('id',$id)->Update($data);
        $notification = array(
            'message' => 'سئو با موفقیت آپدیت شد',
            'alert-type' => 'success'
             );
           return Redirect()->back()->with($notification); 
    }
}

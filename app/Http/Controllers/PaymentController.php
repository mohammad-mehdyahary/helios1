<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Cart;
use Session;
use Mail;
use App\Mail\InvoiceMail;
use Shetabit\Multipay\Invoice;


class PaymentController extends Controller
{
    public function PaymentProcess(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['city'] = $request->city;
        $data['city1'] = $request->city1;
        $data['address'] = $request->address;
        $data['zip'] = $request->zip;
        $data['payment'] = $request->payment;
        // dd($data);
         if ($request->payment == 'zarinpal') {
             return view('pages.payment.zarinpal',compact('data'));
         } elseif($request->payment == 'payir') {
            return view('pages.payment.payir',compact('data'));
         }else{
            return view('pages.payment.404',compact('data'));

         }
         
    }
    public function ZarinCharge(Request $request)
    {
        $email = Auth::user()->email;
        $total = $request->total;
        $invoice = new Invoice();
        $invoice -> amount($request->total);

        $payment = Payment::callbackUrl(route('pages.payment.zarinpal',compact('invoice')));

        $payment->purchase($invoice, function($dirver,$transactionId){

        });
        return $payment->pay()->render();


        $data = array();
        $data['user_id'] = Auth::id();
        $data['payment_id'] = $charge->payment_method;
        $data['paying_amount'] = $charge->amount;
        $data['blnc_transection'] = $charge->balance_transaction;
        $data['stripe_order_id'] = $charge->metadata->order_id;
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = mt_rand(100000,999999);

        if (Session::has('coupon')) {
            $data['subtotal'] = Session::get('coupon')['balance'];

        } else {
            $data['subtotal'] = Cart::Subtotal();

        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);

        // mail send to user
        mail::to($email)->send(new InvoiceMail($data));
        // insert shipping
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_city'] = $request->ship_city;
        $shipping['ship_city1'] = $request->ship_city1;
        $shipping['ship_address'] = $request->ship_address;
        DB::table('shipping')->insert($shipping);

        // inser orderdetalis
        $content = Cart::content();
        $details = array();
        foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['singleprice'] = $row->price;
            $details['totalprice'] = $row->qty*$row->price;
            DB::table('order_detalis')->insert($details);
        }
       Cart::destroy();
       if (Session::has('coupon')) {
           Session::forget('coupon');
       } 
       $notification=array(
        'message'=>'پروسه با موفقیت انجام شد',
        'alert-type'=>'success'
         );
       return Redirect()->to('/')->with($notification);
       
    }



    public function payir(Request $request)
    {
       
        $data = array();
        $data['user_id'] = Auth::id();
        
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = mt_rand(100000,999999);

        if (Session::has('coupon')) {
            $data['subtotal'] = Session::get('coupon')['balance'];

        } else {
            $data['subtotal'] = Cart::Subtotal();

        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);

       
        // insert shipping
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_city'] = $request->ship_city;
        $shipping['ship_city1'] = $request->ship_city1;
        $shipping['ship_address'] = $request->ship_address;
        DB::table('shipping')->insert($shipping);

        // inser orderdetalis
        $content = Cart::content();
        $details = array();
        foreach ($content as $row) {
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['singleprice'] = $row->price;
            $details['totalprice'] = $row->qty*$row->price;
            DB::table('order_detalis')->insert($details);
        }
       Cart::destroy();
       if (Session::has('coupon')) {
           Session::forget('coupon');
       } 
       $notification=array(
        'message'=>'پروسه با موفقیت انجام شد',
        'alert-type'=>'success'
         );
       return Redirect()->to('/')->with($notification);
       
    }
    public function SuccessOrderlist()
    {
        $order = DB::table('orders')->where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')->limit(3)->get();
        return view('pages.returnorder',compact('order'));
    }
    public function RequestReturn($id)
    {
        DB::table('orders')->where('id',$id)->update(['return_order'=>1]);
        $notification=array(
            'message'=>'درخواست سفارش انجام شد',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }
}

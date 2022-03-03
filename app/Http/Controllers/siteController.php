<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class siteController extends Controller
{
    public function add_order(Request $request)
    {

        $order = new zarinpal();
        $res = $order->pay($request->price,"myroxo24@gmail.com","0912111111");
        return redirect('https://www.zarinpal.com/pg/StartPay/' . $res);

    }
}

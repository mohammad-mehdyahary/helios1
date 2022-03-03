@extends('layouts.app')


@section('content')
@include('layouts.menubar')

@php 
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;
$vat = $setting->vat;
$cart = Cart::Content();
@endphp
<link rel="stylesheet" href="{{ asset('public/panel/front/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('public/panel/front/css/util.css') }}">

<style>
    /* Variables */
* {
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, sans-serif;
  font-size: 16px;
  -webkit-font-smoothing: antialiased;
  display: flex;
  justify-content: center;
  align-content: center;
  height: 100vh;
  width: 100vw;
}

form {
  width: 30vw;
  height: 12rem;
  min-width: 500px;
  align-self: center;
  box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
    0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
  border-radius: 7px;
  padding: 40px;
}

.hidden {
  display: none;
}

#payment-message {
  color: rgb(105, 115, 134);
  font-size: 16px;
  line-height: 20px;
  padding-top: 12px;
  text-align: center;
}

#payment-element {
  margin-bottom: 24px;
}

/* Buttons and links */
button {
  background: #5469d4;
  font-family: Arial, sans-serif;
  color: #ffffff;
  border-radius: 4px;
  border: 0;
  padding: 12px 16px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  display: block;
  transition: all 0.2s ease;
  box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
  width: 100%;
}
button:hover {
  filter: contrast(115%);
}
button:disabled {
  opacity: 0.5;
  cursor: default;
}

/* spinner/processing state, errors */
.spinner,
.spinner:before,
.spinner:after {
  border-radius: 50%;
}
.spinner {
  color: #ffffff;
  font-size: 22px;
  text-indent: -99999px;
  margin: 0px auto;
  position: relative;
  width: 20px;
  height: 20px;
  box-shadow: inset 0 0 0 2px;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
}
.spinner:before,
.spinner:after {
  position: absolute;
  content: "";
}
.spinner:before {
  width: 10.4px;
  height: 20.4px;
  background: #5469d4;
  border-radius: 20.4px 0 0 20.4px;
  top: -0.2px;
  left: -0.2px;
  -webkit-transform-origin: 10.4px 10.2px;
  transform-origin: 10.4px 10.2px;
  -webkit-animation: loading 2s infinite ease 1.5s;
  animation: loading 2s infinite ease 1.5s;
}
.spinner:after {
  width: 10.4px;
  height: 10.2px;
  background: #5469d4;
  border-radius: 0 10.2px 10.2px 0;
  top: -0.1px;
  left: 10.2px;
  -webkit-transform-origin: 0px 10.2px;
  transform-origin: 0px 10.2px;
  -webkit-animation: loading 2s infinite ease;
  animation: loading 2s infinite ease;
}

@-webkit-keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes loading {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

@media only screen and (max-width: 600px) {
  form {
    width: 80vw;
    min-width: initial;
  }
}
</style>

 <!-- wrapper -->
 <div class="container-login100" >
		<div class=" col-lg-4">
			
				<span class="login100-form-title p-b-37">
		           فاکتور خرید شما
				</span>

				<!-- <div class="cart_items">
							<ul class="cart_list">
                                @foreach($cart as $row)
								<li class="cart_item clearfix">
									
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                    <div class="cart_item_name cart_info_col">
											<div class="cart_item_title"><b>عکس محصول</b> </div>
											<div class="cart_item_text"><img src="{{ asset($row->options->image) }}" style="width: 65px;highte: 65px;"></div>
										</div>
                                    
                                    <div class="cart_item_name cart_info_col">
											<div class="cart_item_title"><b>نام محصول</b></div><br>
											<div class="cart_item_text">{{ $row->name}}</div>
										</div>
                                        @if($row->options->color == NULL)
                                        @else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title"><b>رنگ</b></div><br>
											<div class="cart_item_text">{{ $row->options->color}}</div>
										</div>
                                        @endif
                                        @if($row->options->size == NULL)
                                        @else
                                        <div class="cart_item_size cart_info_col">
											<div class="cart_item_title"><b>سایز</b></div><br>
											<div class="cart_item_text">{{ $row->options->size}}</div>
										</div>
                                        @endif


										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title"><b>تعداد</b></div><br>
                                            
											<div class="cart_item_text">{{ $row->qty }}</div>
                                               
                                            

										</div>


										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title"><b>قیمت</b></div><br>
											<div class="cart_item_text">{{ $row->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title"><b>جمع کل</b></div><br>
											<div class="cart_item_text">{{ $row->price*$row->qty }}</div>
										</div>
                                        
									</div>
								</li>
                                @endforeach
							</ul>
						</div> -->

                        @foreach($cart as $row)
                        <ol class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-start ">
    <div class="ms-2 me-auto">
      <div class="fw-bold"><b>{{ $row->name}}</b></div>قیمت نهایی:
       {{ $row->price*$row->qty }}تومان
    </div>
    <span class="badge bg-success rounded-pill">تعداد:{{ $row->qty }}</span>
    <span class="badge bg-info rounded-pill">سایز:{{ $row->options->size }}</span>
    <span class="badge bg-primary rounded-pill">رنگ:{{ $row->options->color }}</span>
    
  </li>
 
</ol>
@endforeach

                        <ul class="list-group col-lg-12" style="float: right;">
                        @if(Session::has('coupon'))
                        <li class="list-group-item">کل سفارش: <span style="float: right;direction: rtl;">{{ Session::get('coupon')['balance'] }}تومان</span></li>
                        <li class="list-group-item">کد تخفیف: ({{ Session::get('coupon')['name'] }})
                               <a href="{{ route('coupon.remove') }}" class="btn btn-sm btn-danger">X</a>
                           <span style="float: right;direction: rtl;">{{ Session::get('coupon')['discount'] }}تومان</span></li>
                        @else
                        <li class="list-group-item">جمع جزء: <span style="float: right;direction: rtl;">{{ Cart::Subtotal() }}تومان</span></li>

                        @endif
                           
                           
                           <li class="list-group-item" >هزینه پستی : <span style="float: right;direction: rtl;">{{ $charge }}تومان</span></li>
                           <li class="list-group-item">مالیات بر ارزش افزوده : <span style="float: right;direction: rtl;">{{ $vat }}تومان</span></li>
                           @if(Session::has('coupon'))
                           <li class="list-group-item">جمع کل : <span style="float: right;direction: rtl;">{{ Session::get('coupon')['balance'] + $charge + $vat }}تومان</span></li>
                           @else
                           <li class="list-group-item">جمع کل : <span style="float: right;direction: rtl;">{{ Cart::Subtotal() + $charge + $vat }}تومان</span></li>
                           @endif
                        </ul>
		</div>
		<div class=" col-lg-7">
        <form id="payment-form" action="{{ route('payir.charge') }}" method="post">
        @csrf
        <div id="payment-element">
        <!--Stripe.js injects the Payment Element-->
      </div>
      <button id="submit">
        <div class="spinner hidden" id="spinner"></div>
        <input type="hidden" name="shipping" value="{{ $charge }}">
        <input type="hidden" name="vat" value="{{ $vat }}">
        <input type="hidden" name="total" value="{{ Cart::Subtotal() + $charge + $vat }}">

        <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
        <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
        <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
        <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
        <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
        <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">

        <span id="button-text">Pay now</span>
      </button>
      <div id="payment-message" class="hidden"></div>
    </form>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>


@endsection

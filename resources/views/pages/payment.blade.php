@extends('layouts.app')


@section('content')
@include('layouts.menubar')

@php 
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;
$vat = $setting->vat;
@endphp
<link rel="stylesheet" href="{{ asset('public/panel/front/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('public/panel/front/css/util.css') }}">


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
      <div class="fw-bold"><b>{{ $row->name}}</b></div>قیمت:
       {{ $row->price*$row->qty }}تومان
    </div>
    <span class="badge bg-success rounded-pill">تعداد:{{ $row->qty }}</span>
    <span class="badge bg-info rounded-pill">سایز:{{ $row->options->size }}</span>
    <span class="badge bg-primary rounded-pill">رنگ:{{ $row->options->color }}</span>
    
  </li>
 
</ol>
@endforeach

                        <ul class="list-group col-lg-12">
                        @if(Session::has('coupon'))
                        <li class="list-group-item">کل سفارش: <span style="float: right;direction: rtl;">{{ Session::get('coupon')['balance'] }}تومان</span></li>
                        <li class="list-group-item">کد تخفیف: ({{ Session::get('coupon')['name'] }})
                               <a href="{{ route('coupon.remove') }}" class="btn btn-sm btn-danger">X</a>
                           <span style="float: right;direction: rtl;">{{ Session::get('coupon')['discount'] }}تومان</span></li>
                        @else
                        <li class="list-group-item">جمع فاکتور: <span style="float: right;direction: rtl;">{{ Cart::Subtotal() }}تومان</span></li>

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
		<div class=" col-lg-6" style="margin: 1rem">
		<form class="login100-form validate-form"  id="contact_form" action="{{ route('payment.process') }}" method="post">
			@csrf
			<span class="login100-form-title p-b-37">
				مشخصات مشتری
			</span>
			<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
				<input style="direction: rtl;" class="input100 @error('name') is-invalid @enderror" id="name" type="text"  name="name"  required autocomplete="name" autofocus  placeholder="نام و نام خانوادگی">
				
				<span class="focus-input100"></span>
            </div>
			<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
				<input style="direction: rtl;" class="input100 @error('name') is-invalid @enderror" id="phone" type="text"  name="phone"  required autocomplete="name" autofocus  placeholder="تلفن همراه(در دسترس)"  minlength="10" maxlength="11">
				
				<span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
				<input style="direction: rtl;" class="input100 @error('name') is-invalid @enderror" id="email" type="email"  name="email"  required autocomplete="name" autofocus  placeholder="ایمیل">
				
				<span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
                <input style="direction: rtl;" list="State" class="input100 @error('name') is-invalid @enderror" id="city" type="text"  name="city"  required autocomplete="name" autofocus  placeholder="استان">
				<datalist id="State">
					<option value="آذربایجان غربی">
					<option value="آذربایجان شرقی">
					<option value="تهران">
					<!-- <option value=""> -->
					<option value="خراسان رضوی">
					<option value="خراسان جنوبی">
					<option value="اردبیل">
					<option value="زنجان">
					<option value="کردستان">
					<option value="ایلام">
					<option value="مازندران">
					<option value="البرز">
					<option value="اصفهان">
					<option value="اهواز">
					<option value="قم">
					<option value="کرمان">
					<option value="خراسان شمالی">
					<option value="هرمزگان">
					<option value="قزوین">
					<option value="گیلان">
					<option value="همدان">
					<option value="کرمانشاه">
					<option value="لرستان">
					<option value="مرکزی">
					<option value="خوزستان">
					<option value="بوشهر">
					<option value="یزد">
					<option value="سمنان">
					<option value="سیستان و بلوچستان">
					<option value="فارس">
					<option value="چهارمحال و بختیاری">
					<option value="کهکیلویه و بویراحمد">
					<option value="گلستان">  
				</datalist>
                <span class="focus-input100"></span>
            </div>
			<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
				<input style="direction: rtl;" class="input100 @error('name') is-invalid @enderror" id="city1" type="text"  name="city1"  required autocomplete="name" autofocus  placeholder=" شهر(شهرستان) ">
				
				<span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
				<input style="direction: rtl;" class="input100 @error('name') is-invalid @enderror" id="address" type="text"  name="address"  required autocomplete="name" autofocus  placeholder=" آدرس دقیق">
				
				<span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
				<input style="direction: rtl;" class="input100 @error('name') is-invalid @enderror" type="text" id="zip" name="zip"  required autocomplete="name" autofocus  placeholder="کدپستی(بدون فاصله)" minlength="9" maxlength="10">
				
				<span class="focus-input100"></span>
            </div>
              <div class="contact_form_title text-center">
                  پرداخت با
              </div>

              <div class="form-group">
                  <ul class="logos_list text-center">
                      <li><input type="radio" name="payment" value="zarinpal"><img src="{{ asset('public/frontend/images/zplogo.png') }}" style="height:65px; width:65px;"></li>
                      <li><input type="radio" name="payment" value="payir"><img src="{{ asset('public/frontend/images/download.png') }}" style="height:40px; width:70px;"></li>
                  </ul>
              </div>
			<div class="container-login100-form-btn">
				
				<a href="">
					<button style="font-size: 1.3rem;" type="submit" class="login100-form-btn">
						پرداخت 
					</button>
				</a>
			</div>

			

			

			
		</form>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
@endsection

@extends('layouts.app')

@section('content')
@include('layouts.menubar')

@php 
$setting = DB::table('settings')->first();
$charge = $setting->shipping_charge;
$vat = $setting->vat;
@endphp
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">
<!-- Cart -->

<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart_container">
						<div class="cart_title text-center">بررسی</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach($cart as $row)
								<li class="cart_item clearfix">
									<div class="cart_item_image text-center"><br><img src="{{ asset($row->options->image) }}" style="width: 85%;highte: 85%;"></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">نام محصول</div>
											<div class="cart_item_text">{{ $row->name}}</div>
										</div>
                                        @if($row->options->color == NULL)
                                        @else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">رنگ</div>
											<div class="cart_item_text">{{ $row->options->color}}</div>
										</div>
                                        @endif
                                        @if($row->options->size == NULL)
                                        @else
                                        <div class="cart_item_size cart_info_col">
											<div class="cart_item_title">سایز</div>
											<div class="cart_item_text">{{ $row->options->size}}</div>
										</div>
                                        @endif


										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">تعداد</div><br>
                                            <form method="post" action="{{ route('update.cartitem') }}">
                                                @csrf
                                                <input type="hidden" name="productid" value="{{ $row->rowId }}">
                                                <input type="number" name="qty" value="{{ $row->qty }}" style="border-radius: 0.3rem;border-color: rgb(26, 25, 25);padding-left: 0.5rem;width:50px;height: 2rem;">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
                                            </form>

										</div>


										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">قیمت</div>
											<div class="cart_item_text">{{ $row->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">جمع کل</div>
											<div class="cart_item_text">{{ $row->price*$row->qty }}</div>
										</div>
                                        <div class="cart_item_action cart_info_col">
											<div class="cart_item_title"></div><br><br>
                                             <a href="{{ url('remove/cart/'.$row->rowId) }}" class="btn btn-sm btn-danger">X</a>
                                        </div>
									</div>
								</li>
                                @endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total_content" style="padding: 15px;">
                        @if(Session::has('coupon'))

                        @else

                        <h4 style="margin-left: 20px;font-family:'Vazir';direction:rtl;">وارد کردن کد تخفیف</h4>
                          <form action="{{ route('apply.coupon') }}" method="post" style="direction:rtl;">
                          @csrf  
                          <div class="form group col-lg-4" style="direction:rtl;">
                                  <input type="text" name="coupon" class="form-control" require="" placeholder="کد تخفیف را وارد کنید">
                              </div><br>
                              <button type="submit" class="btn btn-primary ml-2" style="direction:rtl;">اعمال</button>
                          </form>
                          @endif
                        </div>
                        <div class="col-12">

                            <ul class="list-group col-lg-6" style="float: right;">
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
                        </div>
                        </div>
                        </div>
						<div class="container-login100-form-btn" style="display:flex;justify-content: center;">
							
							<a href="{{ route('payment.step') }}" style="display:flex;justify-content: center;margin: 2rem;width: 9rem;" class="btn btn-primary">پرداخت</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>

@endsection
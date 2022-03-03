@extends('layouts.app')

@section('content')
@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/cart_responsive.css') }}">
<!-- Cart -->

<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart_container">
						<div class="cart_title text-center">سبد خرید شما</div>
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
                                                <input type="number" name="qty" value="{{ $row->qty }}" style="border-radius: 0.3rem;border-color: silver;padding-left: 0.5rem;width:50px;height: 2rem;border:none;">
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
                                             <a href="{{ url('remove/cart/'.$row->rowId) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
									</div>
								</li>
                                @endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right" style="display: flex;direction:rtl;">
								<div class="order_total_title">کل فاکتور:</div>
								<div class="order_total_amount">{{ Cart::total() }} تومان </div>
							</div>
						</div>

						<div class="cart_buttons" style="display: flex;justify-content: center;">
							
							<a href="{{ route('user.checkout') }}" class="btn btn-primary" >ادامه خرید</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>

@endsection
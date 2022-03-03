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
						<div class="cart_title text-center">محصولات پسندیده ی شما</div>
						<div class="cart_items">
							<ul class="cart_list">
                                @foreach($product as $row)
								<li class="cart_item clearfix">
									<div class="cart_item_image text-center"><br><img src="{{ asset($row->image_one) }}" style="width: 85%;highte: 85%;"></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">نام محصول</div>
											<div class="cart_item_text">{{ $row->product_name}}</div>
										</div>
                                        @if($row->product_color == NULL)
                                        @else
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">رنگ</div>
											<div class="cart_item_text">{{ $row->product_color}}</div>
										</div>
                                        @endif
                                        @if($row->product_size == NULL)
                                        @else
                                        <div class="cart_item_size cart_info_col">
											<div class="cart_item_title">سایز</div>
											<div class="cart_item_text">{{ $row->product_size}}</div>
										</div>
                                        @endif
                                        <div class="cart_item_size cart_info_col">
											<div class="cart_item_title">وضعیت</div><br>
											<a href="{{ url('product/detalist/'.$row->id.'/'.$row->product_name) }}" class="btn btn-primary">جزئیات</a>
											{{-- <a href="" onclick="productview(this.id)" id="{{ $row->id }}" style="height:2.3rem;width:6.3rem;font-size:0.8rem" class="btn btn-primary">افزودن به سبد</a> --}}
										</div>

										


										
									</div>
								</li>
                                @endforeach
							</ul>
						</div>
						
						

					
					</div>
				</div>
			</div>
		</div>
	</div>
    <script src="{{ asset('public/frontend/js/cart_custom.js') }}"></script>

@endsection
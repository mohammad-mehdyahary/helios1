@extends('layouts.app')

@section('content')
@include('layouts.menubar')


<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/shop_responsive.css') }}">
<!-- Home -->


     <!-- <div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">دسته محصولات</h2>
		</div>
	</div> -->

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">دسته بندی ها</div>
							<ul class="sidebar_categories">
                                @php 
                                $category = DB::table('categories')->get();
                                @endphp
								@foreach($category as $cat)
								<li><a href="{{ url('allcategory/'.$cat->id) }}">{{ $cat->category_name }}</a></li>
								@endforeach
							</ul>
						</div>
						
						
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">برندها</div>
							<ul class="brands_list">
                            @php 
                                $brands = DB::table('brands')->get();
                                @endphp
								@foreach($brands as $row)
								
								<li class="brand"><a href="#">{{ $row->brand_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							@foreach ($catname as $row)
								
							<div class="shop_product_count"><span></span>{{ $row->category_name }}</div>
							@endforeach
							<div class="shop_sorting">
								
							</div>
						</div>

						<div class="product_grid row">
							<div class="product_grid_border"></div>

                            @foreach($category_all as $pro)
							<!-- Product Item -->
							<div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($pro->image_one) }}" style="height: 130px;width: 130px;"></div>
								<div class="product_content">
                                @if($pro->discount_price == NULL)
											  <div class="product_price discount" style="direction: rtl;"> {{ $pro->selling_price }}تومان<span></span></div>

											  @else
											  <div class="product_price discount" style="direction: rtl;"> {{ $pro->discount_price }}تومان<span>{{ $pro->selling_price }}تومان</span></div>

											  @endif
									<div class="product_name"><div><a href="{{ url('product/detalist/'.$pro->id.'/'.$pro->product_name) }}" tabindex="0">{{ $pro->product_name}} </a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
								<ul class="product_marks">
												@if($pro->discount_price == NULL)
												<li class="product_mark product_new" style="background: rgb(46, 112, 255);margin-left: 1rem;">جدید</li>
												@else
												<li class="product_mark product_new" style="background: rgb(207, 66, 66);margin-left: 1rem;">
													@php 
                                                       $amount =  $pro->selling_price -  $pro->discount_price;
												       $discount = $amount/ $pro->selling_price*100;

													   @endphp
													{{ intval($discount) }}%
												
												</li>
												@endif												
											</ul>
							</div>
                            @endforeach
							
						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							
							 {{ $category_all->links() }}
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
   
<script src="{{ asset('public/frontend/js/shop_custom.js') }}"></script>

@endsection
@extends('layouts.app')

@section('content')


@include('layouts.menubar')
@include('layouts.slider')

@php 
$featured = DB::table('products')->where('status',1)->orderBy('id','desc')->limit(8)->get();

$trend = DB::table('products')->where('status',1)->where('trend',1)->orderBy('id','desc')->limit(8)->get();
$best = DB::table('products')->where('status',1)->where('best_rated',1)->orderBy('id','desc')->limit(8)->get();
$hot = DB::table('products')
->join('brands','products.brand_id','brands.id')
->select('products.*','brands.brand_name')
->where('products.status',1)->where('hot_deal',1)->orderBy('id','desc')->limit(3)->get();
@endphp

<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">فروش فوق العاده این هفته</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								
								
                            @foreach($hot as $ht)
								<!-- Deals Item -->
								<div class="owl-item deals_item">
									<div class="deals_image"><img loading="lazy" src="{{ asset($ht->image_one)}}" alt=""></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row " style="display: flex;justify-content: space-between">
											<div class="deals_item_category"><a href="#">{{ $ht->brand_name }}</a></div>
										@if($ht->discount_price == NULL)
										@else
										<div class="deals_item_price_a ml-auto" style="direction: rtl;"> {{ $ht->selling_price }} تومان</div>
										@endif
									
										</div>
										<div class="deals_info_line d-flex flex-row " style="display: flex;justify-content: space-between">
											<div class="deals_item_name">{{ $ht->product_name }} </div>
											@if($ht->discount_price == NULL)
										    	<div class="deals_item_price ml-auto" style="direction: rtl;"> {{ $ht->selling_price }} تومان</div>
									       	@else
											@endif
											@if($ht->discount_price != NULL)
										    	<div class="deals_item_price ml-auto" style="direction: rtl;"> {{ $ht->discount_price }} تومان</div>
									       	@else
											@endif
										</div>
										<div class="available">
											<div class="available_line d-flex flex-row " style="display: flex;justify-content: space-between">
												<div class="available_title">موجود: <span>{{ $ht->product_quantity }}</span></div>
												<div class="sold_title ml-auto">قبلا فروخته شده: <span>28</span></div>
											</div>
											<div class="available_bar"><span style="width:70%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center " style="display: flex;justify-content: space-between;margin-top:20px;margin-bottom:10px;">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">عجله کن</div>
												<div class="deals_timer_subtitle">پایان پیشنهاد تا:</div>
											</div>
											<div class="deals_timer_content ml-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer2_hr" class="deals_timer_hr"></div>
														<span>ساعت</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer2_min" class="deals_timer_min"></div>
														<span>دقیقه</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer2_sec" class="deals_timer_sec"></div>
														<span>ثانیه</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								@endforeach

							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">محصولات ویژه</li>
									
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">
                                 @foreach($featured as $row)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img loading="lazy" src="{{ asset( $row->image_one)}}" alt="" style="height:170px;width:180px;"></div>
											<div class="product_content" style="margin: 6px;">
                                              @if($row->discount_price == NULL)
											  <div class="product_price discount" style="direction: rtl;"> {{ $row->selling_price }}تومان<span></span></div>

											  @else
											  <div class="product_price discount" style="direction: rtl;"> {{ $row->discount_price }}تومان<span>{{ $row->selling_price }}تومان</span></div>

											  @endif

												<div class="product_name"><div><a href="{{ url('product/detalist/'.$row->id.'/'.$row->product_name) }}"><button class="btnmaddcart">{{ $row->product_name }}</button></a></div></div>
												<!-- <div class="product_extras">
													
													<button class="product_cart_button addcart" data-id="{{ $row->id }}">افزودن به سبد</button>
												</div> -->
												{{-- <div class="product_extras">
													
													<button id="{{ $row->id }}" class="product_cart_button addcart" data-bs-toggle="modal" data-bs-target="#cartmodal" onclick="productview(this.id)">افزودن به سبد</button>
												</div> --}}
											</div>
									     	<button class="addwishlist" style="border: none;" data-id="{{ $row->id }}">
										    	<div class="product_fav"><i class="fas fa-heart"></i></div>
												</button>

											<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_discount" style="background: rgb(29, 146, 255);">جدید</li>
												@else
												<li class="product_mark product_discount">
													@php 
                                                       $amount =  $row->selling_price -  $row->discount_price;
												       $discount = $amount/ $row->selling_price*100;

													   @endphp
													{{ intval($discount) }}%
												
												</li>
												@endif												
											</ul>
										</div>
									</div>

		@endforeach						

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

		

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
  <!-- ///////////////////////// -->
<!-- Hot New Arrivals -->
<!-- one -->

@php 
$cats = DB::table('categories')->skip(0)->first();
$catid = $cats->id;

$product = DB::table('products')->where('category_id',$catid)->where('status',1)->limit(10)->orderBy('id','DESC')->get();
@endphp
<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title"></div>
							<ul class="clearfix">
								<li class="active">{{ $cats->category_name }}</li>
								
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

									@foreach($product as $row)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img loading="lazy" src="{{ asset( $row->image_one)}}" alt="" style="height:170px;width:180px;"></div>
											<div class="product_content">
                                              @if($row->discount_price == NULL)
											  <div class="product_price discount" style="direction: rtl;"> {{ $row->selling_price }}تومان<span></span></div>

											  @else
											  <div class="product_price discount" style="direction: rtl;"> {{ $row->discount_price }}تومان<span> {{ $row->selling_price }}تومان</span></div>

											  @endif

												<div class="product_name">
													<div>
														<a href="{{ url('product/detalist/'.$row->id.'/'.$row->product_name) }}"><button class="btnmaddcart">{{ $row->product_name }}</button></a>
													</div>
												</div>
												{{-- <div class="product_extras">
													
													<button id="{{ $row->id }}" class="product_cart_button addcart" data-bs-toggle="modal" data-bs-target="#cartmodal" onclick="productview(this.id)">افزودن به سبد</button>
												</div> --}}
											</div>
									     	<button class="addwishlist" style="border: none;" data-id="{{ $row->id }}">
										    	<div class="product_fav"><i class="fas fa-heart"></i></div>
												</button>

											<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_discount" style="background: rgb(29, 146, 255);">جدید</li>
												@else
												<li class="product_mark product_discount">
													@php 
                                                       $amount =  $row->selling_price -  $row->discount_price;
												       $discount = $amount/ $row->selling_price*100;

													   @endphp
													{{ intval($discount) }}%
												
												</li>
												@endif												
											</ul>
										</div>
									</div>

		@endforeach						

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>
										</div>

										
										

							</div>

						
						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- trends -->
	@php 
      $buyget = DB::table('products')
	   ->join('brands','products.brand_id','brands.id')
	   ->select('products.*','brands.brand_name')
	   ->where('status',1)->where('buyone_getone',1)->orderBy('id','DESC')->limit(6)->get();

	@endphp
	<!-- Trends -->

	<div class="trends">
		<div class="trends_background"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title" style="font-family: 'Vazir';"> یکی بخر یکیم ببر</h2>
						<div class="trends_text" style="direction: rtl;"><p style="font-family: 'Vazir';">با خرید هر یک از محصولات هدیه دار یک هدیه از طرف ما دریافت کنید</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">
@foreach($buyget as $row)
							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img loading="lazy" src="{{ asset( $row->image_one ) }}" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">{{ $row->brand_name}}</a></div>
										<div class="trends_info clearfix" >
											<div class="trends_name" style="width: 100%;justify-content: center;display:flex;"><a href="#">{{ $row->product_name }}</a></div>
											@if($row->discount_price == NULL)
											  <div class="product_price discount" style="display:flex;justify-content: center;direction:rtl;padding-top:10px;"> {{ $row->selling_price }}تومان<span></span></div>

											  @else
											  <div class="product_price discount" style="display:flex;justify-content: center;direction:rtl;padding-top:10px;"> {{ $row->discount_price }}تومان<span> {{ $row->selling_price }}تومان</span></div>

											  @endif
											  
                                            <a href="{{ url('product/detalist/'.$row->id.'/'.$row->product_name) }}" style="display:flex;justify-content: center; margin-top:1rem;" class="btn btn-primary">جزئیات محصول</a>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_new" style="background:rgb(247, 61, 61);">
											<lord-icon
											src="https://cdn.lordicon.com/xhbsnkyp.json"
											trigger="loop"
											colors="outline:#e4e4e4,primary:#8930e8,secondary:#bcee66"
												delay="3000"
												
												style="width:36px;height:36px">
											</lord-icon></li>
									</ul>
									<button class="addwishlist" data-id="{{ $row->id }}" style="border:none;">
						    			<div class="trends_fav"><i class="fas fa-heart"></i></div>
                                    </button>
								</div>
							</div>
@endforeach
							

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- two -->

	@php 
$cats = DB::table('categories')->skip(1)->first();
$catid  =$cats->id;

$product = DB::table('products')->where('category_id',$catid)->where('status',1)->limit(10)->orderBy('id','DESC')->get();
@endphp
<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title"></div>
							<ul class="clearfix">
								<li class="active">{{ $cats->category_name }}</li>
								
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

									@foreach($product as $row)
									<!-- Slider Item -->
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img loading="lazy" src="{{ asset( $row->image_one)}}" alt="" style="height:170px;width:180px;"></div>
											<div class="product_content">
                                              @if($row->discount_price == NULL)
											  <div class="product_price discount" style="direction: rtl;"> {{ $row->selling_price }}تومان<span></span></div>

											  @else
											  <div class="product_price discount" style="direction: rtl;"> {{ $row->discount_price }}تومان<span> {{ $row->selling_price }}تومان</span></div>

											  @endif

												<div class="product_name"><div><a href="{{ url('product/detalist/'.$row->id.'/'.$row->product_name) }}"><button class="btnmaddcart">{{ $row->product_name }}</button></a></div></div>
												{{-- <div class="product_extras">
													
													<button id="{{ $row->id }}" class="product_cart_button addcart" data-bs-toggle="modal" data-bs-target="#cartmodal" onclick="productview(this.id)">افزودن به سبد</button>
												</div> --}}
											</div>
									     	<button class="addwishlist" style="border: none;" data-id="{{ $row->id }}">
										    	<div class="product_fav"><i class="fas fa-heart"></i></div>
												</button>

											<ul class="product_marks">
												@if($row->discount_price == NULL)
												<li class="product_mark product_discount" style="background: rgb(29, 146, 255);">جدید</li>
												@else
												<li class="product_mark product_discount">
													@php 
                                                       $amount =  $row->selling_price -  $row->discount_price;
												       $discount = $amount/ $row->selling_price*100;

													   @endphp
													{{ intval($discount) }}%
												
												</li>
												@endif												
											</ul>
										</div>
									</div>

		@endforeach						

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>
										</div>

										
										

							</div>

						
						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>

                                 		

  <!-- //////////////////////// -->

  <div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title" style="font-family: 'Vazir';">محصولات پربازدید</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							@foreach($featured as $row)
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img loading="lazy" src="{{ asset( $row->image_one)}}" alt="" style="height:130px;width:120px;padding-top:0.6rem;"></div>
									<div class="viewed_content text-center">
										@if($row->discount_price == NULL)
										<div class="product_price discount" style="direction: rtl;"> {{ $row->selling_price }}تومان<span></span></div>

										@else
										<div class="product_price discount" style="direction: rtl;"> {{ $row->discount_price }}تومان<span>{{ $row->selling_price }}تومان</span></div>

										@endif
										<div class="viewed_name"><a href="{{ url('product/detalist/'.$row->id.'/'.$row->product_name) }}">{{ $row->product_name }}</a></div>
									</div>
									<ul class="item_marks">
									        	@if($row->discount_price == NULL)
												<li class="item_mark item_discount" style="background: rgb(29, 146, 255);">جدید</li>
												@else
												<li class="item_mark item_discount">
													@php 
                                                       $amount =  $row->selling_price -  $row->discount_price;
												       $discount = $amount/ $row->selling_price*100;

													   @endphp
													{{ intval($discount) }}%
												
												</li>
												@endif
										
									</ul>
								</div>
							</div>
							@endforeach
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- /////////////////////////////////// -->
  <div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
							<lord-icon
							src="https://cdn.lordicon.com/ixlgmsii.json"
							trigger="loop"
							delay="2000"
							colors="primary:#121331,secondary:#3080e8"
							style="width:60px;height:60px">
						</lord-icon></div>
						<div class="char_content">
							<div class="char_title">کاملا بهداشتی</div>
							<div class="char_subtitle">محصولات ایزوله شده</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><lord-icon
    src="https://cdn.lordicon.com/krmfspeu.json"
    trigger="loop"
    delay="3000"
    colors="primary:#121331,secondary:#3080e8"
    style="width:50px;height:50px">
</lord-icon></div>
						<div class="char_content">
							<div class="char_title">امکان عودت</div>
							<div class="char_subtitle">در کمتر از۱۰روز</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><lord-icon
    src="https://cdn.lordicon.com/nkmsrxys.json"
    trigger="loop"
    delay="3000"
    colors="primary:#121331,secondary:#3080e8"
    style="width:50px;height:50px">
</lord-icon></div>
						<div class="char_content">
							<div class="char_title">دارای هدایا</div>
							<div class="char_subtitle">برخی محصولات</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
							<lottie-player src="https://assets7.lottiefiles.com/packages/lf20_v92o72md.json"  background="transparent"  speed="1"  style="width: 80px; height: 80px;"  loop  autoplay ></lottie-player></div>
						<div class="char_content">
							<div class="char_title">ارسال رایگان</div>
							<div class="char_subtitle">فقط تا ۲ روز</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //////////////////////////////////////// -->

<!-- Newsletter -->

<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><lord-icon
    src="https://cdn.lordicon.com/qrbokoyz.json"
    trigger="loop"
    delay="2000"
	axis-x="33"
    colors="primary:#121331,secondary:#3080e8"
    style="width:100px;height:100px">
</lord-icon></div>
							<div class="newsletter_title">برای اطلاع از تخفیفات ایمیل خود را وارد کنید</div>
							<div class="newsletter_text"><p>تا از سوپرایزهای ما جا نمونید</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="{{ route('store.newslater') }}" method="post" class="newsletter_form">
								@csrf
								<input type="email" class="newsletter_input" required="required" placeholder="آدرس ایمیل خود را وارد کنید" name="email">
								<button  class="newsletter_button" type="submit">ارسال</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">لغو ارسال</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="cartmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLavel" style="font-family: 'Vazir';">مشخصات محصول</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="row">
			<div class="col-md-4">
				<div class="card">
					<img src=""  id="pimage" >
					<div class="card-body">
						<h5 class="card-title text-center" id="pname"></h5>
					</div>
				</div>
			</div>
			<div class="col-md-4">
			<ul class="list-group">
  <li class="list-group-item text-center">کد محصول: <span id="pcode"></span> </li>
  <li class="list-group-item text-center">دسته: <span id="pcat"></span> </li>
  <li class="list-group-item text-center">زیردسته: <span id="psub"></span> </li>
  <li class="list-group-item text-center">برند: <span id="pbrand"></span> </li>
  <li class="list-group-item text-center">موجودی: <span  class="badge" style="background: green;color: white;">موجود</span> </li>
  
  
</ul>
			</div>
			<div class="col-md-4">
				<form action="{{ route('insert.into.cart') }}" method="post">
			@csrf
			<input type="hidden" name="product_id" id="product_id" >
				<div class="form-group" style="direction: rtl;">
					<label for="exampleInputcolor" style="direction: rtl;margin:6px;">رنگ</label>
					<select name="color" id="color" class="form-control" style="direction: rtl;padding:6px;">
						
					</select>
				</div>
				<div class="form-group" style="direction: rtl;">
					<label for="exampleInputcolor" style="direction: rtl;margin:6px;">سایز</label>
					<select name="size" id="size" class="form-control" style="direction: rtl;padding:6px;">
						
					</select>
				</div>
				<div class="form-group" style="direction: rtl;">
					<label for="exampleInputcolor" style="direction: rtl;margin:6px;">تعداد</label>
					<input type="number" class="form-control" name="qty" value="1" style="direction: rtl;padding:6px;">
				</div>
				
			</div>
		</div>
      </div>

      <div class="modal-footer">
	  <button type="submit" class="btn btn-primary">افزودن به سبد</button>
      </div>
	  </form>
    </div>
  </div>
</div>


	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		function productview(id){
			$.ajax({
				url: "{{ url('/cart/product/view/') }}/"+id,
			type: "GET",
			dataType:"json",
			success:function(data){
              $('#pname').text(data.product.product_name);
              $('#pcode').text(data.product.product_code);
              $('#pcat').text(data.product.category_name);
              $('#psub').text(data.product.subcategory_name);
              $('#pbrand').text(data.product.brand_name);
			  $('#pimage').attr('src',data.product.image_one);
			  $('#product_id').val(data.product.id);

			  var d = $('select[name="color"]').empty();
			  $.each(data.color,function(key,value){
				  $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
			  });
			  var d = $('select[name="size"]').empty();
			  $.each(data.size,function(key,value){
				  $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
			  });
			}	
		});
		}
	</script>


 	 {{-- <script type="text/javascript">
		$(document).ready(function(){
			$('.addcart').on('click',function(){
				var id = $(this).data('id');
				if (id) {
					$.ajax({
						url: " {{ url('/add/to/cart/') }}/"+id,
						type:"GET",
						datType:"json",
						success:function(data){
							const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

if ($.isEmptyObject(data.error)) {
	
	Toast.fire({
	  icon: 'success',
	  title: data.success
	})
}else{
	Toast.fire({
	  icon: 'error',
	  title: data.error
	})
}

						},
					});
				}else{
					alert('danger');
				}
			});
		});
// 	</script>
	 --}}
	
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('.addwishlist').on('click',function(){
				var id = $(this).data('id');
				if (id) {
					$.ajax({
						url: " {{ url('add/wishlist/') }}/"+id,
						type:"GET",
						datType:"json",
						success:function(data){
							const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

if ($.isEmptyObject(data.error)) {
	
	Toast.fire({
	  icon: 'success',
	  title: data.success
	})
}else{
	Toast.fire({
	  icon: 'error',
	  title: data.error
	})
}

						},
					});
				}else{
					alert('danger');
				}
			});
		});
	</script>
@endsection
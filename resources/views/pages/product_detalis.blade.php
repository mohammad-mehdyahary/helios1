@extends('layouts.app')

@section('content')
@include('layouts.menubar')
@php
$featured = DB::table('products')->where('status',1)->orderBy('id','desc')->limit(8)->get();
	
@endphp
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/product_responsive.css')}}">
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{ asset( $product->image_one ) }}"><img src="{{ asset( $product->image_one ) }}" alt=""></li>
						<li data-image="{{ asset( $product->image_two ) }}"><img src="{{ asset( $product->image_two ) }}" alt=""></li>
						<li data-image="{{ asset( $product->image_three ) }}"><img src="{{ asset( $product->image_three ) }}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ asset( $product->image_one ) }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category" style="direction: rtl;" >{{ $product->category_name }} > {{ $product->subcategory_name }}</div>
						<div class="product_name" style="direction: rtl;">{{ $product->product_name }}</div>
						<div style="direction: rtl">
							<i class="fa-solid fa-star" style="color: rgb(255, 232, 25);"></i>
							<i class="fa-solid fa-star" style="color: rgb(255, 232, 25);"></i>
							<i class="fa-solid fa-star" style="color: rgb(255, 232, 25);"></i>
							<i class="fa-solid fa-star" style="color: rgb(255, 232, 25);"></i>
						    <i class="fa-solid fa-star-half" style="color: rgb(255, 232, 25);"></i>
						</div>
						<div class="product_text"><p>
                            {!! str_limit($product->product_details, $limit = 500) !!}
                        </p></div>
						<div class="order_info d-flex flex-row">
							<form action="{{ url('cart/product/add/'.$product->id) }}" method="post">
                                @csrf
								<div class="row">
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="exampleFromControlSelect1" style="direction: rtl;">رنگ</label>
                                            <select name="color" id="exampleFromControlSelect1" class="form-control input-lg" style="margin: 6px;direction: rtl;">
                                                @foreach($product_color as $color)
                                                <option value="{{ $color }}">{{ $color }}</option>
                                                
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    @if($product->product_size == NULL)

                                    @else
                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="exampleFromControlSelect1" style="direction: rtl;">سایز</label>
                                            <select name="size" id="exampleFromControlSelect1" class="form-control input-lg" style="margin: 6px;direction: rtl;">
                                            @foreach($product_size as $size)
                                                <option value="{{ $size }}">{{ $size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-lg-4">
                                        <div class="from-group">
                                            <label for="exampleFromControlSelect1" style="direction: rtl;">تعداد</label>
                                            <input type="number" class="form-control" value="1" pattern="[0-9]" name="qty" style="margin: 6px;direction: rtl;">
                                        </div>
                                    </div>
                                </div>

								</div>

							

                                @if($product->discount_price == NULL)
											  <div class="product_price discount" style="display:flex;justify-content: center; direction:rtl;"> {{ $product->selling_price }}تومان<span></span></div>

											  @else
											  <div class="product_price discount" style="display:flex;justify-content: center; direction:rtl;"> {{ $product->discount_price }}تومان<span> {{ $product->selling_price }}تومان</span></div>

											  @endif

								<div class="button_container  text-center">
									<button type="submit" class="button cart_button" style="background: #1a55f8">افزودن به سبد</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div><br>
								 <!-- Go to www.addthis.com/dashboard to customize your tools -->
								 <div class="addthis_inline_share_toolbox text-center"></div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->
	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title" style="font-family: 'Vazir';">محصولات پرفروش</h3>
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
									<div class=" text-center" style="margin-top: 5px;width: 100%;">
										@if($row->discount_price == NULL)
										<div class="product_price discount" style="direction: rtl;font-size:0.8rem;"> {{ $row->selling_price }}تومان<span></span></div>

										@else
										<div class="product_price discount" style="direction: rtl;font-size:0.8rem;"> {{ $row->discount_price }}تومان<span>{{ $row->selling_price }}تومان</span></div>

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


	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title" style="direction: rtl;font-family:'Vazir';">مشخصات محصول</h3>
						
					</div>
                    <ul class="nav nav-pills justify-content-end mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">مشخصات محصول</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">لینک ویدیو</button>
  </li>
  {{-- <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">بررسی محصول</button>
  </li> --}}
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><br>{!! $product->product_details !!}</div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"><br>{{ $product->video_link }}</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><br>
	<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
 </div>
</div>
					
				</div>
			</div>
		</div>
	</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61f52e5fa7d2d9c6"></script>

@endsection
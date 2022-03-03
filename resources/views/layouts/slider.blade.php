<!-- Banner -->

@php 
  $slider = DB::table('products')
  ->join('brands','products.brand_id','brands.id')
  ->select('products.*','brands.brand_name')
  ->where('main_slider',1)->orderBy('id','DESC')->first();
	@endphp
	<div  style="width: 100%;
	align-items: center;
	justify-content: center;
	display: flex;">
		<div  style="background:url({{ asset('public/frontend/images/baner.jpg)')}} center/cover no-repeat;
		 height: 26vh;
  width: 86%;
  position: relative;
  margin-bottom: 2rem;
	  border-radius: 0.3rem;
	  ">
	  <div style=" position: absolute;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	  background: rgba(0, 0, 0, 0.4);
	  border-radius: 0.3rem;">
         <div style=" color: #ffffff;
		 text-align: center;">
		 <h1 class="ml5">
            <span class="text-wrapper">
              <span class="line line1"></span>
              <span class="letters letters-left">دکور</span>
              <span class="letters letters-right">هلیوس</span>
              <span class="line line2"></span>
            </span>
          </h1>
		</div>
	  </div>
		{{-- <div class="container fill_height"> --}}
			<!-- <div class="row fill_height">
				<div class="banner_product_image"><img src="{{ asset( $slider->image_one ) }}" style="height: 400px;"></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						
						<h1 class="banner_text">{{  $slider->product_name }}</h1>
						<div class="banner_price">
					
						@if($slider->discount_price == NULL)
						   <h2>${{ $slider->selling_price }}</h2>

						@else
						<span>${{ $slider->selling_price }}</span>${{ $slider->discount_price }}
						@endif
					</div>
					
						<div class="banner_product_name">{{ $slider->brand_name }}</div>
						<div class="button banner_button"><a href="#">Shop Now</a></div>
				
					</div>
				</div>
			</div> -->
		</div>
	</div>
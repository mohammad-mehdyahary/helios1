@php
	$setting = DB::table('sitesetting')->first();
@endphp


<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
{{-- <meta name="viewport" content="initial-scale=1, width=device-width"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/responsive.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.10/sweetalert2.min.css" integrity="sha512-jtQXcnq6H9BVx+dOsdudNCZmNe2hBMqcPpnVgeZcV9L3615F4+QMQebbWW9TV2otOSk/kQgum0MpWefB3uL3pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://js.stripe.com/v3/"></script>

	
</head>
  
<body>
<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class=" d-flex " style="width: 100%;display: flex;justify-content: space-between;">
						<div style="display: flex; justify-content: start;">

							<div class="top_bar_contact_item"><div class="top_bar_icon"><lord-icon
								src="https://cdn.lordicon.com/kjkiqtxg.json"
								trigger="loop"
								delay="3000"
								colors="outline:#121331,primary:#e4e4e4,secondary:#4bb3fd,tertiary:#30c9e8"
								style="width:50px;height:50px">
							</lord-icon></div><a href="tel:{{ $setting->phone_one }}">تماس با ما</a></div>
							<div class="top_bar_contact_item"><div class="top_bar_icon"><lord-icon
								src="https://cdn.lordicon.com/gzmgulpl.json"
								trigger="loop"
								delay="3000"
								
								style="width:50px;height:50px">
							</lord-icon></div><a href="mailto:{{ $setting->email }}">ایمیل</a></div>
						</div>
						<div  style="display: flex; justify-content: end;">

							<div>

								@guest
								  @else
								<div class="top_bar_menu ">
									<ul class="standard_dropdown top_bar_dropdown">
										
									
									<li>
										<a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">وضعیت سفارش ها </a>
											
										</li>
										
									</ul>
								</div>
								@endguest
								 {{-- <div class="top_bar_menu ">
									<ul class="standard_dropdown top_bar_dropdown">
										
									@php 
									   $language = Session()->get('lang');
									@endphp
									<li>
											@if(Session()->get('lang') == 'farsi')
											<a href="{{ route('language.en') }}">English<i class="fas fa-chevron-down"></i></a>
											@else
											<a href="{{ route('language.fa') }}">فارسی<i class="fas fa-chevron-down"></i></a>
											@endif
											
										</li>
										
									</ul>
								</div> --}}
								<div class="top_bar_user">
									
										@guest
										<div><a href="{{ route('login')}}"><div class="user_icon"><lord-icon
											src="https://cdn.lordicon.com/dqxvvqzi.json"
											   trigger="loop"
											   delay="3000"
											   axis-x="35"
											   
											   style="width:35px;height:35px">
											</lord-icon></div> ثبت نام/ ورود</a></div>
										@else 
										<ul class="standard_dropdown top_bar_dropdown">
										<li>
											<a href="{{ route('home') }}"><div class="user_icon"><lord-icon
												src="https://cdn.lordicon.com/jvihlqtw.json"
												trigger="loop"
												delay="5000"
												colors="primary:#16c72e,secondary:#16c72e"
												stroke="86"
												axis-x="35"
												style="width:40px;height:40px">
											</lord-icon></div> پروفایل<i class="fas fa-chevron-down"></i></a>
											<ul>
												<li><a href="{{ route('user.wishlist') }}"> پسندیده ها</a></li>
												<li><a href="{{ route('user.checkout') }}">بررسی</a></li>
												<li><a href="#">دیگر</a></li>
												
											</ul>
										</li>
										
									</ul>
										@endguest
	
	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

<!-- Header Main -->

          <div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a style="font-family: 'Dancing Script', cursive;font-size: 2.5rem;color:black;" href="{{ url('/')}}">Helios</a></div>
						</div>
					</div>

					@php 
                      $category = DB::table('categories')->get();
					@endphp
					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form method="post" action="{{ route('product.search')}}" class="header_search_form clearfix">
										@csrf
										<input type="search" required="required" class="header_search_input" placeholder="جستجو" name="search">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc"> گروه ها</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													@foreach($category as $row)
													<li><a class="clc" href="#">{{ $row->category_name }}</a></li>
												   @endforeach
												</ul>

											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><lord-icon
                                            src="https://cdn.lordicon.com/osbjlbsb.json"
                                            trigger="loop"
                                            delay="3000"
                                            
                                            stroke="100"
                                            style="width:40px;height:40px">
                                          </lord-icon>
									   </button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">

							@guest 

							@else

							@php 
                               $wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get();
							@endphp
								<a href="{{ route('user.wishlist') }}"><div class="wishlist_icon"><lord-icon
									src="https://cdn.lordicon.com/hqrgkqvs.json"
                                      trigger="loop"
                                      delay="3000"
									  axis-x="50"
                                      
                                      stroke="77"
                                      style="width:45px;height:45px">
                                  </lord-icon></div></a>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="{{ route('user.wishlist') }}">پسندیده ها</a></div>
									<div class="wishlist_count" style="margin-left: 18px;margin-top:8px;">{{ count($wishlist)}}</div>
								</div>
							</div>
                           @endguest
							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon"><a href="{{ route('show.cart') }}">
									<lord-icon
									src="https://cdn.lordicon.com/qzwudxpy.json"
									trigger="loop"
									delay="3000"
									colors="outline:#121331,primary:#ebe6ef,secondary:#ffc738,tertiary:#3080e8"
                                          	axis-x="50"
                                              
                                              style="width:45px;height:45px">
                                          </lord-icon></a>
										<div class="cart_count"><span>{{ Cart::count() }}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{ route('show.cart') }}">سبد خرید</a></div>
										<div class="cart_price" style="direction:rtl;margin-left: 12px;">{{ Cart::subtotal() }}تومان</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

      @yield('content')
     
    
    
    
    
	  @php
	  $setting = DB::table('sitesetting')->first();
      @endphp
    <!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo" style="direction: rtl;"><a href="#">{{ $setting->company_name }}</a></div>
						</div>
						<div class="footer_title"></div>
						<div class="footer_phone" style="direction: rtl;"><a href="tel:{{ $setting->phone_two }}" style="color:black;"><i class="fas fa-phone" style="font-size: 1.5rem;margin:8px;"></i>تماس با ما</a></div>
						@guest
						 @else
						<div class="footer_phone" style="direction: rtl;color: black;" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-search" style="font-size: 1.5rem;margin:8px;"></i>وضعیت سفارش</div>
						@endguest
						<div class="footer_contact_text" style="direction: rtl;">
							<p>{{ $setting->company_address }}</p>
							
						</div>
						<div class="footer_social" style="direction: rtl;">
							<ul>
								<li><a href="https://t.me/{{ $setting->telegram }}"><i class="fab fa-telegram" style="font-size: 1.5rem;"></i></a></li>
								<li><a href="http://www.instagram.com/{{ $setting->instagram }}"><i class="fab fa-instagram" style="font-size: 1.5rem;"></i></a></li>
								<li><a href="https://wa.me/989909431038"><i class="fab fa-whatsapp" style="font-size: 1.5rem;"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<img src="{{ asset('public/frontend/images/zplogo.png') }}" style="width: 20rem;">
					</div>
				</div>

			</div>
		</div>
	</footer>

	
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">کد وضعیت شما</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="{{ route('order.tracking') }}" method="post">
          @csrf
		  <div class="modal-body">
			  <label for="">کد وضعیت</label>
			  <input type="text" name="code" Required="" class="form-control" placeholder="کد وضعیت محصول">
		  </div>
		  <button class="btn btn-danger " type="submit">پیگیری کردن</button>
	   </form>
      </div>
     
    </div>
  </div>
</div>


<script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
<script src="{{ asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/easing/easing.js')}}"></script>
<script src="{{ asset('public/frontend/js/custom.js')}}"></script>
<script src="{{ asset('public/frontend/js/text.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 

<script src="{{ asset('public/frontend/js/product_custom.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> --}}
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info')}}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message')}}");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message')}}");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message')}}");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message')}}");
        break;
    }

    @endif
</script>
<script>
	$(document).on("click", "#return", function(e){
	   e.preventDefault();
	   var link = $(this).attr("href");
	   swal({
		 title: "میخواهید برگردید؟",
		 text: "پس از برگشت ،این پول شما را باز می گرداند",
		 icon: "warning",
		 buttons: true,
		 dangerMode: true,
	   })
	   .then((willDelete) => {
		 if (willDelete) {
		   window.location.herf = link;
		 } else {
		   swal("لغو!");
		 }
	   });
	});
  </script>
  </body>
</html>
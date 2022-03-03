   @php
     $category = DB::table('categories')->get();
   @endphp
<link rel="stylesheet" href="{{ asset('public/panel/front/css/meanebar.css') }}">
 {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> --}}
 <nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row" style="display: flex;justify-content: space-between;">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">دسته بندی ها </div>
								</div>

								<ul class="cat_menu">
									@foreach($category as $cat)
									<li class="hassubs">
										<a href="{{ url('allcategory/'.$cat->id) }}">{{ $cat->category_name }}<i class="fas fa-chevron-right"></i></a>
										<ul>
											@php
                                                $subcategory = DB::table('subcategories')->where('category_id',$cat->id)->get();
											@endphp
											@foreach($subcategory as $row)
											<li class="hassubs">
												<a href="{{ url('products/'.$row->id) }}">{{ $row->subcategory_name }}<i class="fas fa-chevron-right"></i></a>
												
											</li>
											@endforeach
										</ul>
									</li>
									@endforeach
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto ">
								<ul class="standard_dropdown main_nav_dropdown ">
									<li><a href="#">خانه<i class="fas fa-chevron-down"></i></a></li>
									<li class="hassubs">
										<a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li>
												<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
												<ul>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									
									
									{{-- <li><a href="{{ route('blog.post') }}">وبلاگ<i class="fas fa-chevron-down"></i></a></li> --}}
									<li><a href="{{ route('contact.page') }}">تماس با ما<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							   <!-- Menu Trigger -->

							   <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
										<div style="display: flex;">
											<div class="menu_trigger_text" >
												<form action="{{ route('product.search')}}" method="post">
													@csrf
													 <input type="search" required="required" class="mnu_triger_tet_input"   placeholder="جستجو" name="search">
												 </form>
											</div>
											@guest
											<div class="menu_trigger_text" style="margin-top:8px;"><a style="color: #ffffff;" href="{{ route('login')}}"><script src="https://cdn.lordicon.com/lusqsztk.js"></script>
												<lord-icon
													src="https://cdn.lordicon.com/dqxvvqzi.json"
													trigger="loop"
													delay="3000"
													axis-y="45"
													colors="outline:#121331,primary:#e4e4e4,secondary:#4030e8"
													style="width:42px;height:42px">
												</lord-icon></a></div>
                                            @else
											<div class="menu_trigger_text" style="margin-top:8px;"><a style="color: #ffffff;" href="{{ route('home') }}"><script src="https://cdn.lordicon.com/lusqsztk.js"></script>
												<lord-icon
    src="https://cdn.lordicon.com/ivayzoru.json"
    trigger="loop"
    delay="3000"
    colors="outline:#242424,primary:#16c72e,secondary:#ebe6ef"
    stroke="90"
    axis-y="40"
    style="width:45px;height:45px">
</lord-icon></a></div>
											@endguest

										</div>
                                        {{-- <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav> <!-- Menu -->
        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page_menu_content">
                            <div class="page_menu_search">
                                <form action="{{ route('product.search')}}" method="post">
									@csrf
									 <input type="search" required="required" class="page_menu_search_input" placeholder="جستجو">
								 </form>
                            </div>
                            <ul class="page_menu_nav">
                               
                               
                                <li class="page_menu_item"> <a href="#">خانه<i class="fa fa-angle-down"></i></a> </li>
								@guest
								<li class="page_menu_item"> <a href="{{ route('login')}}">ثبت نام/ورود<i class="fa fa-angle-down"></i></a> </li>
                                @else 

								

								<li class="page_menu_item has-children">
                                    <a href="{{ route('home') }}">پروفایل<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="{{ route('user.wishlist') }}">پسندیده ها<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="{{ route('user.checkout') }}">بررسی<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="#">دیگر<i class="fa fa-angle-down"></i></a></li>
                                        
                                    </ul>
                                </li>
								@endguest
                               
                               
                                {{-- <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li> --}}
                                <li><a href="{{ route('contact.page') }}">تماس با ما<i class="fas fa-chevron-down" style="color: aliceblue"></i></a></li>
                            </ul>
                            <div class="menu_contact">
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"></div>+38 068 005 3570
                                </div>
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon"><img src="" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script> --}}
	
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script> --}}
	
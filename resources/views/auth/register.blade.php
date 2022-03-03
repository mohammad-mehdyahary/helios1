@extends('layouts.app')

@section('content')
<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" action="{{ route('register') }}" method="post">
				@csrf
				<span class="login100-form-title p-b-37">
					ایجاد حساب
				</span>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username ">
					<input style="direction: rtl;" class="input100 @error('name') is-invalid @enderror" id="name" type="text"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="نام کامل">
					@error('name')
                          <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter phone ">
					<input style="direction: rtl;" class="input100 @error('phone') is-invalid @enderror" id="phone" type="text"  name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus  placeholder="شماره تلفن">
					@error('phone')
                          <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input style="direction: rtl;" class="input100 @error('email') is-invalid @enderror" id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="ایمیل">
					@error('email')
					 <span class="invalid-feedback" role="alert">
					  <strong>{{ $message }}</strong>
		 	   		 </span>
	                @enderror
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input style="direction: rtl;" class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password"  placeholder="پسورد">
					@error('password')
					 <span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
				  	 </span>
				    @enderror
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input style="direction: rtl;" class="input100" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"  placeholder="تکرار پسورد">
					
					<span class="focus-input100"></span>
				</div>
				
				<div class="container-login100-form-btn">
					<button style="font-size: 1.3rem;" type="submit" class="login100-form-btn">
						ایجاد حساب
					</button>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						یا وارد شوید با
					</span>
				</div>

				<div class="flex-c p-b-112">
					
					<a href="#" class="login100-social-item">
						<img src="{{ asset('public/panel/front/images/icons/icon-google.png')}}" alt="GOOGLE">
					</a>
				</div>

				<div class="text-center">
					<a href="{{ route('login') }}" class="txt2 hov1">
						حساب کاربری دارم
					</a>
					
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
@endsection

@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="{{ asset('public/panel/front/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('public/panel/front/css/util.css') }}">


 <!-- wrapper -->
 <div class="container-login100" >
		<div class="wrap-login100 col-4" >
			<form class="login100-form validate-form" id="contact_form" action="{{ route('login') }}" method="post" >
				@csrf
				<span class="login100-form-title p-b-37" style="margin-top: 2rem;">
					ورود
				</span>
           

			   <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email" style="margin-left: 1rem;">
				   <input style="direction: rtl;margin-left: 1rem;" class="input100 @error('email') is-invalid @enderror" id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="ایمیل">
				   @error('email')
					<span class="invalid-feedback" role="alert">
					 <strong>{{ $message }}</strong>
						</span>
				   @enderror
				   <span class="focus-input100"></span>
			   </div>

			   <div class="wrap-input100 validate-input m-b-20" data-validate = "Enter password" style="margin-left: 1rem;">
				   <input style="direction: rtl;" class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password"  placeholder="پسورد">
				   @error('password')
					<span class="invalid-feedback" role="alert">
					   <strong>{{ $message }}</strong>
					  </span>
				   @enderror
				   <span class="focus-input100"></span>
			   </div>
			   <div style="display: flex;direction: rtl;" class="form-group">
				   {{-- <label  class="chech_container">به خاطر سپردن
				   <input  class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
				   <span  class="checkmark"></span> --}}
			   </label>
			   </div>
			   <div class="container-login100-form-btn">
				   <button style="font-size: 1.3rem;" type="submit" class="login100-form-btn">
					   ورود
				   </button>
			   </div>

			   <div class="text-center p-t-57 p-b-20">
				   <span class="txt1">
					   یا وارد شوید با
				   </span>
			   </div>

			   <div class="flex-c p-b-112">
				   
				   <a href="{{ url('/auth/redirect/google') }}" class="login100-social-item">
					   <img src="{{ asset('public/panel/front/images/icons/icon-google.png')}}" alt="GOOGLE">
				   </a>
			   </div>

			   <div class="text-center" style="margin-bottom: 1rem;">
				   
				   <a href="{{ route('password.request') }}" class="txt2 hov1" >
					   فراموشی رمز عبور
				   </a>
			   </div>
			
		   </form>

	   </div>
   
		<div class="wrap-login100 col-4">
		<form class="login100-form validate-form"  id="contact_form" action="{{ route('register') }}" method="post">
			@csrf
			<span class="login100-form-title p-b-37" style="margin-top: 2rem;">
				ایجاد حساب
			</span>
			<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username " style="margin-left: 1rem;">
				<input style="direction: rtl;" class="input100 @error('name') is-invalid @enderror" id="name" type="text"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="نام کامل">
				@error('name')
					  <span class="invalid-feedback" role="alert">
						   <strong>{{ $message }}</strong>
					   </span>
				   @enderror
				<span class="focus-input100"></span>
			</div>
			<div class="wrap-input100 validate-input m-b-20" data-validate="Enter phone " style="margin-left: 1rem;">
				<input style="direction: rtl;" class="input100 @error('phone') is-invalid @enderror" id="phone" type="phone"  name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus  placeholder="شماره تلفن">
				@error('phone')
					  <span class="invalid-feedback" role="alert">
						   <strong>{{ $message }}</strong>
					   </span>
				   @enderror
				<span class="focus-input100"></span>
			</div>
			<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email" style="margin-left: 1rem;">
				<input style="direction: rtl;" class="input100 @error('email') is-invalid @enderror" id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="ایمیل">
				@error('email')
				 <span class="invalid-feedback" role="alert">
				  <strong>{{ $message }}</strong>
					 </span>
				@enderror
				<span class="focus-input100"></span>
			</div>

			<div class="wrap-input100 validate-input m-b-20" data-validate = "Enter password" style="margin-left: 1rem;">
				<input style="direction: rtl;" class="input100 @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="new-password"  placeholder="پسورد">
				@error('password')
				 <span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				   </span>
				@enderror
				<span class="focus-input100"></span>
			</div>
			<div class="wrap-input100 validate-input m-b-20" data-validate = "Enter password" style="margin-left: 1rem;">
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

			
		</form>
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
@endsection

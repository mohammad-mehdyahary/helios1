@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"  style="display: flex;justify-content: center;">{{ __('تغییر رمز ورود') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf


                        <div class="form-group row" style="margin: 1rem;">
                            <label for="oldpass" class="col-md-4 col-form-label text-md-right">{{ __('پسورد قدیمی') }}</label>

                            <div class="col-md-6">
                                <input id="oldpass" type="password" class="form-control{{ $errors->has('oldpass') ? ' is-invalid' : '' }}" name="oldpass" value="{{ $oldpass ?? old('oldpass') }}" required autofocus>

                                @if ($errors->has('oldpass'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldpass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="margin: 1rem;">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('پسورد جدید') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"  style="margin: 1rem;">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تکرار پسورد') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('بازنشانی رمزعبور') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
                <div class="card">
                    <img src="{{ asset('public/frontend/images/user.png') }}" class="card-img-top" style="height:90px; width:90px; margin-left:34%;border-radius: 50%;margin-top:1rem;">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ Auth::user()->name }}</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-end"><a href="{{ route('password.change') }}">تغییر رمز</a></li>
                        <li class="list-group-item text-end" ><a href="" style="color: darkgrey">ویرایش پروفایل</a></li>
                        <li class="list-group-item text-end"><a href="{{ route('success.orderlist') }}">عودت سفارش</a></li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block" style="font-size:1rem;">خروج از حساب</a>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection

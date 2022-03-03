@extends('layouts.app')

@section('content')
@include('layouts.menubar')
@php
    $site = DB::table('sitesetting')->first();
@endphp
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">
<!-- Contact Info -->



<!-- Contact Form -->

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">با ما در ارتباط باشید</div>

                    <form method="post" action="{{ route('contact.form') }}" id="contact_form">
                        @csrf
                        <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                            <input style="padding: 1rem" type="text" id="contact_form_name" class="contact_form_name input_field text-end" placeholder="نام کامل" required="required" data-error="نام الزامی است" name="name">
                            <input style="padding: 1rem" type="email" id="contact_form_email" class="contact_form_email input_field text-end" placeholder="ایمیل" required="required" data-error=" ایمیل الزامی است" name="email">
                            <input style="padding: 1rem" type="text" id="contact_form_phone" class="contact_form_phone input_field text-end" placeholder="شماره تلفن شما" name="phone">
                        </div>
                        <div class="contact_form_text">
                            <textarea style="padding: 1rem" id="contact_form_message" class="text_field contact_form_message text-end " name="message" rows="4" placeholder="پیام" required="required" data-error="لطفا برای ما پیام بنویسید"></textarea>
                        </div> 
                        <div class="contact_form_button text-center">
                            <button type="submit" class="button contact_submit_button">ارسال پیام</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>

@endsection
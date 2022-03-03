@extends('admin.admin_layouts')


@section('admin_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html"></a>
        <span class="breadcrumb-item active"> تنظیمات وبسایت</span>
      </nav>

      <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">تنظیمات سایت 
          </h6>
      <form method="post" action="{{ route('update.sitesetting') }}" >
        @csrf
        <input type="hidden" name="id" value="{{ $setting->id }}">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">تلفن اول : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone_one"  Required="" value="{{ $setting->phone_one }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">تلفن دوم : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone_two"  Required="" value="{{ $setting->phone_two }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">ایمیل: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email"  Required="" value="{{ $setting->email }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">نام شرکت: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_name"  Required="" value="{{ $setting->company_name }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">آدرس شرکت: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_address"  Required="" value="{{ $setting->company_address }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">اینستاگرام: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="instagram"  Required="" value="{{ $setting->instagram }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">تلگرام: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="telegram"  Required="" value="{{ $setting->telegram }}">
                </div>
              </div><!-- col-4 -->
              
             
             

              
             

              

              
             
            </div><!-- row -->

            <hr>
            <br>
            
         

            </div>
            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit"> آپدیت</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

      </form>


       </div>

       
    </div><!-- sl-mainpanel -->
    
@endsection
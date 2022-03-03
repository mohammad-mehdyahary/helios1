@extends('admin.admin_layouts')


@section('admin_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">قسمت ادمین</span>
      </nav>

      <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">افزودن ادمین جدید 
          </h6>
          <p class="mg-b-20 mg-sm-b-30">افزودن ادمین جدید به گروه</p>
      <form method="post" action="{{ route('update.admin') }}" >
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">نام : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name" placeholder=" نام ادمین را وارد کنید" Required="" value="{{ $user->name }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">تلفن : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone" placeholder=" تلفن همراه را وارد کنید" Required="" value="{{ $user->phone }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">ایمیل: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email"  placeholder="ایمیل را وارد کنید" Required="" value="{{ $user->email }}">
                </div>
              </div><!-- col-4 -->
              
             
             

              
             

              

              
             
            </div><!-- row -->

            <hr>
            <br>
            
            <div class="row">
              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="category" value="1" <?php if ($user->category == 1) {
                     echo "checked"; } ?> >
                 <span> دسته ها </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="coupon" value="1" <?php if ($user->coupon == 1) {
                     echo "checked"; } ?> >
                 <span> کد تخفیف </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="product" value="1" <?php if ($user->product == 1) {
                     echo "checked"; } ?> >
                 <span> محصولات </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="blog" value="1" <?php if ($user->blog == 1) {
                     echo "checked"; } ?> >
                 <span> وبلاگ </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="order" value="1" <?php if ($user->order == 1) {
                     echo "checked"; } ?> >
                 <span> سفارش ها </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="other" value="1" <?php if ($user->other == 1) {
                     echo "checked"; } ?> >
                 <span>دیگر </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="report" value="1" <?php if ($user->report == 1) {
                     echo "checked"; } ?> >
                 <span> گزارش ها</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="role" value="1" <?php if ($user->role == 1) {
                     echo "checked"; } ?> >
                 <span> نقش</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="return" value="1" <?php if ($user->return == 1) {
                     echo "checked"; } ?> >
                 <span> برگشت داده شده</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="contact" value="1" <?php if ($user->contact == 1) {
                     echo "checked"; } ?> >
                 <span>ارتباط </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="comment" value="1" <?php if ($user->comment == 1) {
                     echo "checked"; } ?> >
                 <span> کامنت محصولات</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="setting" value="1" <?php if ($user->setting == 1) {
                     echo "checked"; } ?> >
                 <span>تنظیمات</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name="stock" value="1" <?php if ($user->stock == 1) {
                      echo "checked"; } ?> >
                  <span>موجودی</span>
                </label>
               </div> <!-- col-4 -->

            </div>
            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit"> ارسال</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

      </form>


       </div>

       
    </div><!-- sl-mainpanel -->
    
@endsection
@extends('admin.admin_layouts')


@section('admin_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">قسمت محصولات</span>
      </nav>

      <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">افزودن محصول جدید 
            <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right">همه محصولات</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">افزودن محصول جدید به گروه</p>
      <form method="post" action="{{ route('store.product')}}" enctype="multipart/form-data">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">نام محصول: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" placeholder=" نام محصول را وارد کنید">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">کد محصول: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" placeholder="کد محصول را وارد کنید">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">تعداد: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity" value="" placeholder="تعداد">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">قیمت تخفیف خورده: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_price" value="" placeholder="قیمت تخفیف خورده">
                </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">دسته: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                    <option label="انتخاب دسته"></option>
                    @foreach($category as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label"> زیردسته: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" name="subcategory_id">
                 
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">برند: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                    <option label="انتخاب برند"></option>
                    @foreach($brand as $br)
                    <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">اندازه محصول: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size" data-role="tagsinput" id="size" >
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">رنگ محصول: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_color" data-role="tagsinput" id="color" >
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> قیمت : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price"  placeholder="قیمت فروش">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> توضیحات : <span class="tx-danger">*</span></label>
                  <textarea name="product_details" class="form-control" id="summernote" cols="30" rows="10">

                  </textarea>
               
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> لینک ویدیو : <span class="tx-danger">*</span></label>
                  <input class="form-control" name="video_link" placeholder="لینک ویدیو ">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> عکس اول(عکس اصلی) : <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                   <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required="">
                    <span class="custom-file-control"></span>
                    <img src="#" id="one">
                  </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> عکس دوم: <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                   <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);" required="">
                    <span class="custom-file-control"></span>
                    <img src="#" id="two">
                  </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> عکس سوم : <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                   <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);" required="">
                    <span class="custom-file-control"></span>
                    <img src="#" id="three">
                  </label>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <hr>
            <br>
            
            <div class="row">
              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="main_slider" value="1">
                 <span> اسلایدر ابتدایی</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="hot_deal" value="1">
                 <span>معامله داغ </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="buyone_getone" value="1">
                 <span> یکی بخر یکیم ببر </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="best_rated" value="1">
                 <span>بهترین امتیاز </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="trend" value="1">
                 <span> روند محصول</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="mid_slider" value="1">
                 <span>  اسلایدر وسط</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="ckbox">
                 <input type="checkbox" name="hot_new" value="1">
                 <span>خبر داغ </span>
               </label>
              </div> <!-- col-4 -->

            </div>
            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

      </form>


       </div>

       
    </div><!-- sl-mainpanel -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
     $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
            
            $.ajax({
              url: "{{ url('/get/subcategory/') }}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data) { 
              var d =$('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });

 </script>
<script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
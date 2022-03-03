@extends('admin.admin_layouts')


@section('admin_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">قسمت وبلاگ </span>
      </nav>

      <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">افزودن پست جدید 
            <a href="{{ route('all.blogpost') }}" class="btn btn-success btn-sm pull-right">همه پست ها</a>
          </h6>
          <p class="mg-b-20 mg-sm-b-30">افزودن پست جدید به لیست</p>
      <form method="post" action="{{ route('store.post')}}" enctype="multipart/form-data">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">عنوان پست(ENGLISH): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_en" placeholder=" عنوان پست  را به انگلیسی وارد کنید">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"> عنوان پست(FARSI): <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title_fa" placeholder=" عنوان پست را به فارسی وارد کنید">
                </div>
              </div><!-- col-4 -->
             
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">دسته وبلاگ: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                    <option label="انتخاب دسته"></option>
                    @foreach($blogcategory as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              

             
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> توضیحات (ENGLISH): <span class="tx-danger">*</span></label>
                  <textarea name="details_en" class="form-control" id="summernote" cols="30" rows="10">

                  </textarea>
               
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> توضیحات (FARSI): <span class="tx-danger">*</span></label>
                  <textarea name="details_fa" class="form-control" id="summernote1" cols="30" rows="10">

                  </textarea>
               
                </div>
              </div><!-- col-4 -->

              

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> عکس پست : <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                   <input type="file" id="file" class="custom-file-input" name="post_image" onchange="readURL(this);" required="">
                    <span class="custom-file-control"></span>
                    <img src="#" id="one">
                  </label>
                </div>
              </div><!-- col-4 -->
             
            </div><!-- row -->

           

            </div>
            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">ارسال </button>
            
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

      </form>


       </div>

       
    </div><!-- sl-mainpanel -->
   
    
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

@endsection
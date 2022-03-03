@extends('admin.admin_layouts')


@section('admin_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">قسمت تنظیمات سئو </span>
      </nav>

      <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">تنظیمات سئو 
            
          </h6>
          
      <form method="post" action="{{ route('update.seo')}}">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">عنوان : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_title" value="{{ $seo->meta_title }}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"> نویسنده: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_author" value="{{ $seo->meta_author}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label"> تگ: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_tag" value="{{ $seo->meta_tag}}">
                </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> توضیحات: <span class="tx-danger">*</span></label>
                  <textarea name="meta_description" class="form-control"  cols="30" rows="10">
                  {{ $seo->meta_description}}
                  </textarea>
               
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> آنالیز گوگل: <span class="tx-danger">*</span></label>
                  <textarea name="google_analytics" class="form-control"  cols="30" rows="10">
                  {{ $seo->google_analytics}}
                  </textarea>
               
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> آنالیز بینگ: <span class="tx-danger">*</span></label>
                  <textarea name="bing_analytics" class="form-control"  cols="30" rows="10">
                  {{ $seo->bing_analytics}}
                  </textarea>
               <input type="hidden" name="id" value="{{ $seo->id }}">
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
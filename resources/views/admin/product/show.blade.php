@extends('admin.admin_layouts')


@section('admin_content')
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">قسمت محصولات</span>
      </nav>

      <div class="sl-pagebody">
      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title"> صفحه جزيیات محصول 
          </h6>
     
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">نام محصول: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->product_name }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">کد محصول: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->product_code }}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">تعداد: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->product_quantity }}</strong>
                </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">دسته: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->category_name }}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label"> زیردسته: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->subcategory_name }}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">برند: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->brand_name }}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">اندازه محصول: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->product_size }}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">رنگ محصول: <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->product_color }}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> قیمت : <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->selling_price }}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> توضیحات : <span class="tx-danger">*</span></label>
                  <br>
                  <p>{!! $product->product_details !!}</p>
               
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> لینک ویدیو : <span class="tx-danger">*</span></label>
                  <br>
                  <strong>{{ $product->video_link }}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> عکس اول(عکس اصلی) : <span class="tx-danger">*</span></label><br>
                  <label class="custom-file">
              
                    <img src="{{ URL::to($product->image_one) }}" style="height: 80px; width; 80px;">
                  </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> عکس دوم: <span class="tx-danger">*</span></label><br>
                  <label class="custom-file">
                  <img src="{{ URL::to($product->image_two) }}" style="height: 80px; width; 80px;">

                  </label>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label"> عکس سوم : <span class="tx-danger">*</span></label><br>
                  <label class="custom-file">
                  <img src="{{ URL::to($product->image_three) }}" style="height: 80px; width; 80px;">

                  </label>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <hr>
            <br>
            
            <div class="row">
              <div class="col-lg-4">
               <label class="">
                  @if($product->main_slider == 1)
                  <span class="badge badge-success">فعال</span>

                  @else
                  <span class="badge badge-danger">غیر فعال</span>

                  @endif

                 <span> اسلایدر ابتدایی</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="">
               @if($product->hot_deal == 1)
                  <span class="badge badge-success">فعال</span>

                  @else
                  <span class="badge badge-danger">غیر فعال</span>

                  @endif

                 <span>معامله داغ </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
              <label class="">
               @if($product->best_rated == 1)
                  <span class="badge badge-success">فعال</span>

                  @else
                  <span class="badge badge-danger">غیر فعال</span>

                  @endif

                 <span>بهترین امتیاز </span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="">
               @if($product->trend == 1)
                  <span class="badge badge-success">فعال</span>

                  @else
                  <span class="badge badge-danger">غیر فعال</span>

                  @endif

                 <span> روند محصول</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="">
               @if($product->mid_slider == 1)
                  <span class="badge badge-success">فعال</span>

                  @else
                  <span class="badge badge-danger">غیر فعال</span>

                  @endif

                 <span>  اسلایدر وسط</span>
               </label>
              </div> <!-- col-4 -->

              <div class="col-lg-4">
               <label class="">
               @if($product->hot_new == 1)
                  <span class="badge badge-success">فعال</span>

                  @else
                  <span class="badge badge-danger">غیر فعال</span>

                  @endif

                 <span>خبر داغ </span>
               </label>
              </div> <!-- col-4 -->

            </div>
            
           
          </div><!-- form-layout -->
        </div><!-- card -->

      


       </div>

       
    </div><!-- sl-mainpanel -->
 

@endsection
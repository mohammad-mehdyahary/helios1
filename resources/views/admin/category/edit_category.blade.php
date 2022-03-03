@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>بروزرسانی دسته </h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">بروزرسانی دسته 
            
          </h6>
         

          <div class="table-wrapper">
          @if ($errors->any())
                 <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                 </ul>
                </div>
               @endif 
              <form method="post" action="{{ url('update/category/'.$category->id) }}"> @csrf
               <div class="modal-body pd-20">
                 <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">نام دسته</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" velue="{{ $category->category_name }}" name="category_name">
                 </div>
            
                  </div><!-- table-wrapper -->
                        </div><!-- modal-body -->
                      <div class="modal-footer">
                 <button type="submit" class="btn btn-info pd-x-20">بروزرسانی</button>
               </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection
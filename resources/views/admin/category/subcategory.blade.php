@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>جدول زیر دسته ها</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">لیست زیر دسته ها
              <a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">افزودن</a>
          </h6>
         

          <div class="table-wrapper">
            <div id="datatable1_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="datatable1_length"><label><select name="datatable1_length" aria-controls="datatable1" class="select2-hidden-accessible" tabindex="-1" aria-hidden="true"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 52px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-datatable1_length-yr-container"><span class="select2-selection__rendered" id="select2-datatable1_length-yr-container" title="10">10</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> items/page</label></div><div id="datatable1_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search..." aria-controls="datatable1"></label></div><table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable1_info" style="width: 1220px;">
              <thead>
              <tr>
                  <th class="wd-5p">ID</th>
                  <th class="wd-15p">نام زیر دسته ها</th>
                  <th class="wd-15p">نام دسته ها</th>
                  <th class="wd-20p">فعالیت</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($subcat as $key=>$row)
                <tr>
                  <td>{{ $key +1 }}</td>
                  <td>{{ $row->subcategory_name }}</td>
                  <td>{{ $row->category_name }}</td>
                  <td>
                      <a href="{{ URL::to('edit/subcategory/'.$row->id) }}" class="btn btn-sm btn-info">ویرایش</a>
                      <a href="{{ URL::to('delete/subcategory/'.$row->id) }}" class="btn btn-sm btn-danger">حذف</a>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div><!-- table-wrapper -->
        </div><!-- card -->

      
    </div>




 

     <!-- LARGE MODAL -->
     <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">افزودن زیر دسته</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @if ($errors->any())
                 <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                 </ul>
                </div>
               @endif 
              <form method="post" action="{{ route('store.subcategory') }}">
                @csrf
              <div class="modal-body pd-20">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">نام زیر دسته</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="نام زیر دسته" name="subcategory_name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">نام دسته</label>
    <select name="category_id"  class="form-control">
        @foreach($category as $row)
      <option value="{{ $row->id }}"> {{ $row->category_name }} </option>
        @endforeach
    </select>
  </div>

              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">افزودن</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

@endsection
@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>جدول محصولات ها</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">لیست محصولات ها
              <a href="{{ route('add.product') }}" class="btn btn-sm btn-warning" style="float: right;">افزودن</a>
          </h6>
         

          <div class="table-wrapper">
            <div id="datatable1_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="datatable1_length"><label><select name="datatable1_length" aria-controls="datatable1" class="select2-hidden-accessible" tabindex="-1" aria-hidden="true"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 52px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-datatable1_length-yr-container"><span class="select2-selection__rendered" id="select2-datatable1_length-yr-container" title="10">10</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> items/page</label></div><div id="datatable1_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search..." aria-controls="datatable1"></label></div><table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable1_info" style="width: 1220px;">
              <thead>
              <tr>
                  <th class="wd-15p">کد محصول</th>
                  <th class="wd-15p">نام محصول </th>
                  <th class="wd-20p">تصویر </th>
                  <th class="wd-20p">دسته</th>
                  <th class="wd-20p">برند</th>
                  <th class="wd-20p">تعداد</th>
                  <th class="wd-20p">وضعیت</th>
                  <th class="wd-20p">فعالیت</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($product as $row)
                <tr>
                  <td>{{ $row->product_code }}</td>
                  <td>{{ $row->product_name }}</td>
                  <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"></td>
                  <td>{{ $row->category_name }}</td>
                  <td>{{ $row->brand_name }}</td>
                 
                  <td>{{ $row->product_quantity }}</td>
                  <td>
                      @if($row->status == 1)
                        <span class="badge badge-success">فعال</span>
                      @else
                      <span class="badge badge-danger">غیر فعال</span>
                      @endif

                  </td>

                  <td>
                      <a href="{{ URL::to('edit/product/'.$row->id) }}" class="btn btn-sm btn-info" title="ویرایش"><i class="fa fa-edit"></i></a>
                      <a href="{{ URL::to('delete/product/'.$row->id) }}" class="btn btn-sm btn-danger" title="حذف"><i class="fa fa-trash"></i></a>
                      <a href="{{ URL::to('view/product/'.$row->id) }}" class="btn btn-sm btn-warning" title="دیدن"><i class="fa fa-eye"></i></a>
                      @if($row->status == 1)
                      <a href="{{ URL::to('inactive/product/'.$row->id) }}" class="btn btn-sm btn-denger" title="غیرفعال"><i class="fa fa-thumbs-down"></i></a>
                      @else
                      <a href="{{ URL::to('active/product/'.$row->id) }}" class="btn btn-sm btn-info" title="فعال"><i class="fa fa-thumbs-up"></i></a>

                      @endif
                      
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div><!-- table-wrapper -->
        </div><!-- card -->

      
    </div>



@endsection
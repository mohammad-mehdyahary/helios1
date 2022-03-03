@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>جدول ادمین ها</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">لیست ادمین ها
              <a href="{{ route('create.admin') }}" class="btn btn-sm btn-warning" style="float: right;" >افزودن</a>
          </h6>
         

          <div class="table-wrapper">
            <div id="datatable1_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="datatable1_length"><label><select name="datatable1_length" aria-controls="datatable1" class="select2-hidden-accessible" tabindex="-1" aria-hidden="true"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 52px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-datatable1_length-yr-container"><span class="select2-selection__rendered" id="select2-datatable1_length-yr-container" title="10">10</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> items/page</label></div><div id="datatable1_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search..." aria-controls="datatable1"></label></div><table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable1_info" style="width: 1220px;">
              <thead>
              <tr>
                  <th class="wd-5p">نام</th>
                  <th class="wd-15p">تلفن</th>
                  <th class="wd-25p">دسترسی</th>
                  <th class="wd-10p">فعالیت</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($user as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>
                      @if($row->category == 1)
                      <span class="badge btn-primary">دسته ها</span>
                      @else
                      @endif
                      
                      @if($row->coupon == 1)
                      <span class="badge btn-primary">کد تخفیف </span>
                      @else
                      @endif
                      @if($row->product == 1)
                      <span class="badge btn-primary">محصولات</span>
                      @else
                      @endif
                      @if($row->blog == 1)
                      <span class="badge btn-primary">وبلاگ</span>
                      @else
                      @endif
                      @if($row->order == 1)
                      <span class="badge btn-primary">سفارش ها </span>
                      @else
                      @endif
                      @if($row->other == 1)
                      <span class="badge btn-primary">دیگر</span>
                      @else
                      @endif
                      @if($row->report == 1)
                      <span class="badge btn-primary">گزارش </span>
                      @else
                      @endif
                      @if($row->role == 1)
                      <span class="badge btn-primary">نقش</span>
                      @else
                      @endif
                      @if($row->return == 1)
                      <span class="badge btn-primary">برگشت داده شده</span>
                      @else
                      @endif
                      @if($row->contact == 1)
                      <span class="badge btn-primary">ارتباطات</span>
                      @else
                      @endif
                      @if($row->comment == 1)
                      <span class="badge btn-primary">کامنت ها</span>
                      @else
                      @endif
                      @if($row->setting == 1)
                      <span class="badge btn-primary">تنظیمات</span>
                      @else
                      @endif
                      @if($row->stock == 1)
                      <span class="badge btn-primary">موجودی </span>
                      @else
                      @endif
                    </td>
                  <td>
                      <a href="{{ URL::to('edit/admin/'.$row->id) }}" class="btn btn-sm btn-info">ویرایش</a>
                      <a href="{{ URL::to('delete/admin/'.$row->id) }}" class="btn btn-sm btn-danger">حذف</a>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div><!-- table-wrapper -->
        </div><!-- card -->

      
    </div>




 


@endsection
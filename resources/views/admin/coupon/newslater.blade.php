@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>لیست مشترکین</h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <form action="" method="post">
            @csrf
            @method('DELETE')
            <button formaction="{{ route('deleteall') }}" type="submit" class="btn btn-danger">حذف همه</button>
          <h6 class="card-body-title">لیست مشترکین 
            
          </h6>
         

          <div class="table-wrapper">
            <div id="datatable1_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="datatable1_length"><label><select name="datatable1_length" aria-controls="datatable1" class="select2-hidden-accessible" tabindex="-1" aria-hidden="true"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 52px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-datatable1_length-yr-container"><span class="select2-selection__rendered" id="select2-datatable1_length-yr-container" title="10">10</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> items/page</label></div><div id="datatable1_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search..." aria-controls="datatable1"></label></div><table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable1_info" style="width: 1220px;">
              <thead>
              <tr>
                  <th class="wd-5p">ID</th>
                  <th class="wd-15p"> ایمیل</th>
                  <th class="wd-15p"> زمان اشتراک</th>
                  <th class="wd-20p">فعالیت</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($sub as $key=>$row)
                <tr>
                  <td><input type="checkbox" name="ids[]" value="{{ $row->id }}">{{ $key +1 }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ \Carbon\Carbon::parse($row->created_at)->diffForhumans() }}</td>
                  <td>
                      <a href="{{ URL::to('delete/sub/'.$row->id) }}" class="btn btn-sm btn-danger">حذف</a>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div><!-- table-wrapper -->
        </div><!-- card -->

      
    </div>



  </form>
 

    

@endsection
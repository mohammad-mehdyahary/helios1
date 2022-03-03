@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5> گزارش درآمد ماهیانه  </h5>
         
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title"><span class="badge badge-success"><h5>جمع کل این ماه {{ $total }} تومان</h5> </span></h6>
         

          <div class="table-wrapper">
            <div id="datatable1_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="datatable1_length"><label><select name="datatable1_length" aria-controls="datatable1" class="select2-hidden-accessible" tabindex="-1" aria-hidden="true"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 52px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-datatable1_length-yr-container"><span class="select2-selection__rendered" id="select2-datatable1_length-yr-container" title="10">10</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> items/page</label></div><div id="datatable1_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search..." aria-controls="datatable1"></label></div><table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable1_info" style="width: 1220px;">
              <thead>
              <tr>
                  <th class="wd-5p">نوع پرداخت</th>
                  <th class="wd-15p">ID تراکنش </th>
                  <th class="wd-15p">جمع جز </th>
                  <th class="wd-20p">حمل و نقل</th>
                  <th class="wd-20p">جمع</th>
                  <th class="wd-20p">تاریخ</th>
                  <th class="wd-20p">وضعیت</th>
                  <th class="wd-20p">فعالیت</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($order as $row)
                <tr>
                  <td>{{ $row->payment_type }}</td>
                  <td>{{ $row->blnc_transection }}</td>
                  <td>{{ $row->subtotal }} T</td>
                  <td>{{ $row->shipping }} T</td>
                  <td>{{ $row->total }} T</td>
                  <td>{{ $row->date }} </td>
                  <td>
                  @if($row->status == 0)
                                    <span class="badge badge-warning">در انتظار</span> 
                                     @elseif($row->status == 1)
                                    <span class="badge badge-info">تاییده پرداخت  </span> 
                                    @elseif($row->status == 2)
                                    <span class="badge badge-warning"> جریان </span> 
                                    @elseif($row->status == 3)
                                    <span class="badge badge-success"> تحویل داده شد </span> 
                                    @else
                                    <span class="badge badge-danger">  لغو  </span> 
                                    @endif
                  </td>
                  <td>
                      <a href="{{ URL::to('admin/view/order/'.$row->id) }}" class="btn btn-sm btn-info">تماشا</a>
                     

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            
          </div><!-- table-wrapper -->
        </div><!-- card -->

      
        </div><!-- modal -->

@endsection
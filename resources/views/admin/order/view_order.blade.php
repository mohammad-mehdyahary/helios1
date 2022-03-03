@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
 <div class="sl-pagebody">
     <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">جزییات سفارش </h6>

          <div class="row">
          <div class="col-md-6">
              <div class="card">
                <div class="card-header"><strong> جزییات </strong> خرید </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>نام: </th>
                            <th>{{ $order->name }} </th>
                        </tr>
                        <tr>
                            <th>تلفن: </th>
                            <th>{{ $order->phone }} </th>
                        </tr>
                        <tr>
                            <th>نوع پرداخت: </th>
                            <th>{{ $order->payment_type }} </th>
                        </tr>
                        <tr>
                            <th> پرداخت ID: </th>
                            <th>{{ $order->payment_id }} </th>
                        </tr>
                        <tr>
                            <th>جمع کل: </th>
                            <th>تومان{{ $order->total }}</th>
                        </tr>
                        <tr>
                            <th>ماه: </th>
                            <th>{{ $order->month }}</th>
                        </tr>
                        <tr>
                            <th>تاریخ: </th>
                            <th>{{ $order->date }}</th>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><strong> جزییات</strong>سفارش </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>نام: </th>
                                <th>{{ $shipping->ship_name }} </th>
                            </tr>
                            <tr>
                                <th>تلفن: </th>
                                <th>{{ $shipping->ship_phone }} </th>
                            </tr>
                            <tr>
                                <th>ایمیل: </th>
                                <th>{{ $shipping->ship_email }} </th>
                            </tr>
                            <tr>
                                <th> آدرس: </th>
                                <th>{{ $shipping->ship_address }} </th>
                            </tr>
                            <tr>
                                <th>شهر: </th>
                                <th>{{ $shipping->ship_city }}</th>
                            </tr>
                            <tr>
                                <th>وضعیت: </th>
                                <th>
                                    @if($order->status == 0)
                                    <span class="badge badge-warning">در انتظار</span> 
                                     @elseif($order->status == 1)
                                    <span class="badge badge-info">تاییده پرداخت  </span> 
                                    @elseif($order->status == 2)
                                    <span class="badge badge-warning"> جریان </span> 
                                    @elseif($order->status == 3)
                                    <span class="badge badge-success"> تحویل داده شد </span> 
                                    @else
                                    <span class="badge badge-danger">  لغو  </span> 
                                    @endif
                                </th>
                            </tr>
                           
                        </table>
                      </div>
                    </div>
                 
                </div> 
                <div class="row col-md-12">
                  <div class="col-12">
                        <h6 class="card-body-title">جزییات محصولات 
         
                           </h6>
     

                        <div class="table-wrapper">
                         <div  class="dataTables_wrapper no-footer"><div class="dataTables_length" id="datatable1_length"><label><select name="datatable1_length" aria-controls="datatable1" class="select2-hidden-accessible" tabindex="-1" aria-hidden="true"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 52px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-datatable1_length-yr-container"><span class="select2-selection__rendered" id="select2-datatable1_length-yr-container" title="10">10</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> items/page</label></div><div id="datatable1_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search..." aria-controls="datatable1"></label></div><table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline collapsed" role="grid" aria-describedby="datatable1_info" style="width: 1220px;">
                       <thead>
                       <tr>
                      <th class="wd-15p">ID محصول</th>
                       <th class="wd-15p">نام محصول </th>
                         <th class="wd-20p">تصویر </th>
                        <th class="wd-20p">رنگ</th>
                          <th class="wd-20p">سایز</th>
                         <th class="wd-20p">تعداد</th>
                      <th class="wd-20p">واحد قیمت</th>
                        <th class="wd-20p">جمع کل</th>
              
                        </tr>
                     </thead>
                       <tbody>
                         @foreach($detalis as $row)
                            <tr>
                              <td>{{ $row->product_code }}</td>
                              <td>{{ $row->product_name }}</td>
                              <td><img src="{{ URL::to($row->image_one) }}" height="50px;" width="50px;"></td>
                              <td>{{ $row->color }}</td>
                              <td>{{ $row->size }}</td>
                             
                              <td>{{ $row->quantity }}</td>
                              <td>{{ $row->singleprice }}</td>
                              <td>{{ $row->totalprice }}</td>
                         
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        
                      </div><!-- table-wrapper -->
                   </div><!-- card -->
                </div>
                @if($order->status == 0)

                <a href="{{ url('admin/payment/accept/'.$order->id) }}" class="btn btn-info">تایید پرداخت</a>
                <a href="{{ url('admin/payment/cancel/'.$order->id) }}" class="btn btn-danger">لغو سفارش</a>
               @elseif($order->status == 1)
               <a href="{{ url('admin/delevery/process/'.$order->id) }}" class="btn btn-info">پروسه تحویل </a>
               @elseif($order->status == 2)
               <a href="{{ url('admin/delevery/done/'.$order->id) }}" class="btn btn-success"> تحویل انجام شد</a>

               @elseif($order->status == 4)
               <strong class="text-danger text-end">سفارش  نا معتبر است </strong>

               @else

               <strong class="text-success text-end">محصول با موفقیت تحویل داده شد</strong>
                @endif
 </div>
</div>


@endsection
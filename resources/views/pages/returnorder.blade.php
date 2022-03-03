@extends('layouts.app')

@section('content')
@php
$order = DB::table('orders')->where('user_id',Auth::id())->orderBy('id','DESC')->limit(10)->get();
@endphp

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-8 card">
                <table class="table table-response">
                  <thead>
                    <tr>
                       <th scope="col">نوع پرداخت</th>
                       <th scope="col">عودت</th>
                       <th scope="col">مقدار</th>
                       <th scope="col">تاریخ</th>
                      
                       <th scope="col">وضعیت</th>
                       <th scope="col">فعالیت</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $row)
                    <tr>
                        <td scope="col">{{ $row->payment_type }}</td>
                        <td scope="col">
                            @if($row->return_order == 0)
                            <span class="badge  btn-warning">برگرداننده نشد </span> 
                             @elseif($row->return_order == 1)
                            <span class="badge  btn-info"> درحال بررسی </span> 
                            @elseif($row->return_order == 2)
                            <span class="badge  btn-success"> موفقیت آمیز </span> 
                           
                            @endif 
                        </td>
                        <td scope="col" class="text-center" style="direction:rtl;">{{ $row->total }}تومان</td>
                        <td scope="col">{{ $row->date }}</td>
                       
                        
                        <td scope="col">
                                    @if($row->status == 0)
                                    <span class="badge badge-warning btn-success">در انتظار</span> 
                                     @elseif($row->status == 1)
                                    <span class="badge badge-info btn-success">تاییده پرداخت  </span> 
                                    @elseif($row->status == 2)
                                    <span class="badge badge-warning btn-success"> جریان </span> 
                                    @elseif($row->status == 3)
                                    <span class="badge badge-success btn-success"> تحویل داده شد </span> 
                                    @else
                                    <span class="badge badge-danger btn-danger">  لغو  </span> 
                                    @endif    
                        </td>

                        <td scope="col">
                            @if($row->return_order == 0)
                            <a href="{{ url('request/return/'.$row->id) }}" class="btn btn-sm btn-danger" id="#return">عودت</a>
                             @elseif($row->return_order == 1)
                            <span class="badge  btn-info"> درحال بررسی </span> 
                            @elseif($row->return_order == 2)
                            <span class="badge  btn-success"> موفقیت آمیز </span> 
                           
                            @endif 
                        </td>
                    </tr>
                   @endforeach
                </tbody>
                </table>

            </div>
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('public/frontend/images/user.png') }}" class="card-img-top" style="height:90px; width:90px; margin-left:34%;border-radius: 50%;margin-top:1rem;">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{ Auth::user()->name }}</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-end"><a href="{{ route('password.change') }}">تغییر رمز</a></li>
                        <li class="list-group-item text-end" ><a href="" style="color: darkgrey">ویرایش پروفایل</a></li>
                        <li class="list-group-item text-end"><a href="{{ route('success.orderlist') }}">عودت سفارش</a></li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block " style="font-size:1rem;">خروج از حساب</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-1">
                <div class="contact_form_title text-center"><h4 style="font-family: 'Vazir';">وضعیت سفارش شما</h4></div><br>
                <div class="progress">
                    @if($track->status == 0)
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
                    @elseif($track->status == 1)
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
                    @elseif($track->status == 2)
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>

                    @elseif($track->status == 3)
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    @else
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                    @endif
                
                   </div><br>
                   @if($track->status == 0)
                   <h4 class="text-center" style="font-family: 'Vazir'; color:royalblue;">سفارش شما در دست بررسی است</h4>
                   @elseif($track->status == 1)
                   <h4 class="text-center" style="font-family: 'Vazir'; color:royalblue;">پرداخت در مرحله پذیرش است</h4>
                   @elseif($track->status == 2)
                   <h4 class="text-center" style="font-family: 'Vazir'; color:royalblue;">فرایند تحویل بسته انجام شد</h4>
                   @elseif($track->status == 3)
                   <h4 class="text-center" style="font-family: 'Vazir'; color:royalblue;">سفارش کامل شد</h4>
                   @else
                   <h4 class="text-center" style="font-family: 'Vazir'; color:royalblue;">سفارش لغو شد</h4>
                   @endif
            </div>
            
            <div class="col-lg-4 offset-lg-1" >
                <div class="contact_form_title text-center"><h4 style="font-family: 'Vazir';">جزئیات سفارش شما</h4></div><br>
                <ul class="list-group col-lg-12">
                    <li class="list-group-item text-end"><b>نوع پرداخت</b>:{{ $track->payment_type }}</li>
                    <li class="list-group-item text-end"><b>شناسه تراکنش</b>:{{ $track->payment_id }}</li>
                    <li class="list-group-item text-end"><b>شناسه موجودی</b>: {{ $track->blnc_transection }}</li>
                    <li class="list-group-item text-end"><b>جمع فاکتور</b>:{{ $track->subtotal }} تومان</li>
                    <li class="list-group-item text-end"><b>هزینه پست</b>:{{ $track->shipping }} تومان</li>
                    <li class="list-group-item text-end"><b>مالیات</b>:{{ $track->vat }} تومان</li>
                    <li class="list-group-item text-end"><b>جمع کل</b>:{{ $track->total }}  تومان</li>
                    {{-- <li class="list-group-item text-end"><b>ماه</b>:{{ $track->month }}</li> --}}
                    <li class="list-group-item text-end"><b>تاریخ</b>:{{ $track->date }}</li>
                    <li class="list-group-item text-end"><b>سال</b>:{{ $track->year }}</li>
                </ul>
            </div><b>
        </div>
    </div>
</div>
@endsection
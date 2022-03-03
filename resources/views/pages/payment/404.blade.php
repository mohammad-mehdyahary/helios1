@extends('layouts.app')


@section('content')
@include('layouts.menubar')
<div style="width: 100%;height:20rem;">
    <div style="display: flex;justify-content: center;width: 100%;height: 100%;">
        <img src="{{ asset('public/frontend/images/404.jpg') }}" class="image404">
    </div>
</div>
@endsection
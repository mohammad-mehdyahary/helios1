@extends('layouts.app')

@section('content')
@include('layouts.menubar')

<!-- Single Blog Post -->
@foreach($posts as $row)
<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title text-center">
                    @if(Session()->get('lang') == 'farsi')
                              {{ $row->post_title_fa }}
                              @else
                              {{ $row->post_title_en }}
                              @endif 
                    </div>

					<div class="single_post_text">
						<p> 
                        @if(Session()->get('lang') == 'farsi')
                              {!! $row->details_fa !!}
                              @else
                              {!! $row->details_en !!}
                              @endif 
                        </p>

					</div>
				</div>
			</div>
		</div>
	</div>
    @endforeach
@endsection
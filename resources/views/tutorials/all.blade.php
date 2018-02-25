{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Tutoriais</h1>
      </div>
    </div>

    <div class="container">
    		@if(count($tutorials) > 0)
    		<div class="row">
    			@foreach ($tutorials as $tutorial)
    				<div class="col-3">
    					<div class="card">
    							@if ($tutorial['thumbnail'] == NULL)
    								<img class="card-img-top" src="{{asset("assets/images/thumbnail-default.jpg")}}" alt="{{$tutorial['title']}}">
    							@else
    								<img class="card-img-top" src="{{asset($tutorial['thumbnail'])}}" alt="{{$tutorial['title']}}">
    							@endif
    						<div class="card-body">
    						<h5 class="card-title">{{$tutorial['title']}}</h5>
    						<p class="card-text">{{$tutorial['resume']}}</p>
    						<a href="{{URL::route('tutorials.single', ['tutorial' => $tutorial->id])}}" class="btn btn-primary">Ver</a>
    						</div>
    					</div>
    				</div>
    			@endforeach
    		</div>
        @else
    			<p>Nenhum tutorial cadastrado.</p>
    	  @endif
    </div>
@endsection

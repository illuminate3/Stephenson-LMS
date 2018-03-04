{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Cursos</h1>
      </div>
    </div>

    <div class="container">
    		@if(count($courses) > 0)
    			<div class="row">
    				@foreach($courses as $course)
    				<div class="col-3">
    					<div class="card">
    							@if($course['cover'] == NULL)
    								<img class="card-img-top" src="{{ asset("assets/images/thumbnail-default.jpg")}}" alt="{{ $course['title']}}">
    							@else
    								<img class="card-img-top" src="{{ asset($course['cover'])}}" alt="{{ $course['title']}}">
    							@endif
    						<div class="card-body">
    						<h5 class="card-title">{{ $course['title']}}</h5>
    						<p class="card-text">{{ $course['resume']}}</p>
    						<a href="{{ URL::route('courses.single', ['course' => $course->id])}}" class="btn btn-primary">Ver</a>
    						</div>
    					</div>
    				</div>
    			@endforeach
    		</div>
      @else
    			<p>Nenhum curso cadastrado.</p>
    	@endif
    </div>
@endsection

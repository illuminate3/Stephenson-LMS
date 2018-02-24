{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Meus Cursos</h1>
      </div>
    </div>

    <div class="container">
    	<ul class="nav nav-tabs mb-3">
    		<li class="nav-item">
    			<a class="nav-link {{ ($loop == "studying") ? "active" : null}}" href="{{ URL::route('courses.user_courses') }}">Cursando</a>
    		</li>

    		<li class="nav-item">
    			<a class="nav-link {{ ($loop == "favorites") ? "active" : null}}" href="{{ URL::route('courses.user_favorite_courses') }}">Favoritos</a>
    		</li>
    	</ul>

    	@if(count($courses) > 0)
    		<div class="row">
    			@foreach($courses as $course)
    				<div class="col-3">
    					<div class="card">
    							@if($course->course->cover == NULL)
    								<img class="card-img-top" src="{{ asset("assets/images/thumbnail-default.jpg") }}" alt="{{ $course['title'] }}">
    							@else
    								<img class="card-img-top" src="{{ asset($course->course->cover) }}" alt="{{ $course['title'] }}">
    							@endif
    						<div class="card-body">
    						<h5 class="card-title">{{ $course->course->title }}</h5>
    						<p class="card-text">{{ $course->course->resume }}</p>
    						<a href="{{ URL::route('courses.single', ['course' => $course->course->id])}}" class="btn btn-primary">Ver</a>
    						</div>
    					</div>
    				</div>
    			@endforeach
    		</div>
    	@else
    		@if($loop == "studying")
    			<p>Você não está cursando nenhum curso atualmente.</p>
    		@else
    			<p>Você não favoritou nenhum curso.</p>
    		@endif
    	@endif
    </div>
@endsection

{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <style media="screen">
      .course-header{
        background: url('<?php echo $course->cover; ?>');
        width:100%;
        height: 400px;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
      }
    </style>
    <div class="course-header">
      <div class="container">
        <h2>{{$course->title}}</h2>
        <p>{{$course->resume}}</p>
      </div>
    </div>
    <div class="container">
    	<div class="row">
    		<div class="col-3">
    			<div class="card" id="course-sidebar">
    				<div class="card-body">
    				@auth
    					<form method="post" action="{{ URL::route('courses.enter_course', ['course_id' => $course->id, 'user_id' => Auth::user()->id, 'type' => 2])}}">
    						<button class="btn btn-primary btn-block" type="submit">Entrar no Curso</button>
    						<input type="hidden" name="_token" value="{{ csrf_token()}}">
    					</form>
    				@endauth
            @guest
    					<a href="{{ URL::route('login')}}" class="btn btn-primary btn-block">Entrar no Curso</a>
    				@endguest
    				<div id="course-info">
    					<div class="info"><i class="ion-ios-person-outline"></i><a href="{{URL::route('profile.profile', ['id' => $course->author->user])}}">{{ $course->author->firstname . " " . $course->author->lastname}}</a></div>
    					<div class="info"><i class="ion-ios-folder-outline"></i>{{ count($course->getModules)}} módulos</div>
    					<div class="info"><i class="ion-ios-videocam-outline"></i>{{ count($course->getLessons)}} aulas</div>
    				</div>
    				</div>
    			</div>
    		</div>

    		<div class="col-9">
    			@if ($course->description == null)
    				<p>Nenhuma descrição disponível para este curso.</p>
    			@else
            {!! $course->description !!}
          @endif
    		</div>
    	</div>
    </div>
@endsection

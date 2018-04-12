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
        <div class="row">
          <div class="col-lg-9 offset-lg-3 course-title">
            <div class="align-bottom">
              <h2>{{$course->title}}</h2>
              <p>{{$course->resume}}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
    	<div class="row">
    		<div class="col-3">
    			<div class="card" id="course-sidebar">
    				<div class="card-body">
              <div class="course-price">
                R$ 200,00
              </div>
    				@auth
    					<form method="post" action="{{ URL::route('courses.enter_course', ['course_id' => $course->id, 'user_id' => Auth::user()->id, 'type' => 2])}}">
    						<button class="btn btn-primary btn-block" type="submit">Adquirir Curso</button>
    						<input type="hidden" name="_token" value="{{ csrf_token()}}">
    					</form>
    				@endauth
            @guest
    					<a href="{{ URL::route('login')}}" class="btn btn-primary btn-block">Adquirir Curso</a>
    				@endguest
    				<div id="course-info" class="mt-2">
              <div class="info"><i class="fa fa-video"></i>{{ count($course->getLessons)}} aulas</div>
              <div class="info"><i class="fa fa-user"></i>{{ count($course->getStudents)}} alunos</div>
              <div class="info"><i class="fa fa-language"></i>Idioma: Portugues</div>
              <div class="info"><i class="fa fa-certificate"></i>Possui Certificado</div>
    				</div>
    				</div>
    			</div>
    		</div>

    		<div class="col-lg-9 pt-4">
    			@if ($course->description == null)
    				<p>Nenhuma descrição disponível para este curso.</p>
    			@else
            {!! $course->description !!}
          @endif
    		</div>
    	</div>
    </div>
@endsection

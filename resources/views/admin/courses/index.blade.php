{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Cursos</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Cursos</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->

		<div class="container-fluid">
			<?php
				if (session('success')){
					if (session('success')['success'] == false){
						echo '<div class="alert alert-danger" role="alert">' . session('success')['messages'] . '</div>';
					} else {
						echo '<div class="alert alert-success" role="alert">' . session('success')['messages'] . '</div>';
					}
				}
			?>

				@if(count($courses) < 1)
					<p>{{__('messages.no_course_created')}} <a href="{{URL::route('courses.create')}}">{{__('messages.create_course')}}</a></p>
        @else
				<div class="row">
					@foreach($courses as $course)

					<div class="col-3">
						<div class="card">
							<img class="card-img-top" src="{{ $course->cover}}" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title">
									{{ $course->title}}
								</h5>
							</div>
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><i class="material-icons">person</i>
									{{ count($course->getStudents)}} aluno</li>
								<li class="list-group-item"><i class="material-icons">folder</i>
									{{ count($course->getModules)}} módulos</li>
								<li class="list-group-item"><i class="material-icons">video_library</i>
									{{ count($course->getLessons)}} aulas</li>
							</ul>
							<div class="card-body">
								<a class="card-link" href="{{ URL::route('courses.edit', ['course_id' =>  $course['id']])}}">Editar</a>
								<a class="card-link" href="{{ URL::route('courses.manage', ['course_id' =>  $course['id']])}}">Gerenciar</a>
								<a class="card-link" href="{{ URL::route('courses.single', ['course' => $course['id']])}}">Ver</a>
							</div>
						</div>
					</div>
          @endforeach
				</div>
        @endif
		</div>
@endsection

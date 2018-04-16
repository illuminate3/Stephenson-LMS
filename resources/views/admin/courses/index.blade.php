{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <!-- Bread crumb -->
    <div class="pages-navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Cursos</li>
      </ol>
    </div>

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
          <h3 class="text-primary">Cursos</h3>
        </div>

        <div class="col-md-7">
          <div class="btn-group float-right" role="group">
            <a class="btn btn-secondary" href="{{URL::route('courses.create')}}"><i class="fa fa-plus-circle"></i> Criar</a>

            <a class="btn btn-secondary" href="{{URL::route('courses.all')}}" target="_blank"><i class="fa fa-eye"></i> Ver Todos</a>
          </div>
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
						<div class="card admin-course">
              <div class="course-thumbnail">
                @if(is_null($course->cover))
                  <img src="{{asset('assets/admin/images/thumbnail-default.jpg')}}">
                @else
                  <img src="{{ $course->cover}}">
                @endif
            </div>

							<div class="card-body">
								<h5 class="card-title">
									{{ $course->title}}
								</h5>

  							<ul class="list-group list-group-flush">
  								<li class="list-group-item"><i class="fa fa-user"></i>
  									{{ count($course->getStudents)}} aluno(s)</li>
  								<li class="list-group-item"><i class="fa fa-folder"></i>
  									{{ count($course->getModules)}} módulo(s)</li>
  								<li class="list-group-item"><i class="fa fa-video"></i>
  									{{ count($course->getLessons)}} aula(s)</li>
  							</ul>

                <div class="btn-group mt-3">
                  <a class="btn btn-primary manage-btn" href="{{URL::route('courses.manage', ['course' => $course->id])}}">Gerenciar</a>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{URL::route('courses.edit', ['course' => $course->id])}}">Editar</a>
                    <a class="dropdown-item" href="{{URL::route('courses.statistics', ['course' => $course->id])}}">Estatísticas</a>
                    <a class="dropdown-item" href="{{URL::route('courses.messages', ['course' => $course->id])}}">Mensagens</a>
                    <a class="dropdown-item" href="{{URL::route('courses.single', ['course' => $course->id])}}">Ver</a>
                  </div>
                </div>

							</div>
						</div>
					</div>
          @endforeach
				</div>
        @endif
		</div>
@endsection

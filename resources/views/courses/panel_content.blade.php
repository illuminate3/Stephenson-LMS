{{-- Chama a template pré pronta --}}
@extends('courses.panel_template')

@section('courseContent')
    @parent
		<div id="modules" class="pt-3">
		@if(count($course->getModules) > 0)
      <div id="modules-list" class="card">
				@php $modules = $course->getModules @endphp
        @foreach ($modules as $module)
          <div class="card module">
            <div class="card-header module-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link module-name" data-toggle="collapse" data-target="#module-{{$module->id}}" aria-expanded="true" aria-controls="collapseOne">
                  {{$module->name}}
                </button>
              </h5>
            </div>

            <div id="module-{{$module->id}}" class="collapse" data-parent="#modules">
              <div class="card-body">
                @if(count($module->getLessons) > 0)
  								<ul class="list-group">
  									@php $lessons = $module->getLessons @endphp
                    @foreach ($lessons as $lesson)
  										<li class="lesson list-group-item">
                          <a href="{{ URL::route('lesson.view_lesson', ['course_id' => $course->id, 'lesson' => $lesson->id]) }}">
                          {{$lesson->title}}
                          </a> -
                          <span class="lesson-time">{{$lesson->time}}</span>
  										</li>
  									@endforeach
  								</ul>
  							@else
  								<div class="no-lesson">Nenhuma aula cadastrada nesse módulo.</div>
  							@endif
              </div>
            </div>
          </div>
				@endforeach
			</div>
    @else
			<div class="no-module card">Nenhum módulo criado. Quem sabe mais tarde...</div>
    @endif
		</div>
@endsection

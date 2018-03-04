{{-- Chama a template pré pronta --}}
@extends('courses.panel_template')

@section('courseContent')
    @parent
		<div id="course-description" class="pt-3">
			@if ($course->description == null)
        <p>Nenhuma descrição disponível para este curso.</p>
      @else
        {{ $course->description }}
      @endif
		</div>
@endsection

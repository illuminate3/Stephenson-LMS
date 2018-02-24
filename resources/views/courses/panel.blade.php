{{-- Chama a template pré pronta --}}
@extends('courses.panel_template')

@section('courseContent')
    @parent
		<div id="course-description" class="pt-3">
			<?php if( $course->description == null){?>
			<p>Nenhuma descrição disponível para este curso.</p>
			<?php } else {echo $course->description;}?>
		</div>
@endsection

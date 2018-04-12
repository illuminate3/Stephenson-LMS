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
      <div class="row">
    <div class="row__inner">
    		@if(count($courses) > 0)
    			<div class="row">
    				@foreach($courses as $course)
            <div class="tile">
              <div class="tile__media">
                @if($course['cover'] == NULL)
                  <img class="tile__img"  src="{{ asset("assets/images/thumbnail-default.jpg")}}" alt="{{ $course['title']}}">
                @else
                  <img class="tile__img"  src="{{ asset($course['cover'])}}" alt="{{ $course['title']}}">
                @endif
              </div>
              <div class="tile__details">
                <div class="tile__title">
                  {{$course->title}}
                </div>
              </div>
            </div>
    			@endforeach
    		</div>
      @else
    			<p>Nenhum curso cadastrado.</p>
    	@endif
    </div>
  </div>
</div>
@endsection

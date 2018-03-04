{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">{{ $tutorial->title }}</h1>
      </div>
    </div>

    <div class="container">
      <div class="embed-responsive embed-responsive-16by9">
        {!! $video_embed !!}
      </div>
    </div>
@endsection

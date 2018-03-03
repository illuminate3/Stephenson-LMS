{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">{{$page->title}}</h1>
      </div>
    </div>

    <div class="container">
    {!! $page->content !!}
    </div>
@endsection

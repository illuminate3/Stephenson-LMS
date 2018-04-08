{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">{{$title}}</h1>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <h3>Filtros</h3>

          <input type="checkbox" name="" value="" checked> Todos<br>
          <input type="checkbox" name="" value=""> Postagens<br>
          <input type="checkbox" name="" value=""> Tutoriais<br>
          <input type="checkbox" name="" value=""> Cursos<br>
          <input type="checkbox" name="" value=""> Usuários<br>
          <input type="checkbox" name="" value=""> Categorias<br>
        </div>

        <div class="col-lg-9">
      @if($courses->count() > 0)
        <h3 class="pt-3 pb-3">Cursos</h3>

        <div class="row">
          @foreach($courses as $course)
          <div class="col-3">
            <div class="card">
                @if ($course['thumbnail'] == NULL)
                  <img class="card-img-top" src="{{asset("assets/images/thumbnail-default.jpg")}}" alt="{{$course['title']}}">
                @else
                  <img class="card-img-top" src="{{asset($course['thumbnail'])}}" alt="{{$course['title']}}">
                @endif
              <div class="card-body">
              <h5 class="card-title">{{$course['title']}}</h5>
              <p class="card-text">{{$course['resume']}}</p>
              <a href="{{URL::route('courses.single', ['course' => $course->id])}}" class="btn btn-primary">Ver</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      @endif

      @if($posts->count() > 0)
        <h3 class="pt-3 pb-3">Postagens</h3>

        <div class="row">
          @foreach($posts as $post)
          <div class="col-3">
            <div class="card">
                @if($post['thumbnail'] == NULL)
                  <img class="card-img-top" src="{{ asset("assets/images/thumbnail-default.jpg") }}" alt="{{ $post['title'] }}">
                @else
                  <img class="card-img-top" src="{{ asset($post['thumbnail'])}}" alt="{{ $post['title'] }}">
                @endif
              <div class="card-body">
                <h5 class="card-title">{{ $post['title'] }}</h5>
                <p class="card-text">{{ $post['resume'] }}</p>
                <a href="{{ URL::route('posts.single', ['post' => $post->id]) }}" class="btn btn-primary">Ver</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      @endif

      @if($tutorials->count() > 0)
        <h3 class="pt-3 pb-3">Tutoriais</h3>

        <div class="row">
          @foreach($tutorials as $tutorial)
          <div class="col-3">
            <div class="card">
                @if ($tutorial['thumbnail'] == NULL)
                  <img class="card-img-top" src="{{asset("assets/images/thumbnail-default.jpg")}}" alt="{{$tutorial['title']}}">
                @else
                  <img class="card-img-top" src="{{asset($tutorial['thumbnail'])}}" alt="{{$tutorial['title']}}">
                @endif
              <div class="card-body">
              <h5 class="card-title">{{$tutorial['title']}}</h5>
              <p class="card-text">{{$tutorial['resume']}}</p>
              <a href="{{URL::route('tutorials.single', ['tutorial' => $tutorial->id])}}" class="btn btn-primary">Ver</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
    </div>
@endsection

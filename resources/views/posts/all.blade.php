{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Postagens</h1>
      </div>
    </div>

    <div class="container">
    	@if(count($posts) > 0)
    	<div class="row">
    		@foreach($posts as $post)
        <div class="col-sm-4">
          <div class="card tutorial-card">
            <a href="{{URL::route('posts.single', ['tutorial' => $post->id])}}">
              @if ($post['thumbnail'] == NULL)
                <img class="card-img-top" src="{{asset('assets/images/thumbnail-default.jpg')}}" alt="{{$post['title']}}">
              @else
                <img class="card-img-top" src="{{asset($post['thumbnail'])}}" alt="{{$post['title']}}">
              @endif
            </a>
            <div class="card-body">
              <h5 class="card-title">{{$post['title']}}</h5>
              <p class="card-text">{{$post['resume']}}</p>

              <div class="card-author">
                <img src="{{asset('uploads/avatars/' . $post->author->avatar)}}">
                <span>{{$post->author->firstname}}</span>
              </div>
            </div>
          </div>
        </div>
    		@endforeach
    	</div>
    @else
    		<p>Nenhuma postagem cadastrada.</p>
    @endif
    </div>
@endsection

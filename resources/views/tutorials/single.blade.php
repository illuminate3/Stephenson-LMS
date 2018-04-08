{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4 pb-2">{{ $tutorial->title }}</h1>
		<b>Tags:</b> {{$tutorial->tags}}
      </div>
    </div>



    <div class="container">
		<ul class="post-info list-inline">
			<li class="list-inline-item"><i class="ion-person"></i><a href="{{ URL::route('profile.profile', ['user' => $tutorial->author->user])}}">{{$tutorial->author->firstname}}</a></li>
			<li class="list-inline-item"><i class="ion-calendar"></i>{{$tutorial->created_at}}</li>
			<li class="list-inline-item"><i class="ion-pricetags"></i>{{$tutorial->category->name}}</li>
		</ul>

      <div class="embed-responsive embed-responsive-16by9">
        {!! $video_embed !!}
      </div>

	  {!! $tutorial->description !!}
			<div id="comments-area" class="mt-5">
				<h3>Comentários</h3>
				<hr>
				@auth
				<div id="comment-box">
				<form method="post" action="{{URL::route('comment.store')}}">
					<div class="form-group">
						<label for="comment-textarea">Publicar um Comentário</label>
						<textarea class="form-control" id="comment-textarea" rows="3" name="content"></textarea>
					</div>

					<button class="btn btn-primary float-right">Publicar</button>

					<input type="hidden" name="author_id" value="{{Auth::user()->id}}">
					<input type="hidden" name="post_id" value="{{$tutorial->id}}">
					<input type="hidden" name="post_type" value="tutorial">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="clearfix"></div>
				</form>
				</div>

				<div class="mt-5" id="comments">
					@foreach($comments as $comment)

					<div class="media mt-4">
							@if ($comment->author->avatar == null)
								<img style="height:64px;"class="align-self-start mr-3" src="{{asset('assets/images/avatar-default.png')}}">
							@else
								<img style="height:64px;" class="align-self-start mr-3" src="/uploads/avatars/{{$comment->author->avatar}}">
							@endif

						<div class="media-body">
							<a href="{{URL::route('profile.profile', ['profile' => $comment->author->user])}}">
								<h5>{{$comment->author->firstname . " " . $comment->author->lastname}}</h5>
							</a>
							<p>{{$comment->content}}</p>
						</div>
					</div>

        @endforeach
				@endauth
				@guest
				<p>É necessário estar logado para comentar. <a href="{{URL::to('/login')}}">Fazer login</a></p>
				@endguest
				</div>
			</div>
    </div>


@endsection

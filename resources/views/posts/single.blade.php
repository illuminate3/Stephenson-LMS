{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
		<div class="jumbotron jumbotron-fluid post">
			<div class="container">
        <div class="tags">
          <?php
            $tags  = $post->tags;
            $tags = explode(",", $tags);
            foreach($tags as $tag){
              echo '<span class="tag">' . $tag . '</span>';
            }
          ?>
        </div>
				<h2 class="display-4">
					{{$post->title}}
				</h2>

        <ul class="post-info list-inline">
          <li class="list-inline-item"><i class="fa fa-user"></i><a href="{{ URL::route('profile.profile', ['user' => $post->author->user])}}">{{$post->author->firstname}}</a></li>
          <li class="list-inline-item"><i class="fa fa-calendar"></i>{{$post->created_at}}</li>
          <li class="list-inline-item"><i class="fa fa-comments"></i>{{count($post->comments)}} comentários</li>
        </ul>
			</div>
		</div>

		<div class="container">
      <div class="row">
        <div class="col-lg-8">
          {!!$post->content!!}
        </div>

        <div class="col-lg-4">
          <div class="card">
            <h5 class="card-header">Facebook</h5>
            <div class="card-body">
              <div class="fb-page" data-href="https://www.facebook.com/escolaltg/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/escolaltg/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/escolaltg/">Escola LTG</a></blockquote></div>
            </div>
          </div>
        </div>
      </div>


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
					<input type="hidden" name="post_id" value="{{$post->id}}">
					<input type="hidden" name="post_type" value="post">
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

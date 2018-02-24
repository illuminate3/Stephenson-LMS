{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">
					<?php echo $post->title ?>
				</h1>
			</div>
		</div>

		<div class="container">
			<?php echo $post->content; ?>

			<div id="comments-area" class="mt-5">
				<h3>Comentários</h3>
				<hr>
				@auth
				<div id="comment-box">
				<form method="post" action="<?php echo URL::route('comment.store');?>">
					<div class="form-group">
						<label for="comment-textarea">Publicar um Comentário</label>
						<textarea class="form-control" id="comment-textarea" rows="3" name="content"></textarea>
					</div>

					<button class="btn btn-primary float-right">Publicar</button>

					<input type="hidden" name="author_id" value="<?php echo Auth::user()->id;?>">
					<input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
					<input type="hidden" name="post_type" value="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="clearfix"></div>
				</form>
				</div>

				<div class="mt-5" id="comments">
					<?php foreach($comments as $comment) {?>

					<div class="media mt-4">
						<?php
							if ($comment->author->avatar == null){
								echo '<img style="height:64px;"class="align-self-start mr-3" src="' . asset('assets/images/avatar-default.png') . '">';
							} else {
								echo '<img style="height:64px;"class="align-self-start mr-3" src="' . $comment->author->avatar .'">';
							}
						?>

						<div class="media-body">
							<a href="<?php echo URL::route('profile.profile', ['profile' => $comment->author->user]); ?>">
								<h5><?php echo  $comment->author->firstname . " " . $comment->author->lastname; ?></h5>
							</a>
							<p><?php echo  $comment->content; ?></p>
						</div>
					</div>

					<?php }?>
				@endauth
				@guest
				<p>É necessário estar logado para comentar. <a href="<?php echo URL::to('/login');?>">Fazer login</a></p>
				@endguest
				</div>
			</div>
		</div>
@endsection

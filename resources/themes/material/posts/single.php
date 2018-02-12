<?php echo view('header', ['title' => $title]); ?>
<main>
	<div class="container">
		<div class="row">
		<div class="col s9">
		<h2><?php echo $post->title; ?></h2>
		<div><?php echo $post->content; ?></div>
		<div class="card tutorial-description">
			<h3>Comentários</h3>
			<?php if (Auth::check()) {?>
			<div id="comment-box">
				<form  method="post" action="<?php echo URL::route('comment.store');?>">
					<div class="row">
						<div class="col s12">
							<textarea placeholder="Faça um comentário" class="materialize-textarea" name="content"></textarea>
						</div>
						<div class="col s12">
							<button class="btn right">Comentar</button>
						</div>
					</div>

					<input type="hidden" name="author_id" value="<?php echo Auth::user()->id;?>">
					<input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
					<input type="hidden" name="post_type" value="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				</form>
				
				<div class="row">
					<div class="col s12">
						<?php 
							if (session('success')){
								echo "<div class='comment-message'>" . session('success')['messages'] . "</div>";
							}
						?>
					</div>
				</div>
				
				<div class="row">
					<?php foreach($comments as $comment) {?>
						<div class="comment">
						<div class="comment-author col s12">
							<div class="comment-author-avatar">
								<?php 
									if ($comment->author->avatar == null){
										echo '<img src="' . url('/images/avatar-default.png') . '">';
									} else {
										echo '<img src="' . $comment->author->avatar .'">';
									} 
								?>
							</div>
							<div class="comment-author-name"><a href="<?php echo URL::route('profile.profile', ['profile' => $comment->author->user]); ?>"><?php echo  $comment->author->firstname . " " . $comment->author->lastname; ?></a></div>
							
							<div class="comment-actions">
								<div class="comment-action">
								<form method="post" action="<?php echo URL::route('comment.destroy', ['id' => $comment->id]);?>">
									<button type="submit"><i class="material-icons">remove_circle</i></button>
									<input type="hidden" value="DELETE" name="_method">
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								</form>
								</div>
								
								<div class="comment-action">
								<button type="submit"><i class="material-icons">edit</i></button>
								</div>
							</div>
							
						</div>
						<div class="comment-content col s12"><?php echo  $comment->content; ?></div>
							<div style="clear:both"></div>
						</div>
					<?php }?>
				</div>
			</div>
			<?php } else {?>
			<p>É necessário estar logado para comentar. <a href="<?php echo URL::to('/login');?>">Fazer login</a></p>
			<?php }?>
		</div>
		</div>
		</div>
	</div>
</main>

<?php echo view('footer'); ?>
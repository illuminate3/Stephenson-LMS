<?php echo view('header', [ 'title' => $title]); ?>
<main>
	<div id="tutorial">
		<div class="container">
			<div class="row">
				<div class="col s8 offset-s2">
					<div id="tutorial-page-title"><h2 class="no-margin"><?php echo $tutorial->title; ?></h2></div>
					<div id="tutorial-info">
						<div class="info"><i class="material-icons">person</i><?php echo $tutorial->author->firstname . " " . $tutorial->author->lastname; ?></div>
						<div class="info"><i class="material-icons">date_range</i><?php echo $tutorial->created_at; ?></div>
						<div class="info"><i class="material-icons">comment</i><?php echo count($comments); ?> comentários</div>
					</div>
					<div class="video-container video-tutorial">
						<?php echo $video_embed; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row" id="tutorial_content">
			<div class="col s9">
				<div class="card tutorial-description">
					<h3>Descrição</h3>
					<div>
						<?php  
						if($tutorial['description'] == null){
							echo "Nenhuma descrição disponível.";
						} else{
							echo $tutorial['description'];
						} 
						?>
					</div>
				</div>
				
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
							<input type="hidden" name="post_id" value="<?php echo $tutorial->id; ?>">
							<input type="hidden" name="post_type" value="tutorial">
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
												echo '<img src="' . theme_url('/images/avatar-default.png') . '">';
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
			<div class="col s3">
				<div class="card">
					<div class="card-content">
					<span class="card-title">Materiais</span>
						<p>Não existem materiais disponíveis para este tutorial.</p>
						<!--
						<ul class="collection">
							<li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">file_download</i></a></div></li>
							<li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">file_download</i></a></div></li>
							<li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">link</i></a></div></li>
						</ul>
						-->
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php echo view('footer'); ?>

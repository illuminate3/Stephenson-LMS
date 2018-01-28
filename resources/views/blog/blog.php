<main>
	<div id="page-title"><div class="container"><h2>Blog</h2></div></div>
	
	<div class="section">
	<div class="container">
				<?php if(count($posts) > 0) { ?>
				<div class="row">
					<?php foreach($posts as $post) { ?>
						<div class="col s12 m6 l3">
							<div class="card">
								<div class="card-image">
									<?php if($post['thumbnail'] == NULL){?>
										<img src="images/thumbnail-default.jpg">
									<?php } else {?>
										<img src="<?php echo $post['thumbnail'] ?>">
									<?php }?>
								</div>
								
								<div class="card-content">
									<span class="card-title"><?php echo $post['title']; ?></span>
									<p><?php echo $post['resume']; ?></p>
								</div>
								<div class="card-action"><a href="<?php echo URL::to('/blog/post/' . $post['id']); ?>">Ver</a></div>
							</div>
						</div>  
					<?php } ?>
				</div>
				<?php } else { ?>
					<p>Nenhuma postagem cadastrada.</p>
				<?php }  ?>
	</div>
	</div>
</main>
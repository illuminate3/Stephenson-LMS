<main>
	<div id="page-title"><div class="container"><h2>Tutoriais</h2></div></div>
	<div class="container">
		<div class="section">
			<?php if(count($tutorials) > 0) { ?>
			<div class="row">
				<?php foreach($tutorials as $tutorial) {?>
					<div class="col s12 m6 l3">
						<div class="card">
							<div class="card-image">
								<?php if($tutorial['thumbnail'] == NULL){?>
									<img src="images/thumbnail-default.jpg">
								<?php } else {?>
									<img src="<?php echo $tutorial['thumbnail'] ?>">
								<?php }?>
								<a class="btn-floating halfway-fab waves-effect waves-light teal"><i class="material-icons">watch_later</i></a>
							</div>
							<div class="card-content">
								<span class="card-title"><?php echo $tutorial['title']; ?></span>
								<p><?php echo $tutorial['resume'] ?></p>
							</div>
							<div class="card-action"><a href="<?php echo URL::to('/tutorial/' . $tutorial['id']); ?>">Ver</a></div>
						</div>
					</div>   
				<?php } ?>
			</div>
			<?php } else {?>
				<p>Nenhum tutorial cadastrado.</p>
			<?php }?>
		</div>
	</div>
</main>

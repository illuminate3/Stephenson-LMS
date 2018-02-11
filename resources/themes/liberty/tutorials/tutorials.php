<?php echo view('header'); ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Tutoriais</h1>
  </div>
</div>
	<div class="container">
			<?php if(count($tutorials) > 0) { ?>
			<div class="row">
				<?php foreach($tutorials as $tutorial) {?>
					<div class="col-3">
						<div class="card">
								<?php if($tutorial['thumbnail'] == NULL){?>
									<img class="card-img-top" src="<?php echo theme_url("images/thumbnail-default.jpg"); ?>" alt="<?php echo $tutorial['title']; ?>">
								<?php } else {?>
									<img class="card-img-top" src="<?php echo theme_url($tutorial['thumbnail']); ?>" alt="<?php echo $tutorial['title']; ?>">
								<?php }?>
							<div class="card-body">
							<h5 class="card-title"><?php echo $tutorial['title']; ?></h5>
							<p class="card-text"><?php echo $tutorial['resume'] ?></p>
							<a href="<?php echo URL::to('/tutorial/' . $tutorial['id']); ?>" class="btn btn-primary">Ver</a>
							</div>
						</div>
					</div>   
				<?php } ?>
			</div>
			<?php } else {?>
				<p>Nenhum tutorial cadastrado.</p>
			<?php }?>
	</div>
<?php echo view('footer'); ?>
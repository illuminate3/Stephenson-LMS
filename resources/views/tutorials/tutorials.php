<main>
	<div class="container">
		<div class="section">
			<div id="page-title"><h2>Tutoriais</h2></div>
			
			<div class="row">
				<?php foreach($tutorials as $tutorial) {?>
					<div class="col s12 m6 l3">
						<div class="card">
							<div class="card-image">
								<img src="https://www.arabamerica.com/wp-content/themes/arabamerica/assets/img/thumbnail-default.jpg">					
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
		</div>
	</div>
</main>

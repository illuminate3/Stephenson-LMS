<main>
	<div id="tutorial">
		<div class="container">
			<div class="row">
				<div class="col s8 offset-s2">
					<div id="tutorial-page-title"><h2 class="no-margin"><?php echo $tutorial['title']; ?></h2></div>
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
			</div>
			<div class="col s3">
				<div class="card">
					<div class="card-content">
					<span class="card-title">Materiais</span>
						<ul class="collection">
						<li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">file_download</i></a></div></li>
						<li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">file_download</i></a></div></li>
						<li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">link</i></a></div></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


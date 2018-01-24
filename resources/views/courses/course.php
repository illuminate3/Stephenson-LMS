<main id="course-single">
	<div class="container">
		<div class="row">
			<div class="col s3">
				<div id="course-cover">
					<img src="<?php echo $course->cover;?>">
				</div>
				<button class="btn">Entrar no Curso</button>
			</div>
			
			<div class="col s9">
				<div id="page-title"><h2><?php echo $course->title;?></h2></div>
				<div id="course-info">
					<div class="info"><?php echo $course->author->firstname . " " . $course->author->lastname;;?></div>
				</div>
				
				<div id="course-description">
					<?php echo $course->description;?>
				</div>
				
				<div id="course-modules">
					<h3>Conteúdos</h3>

					<ul class="collapsible white" data-collapsible="accordion">
						<?php 
							if(count($course->getModules) > 0){
								$modules = $course->getModules;
								foreach ($modules as $module) { 
						?>

						<li>
							<div class="collapsible-header"><?php echo $module['name']; ?></div>
							<div class="collapsible-body">
								<ul class="collection with-header">
									<?php 
										if(count($module->getLessons) > 0){
											$lessons = $module->getLessons;
											foreach ($lessons as $lesson) { 
									?>
									<li class="collection-item">
										<div>
											<a href=""><?php echo $lesson->title; ?></a>
										</div>
									</li>
									<?php }} else{?>
										Nenhuma aula cadastrada nesse módulo.
									<?php }?>
								</ul>
							</div>
						</li>

						<?php } } else{ ?>
							<li style="padding:20px;">Nenhum módulo criado para este curso.</li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
</main>
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
					
					<?php if(count($course->getModules) > 0){?>

					<div id="modules-list" class="card">
						<?php $modules = $course->getModules; foreach ($modules as $module) {  ?>

							<div class="module">
								<div class="module-header">
									<div class="module-name">
										<?php echo $module['name']; ?>
									</div> 
								</div>

								<div class="module-body">
									<?php if(count($module->getLessons) > 0){ ?>

										<div class="lessons-list">
											<?php $lessons = $module->getLessons; foreach ($lessons as $lesson) { ?>
												<div class="lesson">
													<a href="#"><?php echo $lesson->title; ?></a>
												</div>
											<?php }?>
										</div>

									<?php } else{ ?>

										<div class="no-lesson">Nenhuma aula cadastrada nesse módulo.</div>

									<?php }?>
								</div>
							</div>

						<?php } ?>
					</div>
					<?php } else { ?>

					<div class="no-module card">Nenhum módulo criado. Quem sabe mais tarde...</div>

					<?php }?>
				</div>
			</div>
		</div>
		
	</div>
</main>
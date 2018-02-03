<main id="course-single">
	<div class="container">
		<div class="row">
			<div class="col s3">
			<div class="card" id="course-sidebar">
				<div id="course-cover">
					<img src="<?php echo $course->cover;?>">
				</div>
				<div class="container">
				<?php if(count($user_joined) == 0){ ?>
				<form method="post" action="<?php echo URL::route('courses.enter_course', ['course_id' => $course->id, 'user_id' => Auth::user()->id, 'type' => 2]);?>">
					<button class="btn-large" type="submit">Entrar no Curso</button>
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				</form>
				<?php } else { ?>
				<form method="post" action="<?php echo URL::route('courses.leave_course', ['course_id' => $user_joined->id]);?>">
					<button class="btn-large" type="submit">Sair do Curso</button>
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				</form>
				<?php } ?>
				</div>
			</div>
			</div>
			
			<div class="col s9">
				<h2 class="course-title"><?php echo $course->title;?></h2>
				
				<div id="course-info">
					<div class="info"><i class="material-icons">person</i><?php echo $course->author->firstname . " " . $course->author->lastname;?></div>
					<div class="info"><?php echo count($course->getModules)?> módulos</div>
					<div class="info"><i class="material-icons">video_library</i><?php echo count($course->getLessons)?> aulas</div>
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
													<?php echo $lesson->title; ?> - <span class="lesson-time"><?php echo $lesson->time; ?></span>
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
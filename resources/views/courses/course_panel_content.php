				<div id="course-modules">
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

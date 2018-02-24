{{-- Chama a template pré pronta --}}
@extends('courses.panel_template')

@section('courseContent')
    @parent
		<div id="course-modules" class="pt-3">
			<?php if(count($course->getModules) > 0){?>

			<div id="modules-list" class="card">
				<?php $modules = $course->getModules; foreach ($modules as $module) {  ?>

					<div class="module">
						<div class="module-header">
							<div class="module-name">
								<i class="material-icons">folder</i><?php echo $module['name']; ?>
							</div>
						</div>

						<div class="module-body">
							<?php if(count($module->getLessons) > 0){ ?>

								<div class="lessons-list">
									<?php $lessons = $module->getLessons; foreach ($lessons as $lesson) { ?>
										<div class="lesson">
											<i class="material-icons">play_circle_outline</i><a href="<?php echo URL::route('lesson.view_lesson', ['course_id' => $course->id, 'lesson' => $lesson->id]);?>"><?php echo $lesson->title; ?></a> - <span class="lesson-time"><?php echo $lesson->time; ?></span>
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
@endsection

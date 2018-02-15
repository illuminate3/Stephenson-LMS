<nav aria-label="breadcrumb" id="page-nav">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo URL::route('courses.index');?>">
					<?php echo __('messages.courses'); ?>
				</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo __('messages.manage_course'); ?>
			</li>
		</ol>
	</div>
</nav>

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">
			<?php echo __('messages.manage_course'); ?>
		</h1>
	</div>
</div>

<div class="container">
	<?php 
		if (session('success')){
			if (session('success')['success'] == false){
				echo '<div class="alert alert-danger" role="alert">' . session('success')['messages'] . '</div>';
			} else {
				echo '<div class="alert alert-success" role="alert">' . session('success')['messages'] . '</div>';
			}
		}
	?>
	
	<?php if(count($course->getModules) > 0){?>
	<div id="modules-list">
		<?php $modules = $course->getModules; foreach ($modules as $module) {  ?>
		<div class="card module" id="module-<?php echo $module->id ?>">
			<div class="card-header" id="module-heading-<?php echo $module->id ?>">
				<div class="row">
					<h5 class="mb-0 col-9">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-<?php echo $module->id ?>" aria-expanded="false" aria-controls="collapse-<?php echo $module->id ?>">
						 <?php echo $module->name ?>
					  </button>
					</h5>

					<div class="module-actions col-3">
					<div class="btn-group action-buttons" role="group">
						<a href="#">
							<button type="button" class="btn btn-primary"><i class="material-icons">edit</i></button>
						</a>
						
						<form method="post" action="<?php echo URL::route('course.module.destroy', ['course_id' => $course->id, 'module_id' =>  $module['id']]);?>">
							<button type="submit" class="btn btn-danger"><i class="material-icons">remove_circle_outline</i></button>
							<input type="hidden" value="DELETE" name="_method">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						</form>
					</div>
					</div>
				</div>
			</div>
			<div id="collapse-<?php echo $module->id ?>" class="collapse" aria-labelledby="module-heading-<?php echo $module->id ?>" data-parent="#modules-list">
				<div class="card-body">
					<?php if(count($module->getLessons) > 0){ ?>

					<div class="lesson-list">
						<?php $lessons = $module->getLessons; foreach ($lessons as $lesson) { ?>
						<div class="card lesson" id="lesson-<?php echo $lesson->id ?>">
							<div class="card-header" id="lesson-heading-<?php echo $lesson->id; ?>">
								<div class="row">
									<h5 class="mb-0 col-9">
										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lesson-collapse-<?php echo $lesson->id; ?>" aria-expanded="false" aria-controls="collapseTwo">
											<?php echo $lesson->title ?>
									   </button>
									</h5>

									<div class="lesson-actions col-3">
									<div class="btn-group action-buttons text-right" role="group">

  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dropdown
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item" href="#">Dropdown link</a>
      <a class="dropdown-item" href="#">Dropdown link</a>
    </div>
  </div>
										<a href="<?php echo URL::route('course.module.lesson.edit',['course_id' => $course->id, 'module_id' => $module->id, 'lesson_id' => $lesson->id]);?>">
											<button type="button" class="btn btn-primary"><i class="material-icons">edit</i></button>
										</a>
										
										<form method="post" action="<?php echo URL::route('course.module.lesson.destroy', ['course_id' => $course->id, 'module_id' =>  $module->id, 'lesson_id' => $lesson->id]);?>">
											<button type="submit" class="btn btn-danger"><i class="material-icons">remove_circle_outline</i></button>
											<input type="hidden" value="DELETE" name="_method">
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										</form>
									</div>
									</div>
								</div>
							</div>
							<div id="lesson-collapse-<?php echo $lesson->id; ?>" class="collapse" aria-labelledby="lesson-heading-<?php echo $lesson->id; ?>" data-parent=".lesson-list">
								<div class="card-body">
									Nenhum material cadastrado para esta aula.
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php } else { ?> Nenhuma aula cadastrada
					<?php } ?>
					<a class="btn btn-primary btn-lg btn-block mt-3" href="<?php echo URL::route('course.module.lesson.create',['course_id' => $course->id, 'module_id' => $module->id]);?>">
						Criar Aula para este Módulo	
					</a>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="card">
			<div class="card-body">
				<form class="form-inline" method="post" action="<?php echo URL::route('course.module.store',['course_id' => $course->id]);?>">
					<div class="form-group">
						<label for="inlineFormInputName2">Criar um Módulo</label>
						<input type="text" class="form-control mx-sm-3" id="inlineFormInputName2" placeholder="Nome do Módulo" name="name">
					</div>
					<input type="hidden" name="course_id" value="<?php echo $course['id'] ?>">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<button type="submit" class="btn btn-primary sm-3">Criar</button>

				</form>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

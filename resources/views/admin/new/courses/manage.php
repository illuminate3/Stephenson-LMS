
<meta name="csrf-token" content="<?php echo csrf_token(); ?>">

<div id="form-modal" class="modal"></div>

<div id="course-header">
	<div class="container">
		<h2>Gerenciar <?php echo $course['title'];?></h2>	
		      <ul class="tabs">
        <li class="tab col s3"><a href="<?php echo URL::route('courses.edit', ["course" => $course->id]) ?>" target="_self">Editar</a></li>
        <li class="tab col s3"><a href="<?php echo URL::route('courses.manage', ["course" => $course->id]) ?>" target="_self" class="active">Gerenciar</a></li>
        <li class="tab col s3"><a href="<?php echo URL::route('courses.statistics', ["course" => $course->id]) ?>" target="_self">Estatísticas</a></li>
      </ul>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col s12">
			<?php 
			if (session('success')){
				if (session('success')['success'] == true){
					echo "<div class='success-message'>" . session('success')['messages'] . "</div>";
				} else{
					echo "<div class='error-message'>" . session('success')['messages'] . "</div>";
				}
			}
			?>
		</div>
	</div>
	
	<?php if(count($course->getModules) > 0){?>

	<div id="modules-list">
		<?php $modules = $course->getModules; foreach ($modules as $module) {  ?>
		
			<div class="module" id="<?php echo $module['id']; ?>">
				<div class="module-header z-depth-1">
					<div class="drag-module"><i class="material-icons">drag_handle</i></div>
					<div class="module-name">
						<?php echo $module['name']; ?>
					</div> 

					<div class="module-edit">
						<input type="text" value="<?php echo $module['name']; ?>">
					</div>
					<div class="action">
						<form method="post"action="<?php echo URL::route('course.module.destroy', ['course_id' => $course->id, 'module_id' =>  $module->id]);?>">
							<button type="submit" class="red z-depth-1 waves-effect"><i class="material-icons">remove_circle_outline</i></button>
							<input type="hidden" value="DELETE" name="_method">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						</form>
					</div>
					
					<div class="action edit-button">
						<button type="submit" class="teal z-depth-1 waves-effect"><i class="material-icons">edit</i></button>
					</div>
					
				</div>
				
				<div class="module-body">
					<?php if(count($module->getLessons) > 0){ ?>
					
						<div class="lessons-list">
							<?php $lessons = $module->getLessons; foreach ($lessons as $lesson) { ?>
								<div class="lesson" id="<?php echo $lesson->id; ?>">
									<div class="lesson-header z-depth-1">
										<div class="drag-lesson"><i class="material-icons">drag_handle</i></div>
										<div class="lesson-name"><?php echo $lesson->title; ?></div>
									
										<div class="action">
											<form method="post" action="<?php echo URL::route('course.module.lesson.destroy', ['course_id' => $course->id, 'module_id' =>  $module->id, 'lesson_id' => $lesson -> id]);?>">
												<button type="submit" class="red z-depth-1 waves-effect"><i class="material-icons">remove_circle_outline</i></button>
												<input type="hidden" value="DELETE" name="_method">
												<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
											</form>
										</div>

										<div class="action"><a href="<?php echo URL::route('course.module.lesson.edit',['course_id' => $course->id, 'module_id' => $module->id, 'lesson_id' => $lesson->id]);?>"><button class="teal z-depth-1 waves-effect"><i class="material-icons">edit</i></button></a></div>

										<div class="action"><a href="#form-modal" class="modal-trigger" id="add_note"><button class="blue"><i class="material-icons">note_add</i></button></a></div>
										<div class="action"><a href="#form-modal" class="modal-trigger" id="add_poll"><button class="blue"><i class="material-icons">question_answer</i></button></a></div>
										<div class="action"><a href="#form-modal" class="modal-trigger" id="add_image"><button class="blue"><i class="material-icons">photo</i></button></a></div>
										<div class="action"><a href="#form-modal" class="modal-trigger" id="add_video"><button class="blue"><i class="material-icons">play_arrow</i></button></a></div>
									</div>
									<div class="lesson-body">
									<?php if(count($lesson->getMaterials) > 0){ ?>
									<div class="materials">
										<?php $materials = $lesson->getMaterials; foreach ($materials as $material) { ?>
											<div id="material">
												<?php
													switch ($material->type) {
													case "add_note":
														echo "<i class='material-icons'>note</i>";
														break;
													case "add_poll":
														echo "<i class='material-icons'>question_answer</i>";
														break;
													case "add_photo":
														echo "<i class='material-icons'>photo</i>";
														break;
													case "add_video":
														echo "<i class='material-icons'>play_arrow</i>";
														break;
													}
												?>
												<?php echo $material->title;?>
											</div>	
										<?php }?>
									</div>
									<?php }?>
									</div>
								</div>
							<?php }?>
						</div>
					
					<?php } else{ ?>
					
						<div class="no-lesson">Nenhuma aula cadastrada nesse módulo.</div>
					
					<?php }?>
					
					<div class="create-lesson">
						<a href="<?php echo URL::route('course.module.lesson.create',['course_id' => $course->id, 'module_id' => $module->id]);?>"><button class="btn">Adicionar Aula</button></a>
					</div>
				</div>
			</div>
		
		<?php } ?>
	</div>
	<?php } else { ?>
	
	<div class="no-module card">Nenhum módulo criado, clique no botão abaixo para criar um.</div>
	
	<?php }?>

	<div id="create-module" class="card">
		<form method="post" action="<?php echo URL::route('course.module.store',['course_id' => $course->id]);?>">
			<input type="text" placeholder="Nome do Modulo" name="name">
			<button class="btn">Adicionar</button>
			
			<input type="hidden" name="course_id" value="<?php echo $course['id'] ?>">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</div>
	
</div>
<div class="container">
	<nav class="z-depth-0 transparent breadcrumbs">
		<div class="nav-wrapper">
			<div class="col s12">
				<a href="<?php echo URL::route('courses.index') ?>" class="breadcrumb">Cursos</a>
				<a href="#" class="breadcrumb">Gerenciar Curso</a>
			</div>
		</div>
	</nav>

	<h2>Gerenciar <?php echo $course['title'];?></h2>
	
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

	<div id="modules-list" class="card">
		<?php $modules = $course->getModules; foreach ($modules as $module) {  ?>
		
			<div class="module">
				<div class="module-header">
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
								<div class="lesson">
									<a href="<?php echo URL::route('course.module.lesson.edit',['course_id' => $course->id, 'module_id' => $module->id, 'lesson_id' => $lesson->id]);?>"><?php echo $lesson->title; ?></a>
									
									<div class="action">
										<form method="post"action="<?php echo URL::route('course.module.lesson.destroy', ['course_id' => $course->id, 'module_id' =>  $module->id, 'lesson_id' => $lesson -> id]);?>">
											<button type="submit" class="red z-depth-1 waves-effect"><i class="material-icons">remove_circle_outline</i></button>
											<input type="hidden" value="DELETE" name="_method">
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										</form>
									</div>
								</div>
							<?php }?>
						</div>
					
					<?php } else{ ?>
					
						<div class="no-lesson">Nenhuma aula cadastrada nesse módulo.</div>
					
					<?php }?>
					
					<div class="create-lesson">
						<a href="<?php echo URL::route('course.module.lesson.create',['course_id' => $course->id, 'module_id' => $module->id]);?>"><button type="submit" class="btn">Adicionar Aula</button></a>
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
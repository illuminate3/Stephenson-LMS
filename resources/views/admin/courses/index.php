<div class="container">
	
	<div class="page-title"><h2><?php echo __('messages.courses'); ?></h2><a href="<?php echo URL::route('courses.create'); ?>"><button class="btn"><i class="material-icons left">add</i><?php echo __('messages.create'); ?></button></a></div>
	
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
	<?php			
		if(count($courses) < 1){
			echo "<p>" . __('messages.no_course_created') . ". <a href='". URL::route('courses.create') . "'>" .  __('messages.create_course') . "</a></p>";
		} else{
	?>	
	<div class="row">
		<?php foreach($courses as $course) { ?>
			<div class="col s6">
				<div class="card ">
					<div class="card-image">
						<img src="<?php echo $course->cover; ?>">
					</div>
					
					<div class="card-content">
						<span class="card-title"><a href="<?php echo URL::route('courses.edit', ['course_id' =>  $course['id']]);?>"><?php echo $course->title; ?></a></span>
						<div id="course-info">
							<div class="info"><i class="material-icons">person</i><?php echo count($course->getStudents);?> aluno</div>
							<div class="info"><i class="material-icons">folder</i><?php echo count($course->getModules)?> módulos</div>
							<div class="info"><i class="material-icons">video_library</i><?php echo count($course->getLessons)?> aulas</div>
						</div>
						<p>I am a very simple card. I am good at containing small bits of information.
						I am convenient because I require little markup to use effectively.</p>
					</div>
					
					<div class="card-action">
						<a href="<?php echo URL::route('courses.edit', ['course_id' =>  $course['id']]);?>">Editar</a>
						<a href="<?php echo URL::route('courses.manage', ['course_id' =>  $course['id']]);?>">Gerenciar</a>
						<a href="<?php echo URL::to('/curso/' . $course['id']);?>">Ver</a>
					</div>
				</div>
			</div>
		<?php }?>
	</div>
	<?php }?>
</div>

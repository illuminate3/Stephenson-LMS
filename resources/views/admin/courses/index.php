<nav aria-label="breadcrumb" id="page-nav">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Cursos</li>
		</ol>
	</div>	
</nav>

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">
			<?php echo __('messages.courses'); ?>
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
	
	<?php			
		if(count($courses) < 1){
			echo "<p>" . __('messages.no_course_created') . ". <a href='". URL::route('courses.create') . "'>" .  __('messages.create_course') . "</a></p>";
		} else{
	?>
		<div class="row">
			<?php foreach($courses as $course) { ?>

			<div class="col-3">
				<div class="card">
					<img class="card-img-top" src="<?php echo $course->cover; ?>" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">
							<?php echo $course->title; ?>
						</h5>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><i class="material-icons">person</i>
							<?php echo count($course->getStudents);?> aluno</li>
						<li class="list-group-item"><i class="material-icons">folder</i>
							<?php echo count($course->getModules)?> módulos</li>
						<li class="list-group-item"><i class="material-icons">video_library</i>
							<?php echo count($course->getLessons)?> aulas</li>
					</ul>
					<div class="card-body">
						<a class="card-link" href="<?php echo URL::route('courses.edit', ['course_id' =>  $course['id']]);?>">Editar</a>
						<a class="card-link" href="<?php echo URL::route('courses.manage', ['course_id' =>  $course['id']]);?>">Gerenciar</a>
						<a class="card-link" href="<?php echo URL::route('courses.single', ['course' => $course['id']]);?>">Ver</a>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
		<?php }?>
</div>
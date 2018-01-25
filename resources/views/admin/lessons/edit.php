<div class="container">
	
	<nav class="z-depth-0 transparent breadcrumbs">
		<div class="nav-wrapper">
			<div class="col s12">
				<a href="<?php echo URL::route('courses.index') ?>" class="breadcrumb">Cursos</a>
				<a href="<?php echo URL::route('courses.manage', ['module' => $course->id]) ?>" class="breadcrumb">Gerenciar Curso</a>
				<a href="#" class="breadcrumb">Editar Lição</a>
			</div>
		</div>
	</nav>
	
	<h2>Editar <?php echo $lesson->title; ?></h2>
	
	<p><b>Curso:</b> <?php echo $course['title']; ?> - <b>Módulo:</b> <?php echo $module['name']; ?></p>
	
	<div class="row">
		<form method="post" action="<?php echo URL::route('course.module.lesson.update',['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id]);?>" enctype="multipart/form-data">
			<div class="col s9">
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
				
				<div class="row">
					<div class="col s12 input-field">
						<input type="text" name="title" id="lesson-title" value="<?php echo $lesson->title; ?>">
						<label for="lesson-title">Titulo</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col s10 input-field">
						<input type="text" name="video_url" id="lesson-url" value="<?php echo $lesson->video_url; ?>">
						<label for="lesson-url">Url do Vídeo</label>
					</div>
					<div class="col s2 input-field">
						<input type="time" name="time" id="lesson-time" value="<?php echo $lesson->time; ?>">
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 input-field">
						<textarea name="description" id="lesson-content" class="tinymce">
							<?php echo $lesson->description; ?>
						</textarea>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 input-field">
						<textarea name="resume" id="lesson-resume" class="materialize-textarea">
							<?php echo $lesson->resume; ?>
						</textarea>
						<label for="lesson-resume">Resumo</label>
					</div>
				</div>
				
				<input type="hidden" name="author_id" value="<?php echo $lesson->author_id; ?>">
				<input type="hidden" name="course_id" value="<?php echo $lesson->course_id; ?>">
				<input type="hidden" name="module_id" value="<?php echo $lesson->module_id; ?>">
			</div>
			
			<div class="col s3">
				<div class="row">
					<div class="col s12">
						<button type="submit" class="btn-large full-btn cyan darken-2">Editar</button>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<div class="widget card">
							<h3 class="widget-title">Thumbnail</h3>

							<div class="widget-content">
								<div class="file-upload">
									<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn"><i class="material-icons">file_upload</i></a>
									<input id="thumbnail" type="text" name="thumbnail" value="<?php echo $lesson->thumbnail; ?>">
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			<input type="hidden" value="PUT" name="_method">
		</form>
	</div>
</div>
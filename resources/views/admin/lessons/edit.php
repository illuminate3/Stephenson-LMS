<nav aria-label="breadcrumb" id="page-nav">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?php echo URL::route('courses.index') ?>">
					<?php echo __('messages.courses'); ?>
				</a>
			</li>
			
			<li class="breadcrumb-item">
				<a href="<?php echo URL::route('courses.manage', ['module' => $course->id]) ?>">
					<?php echo __('messages.manage_course'); ?>
				</a>
			</li>
			
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo __('messages.edit_lesson'); ?>
			</li>
		</ol>
	</div>
</nav>

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">
			<?php echo __('messages.edit_lesson'); ?>
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

	<div class="row">
		<form method="post" class="col-12" action="<?php echo URL::route('course.module.lesson.update',['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id]);?>" enctype="multipart/form-data">
			<div class="row">
			<div class="col-9">
			<div class="form-group">
				<label for="txtTitle">Título</label>
				<input type="text" class="form-control" value="<?php echo $lesson->title ?>" id="txtTitle" placeholder="Título" name="title">
			</div>

			<div class="form-row">
				<div class="form-group col-md-10">
					<label for="inlineFormInputGroup">Url do Vídeo</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">?</div>
						</div>
						<input type="text" value="<?php echo $lesson->video_url ?>" class="form-control" id="inlineFormInputGroup" placeholder="Url do Vídeo" name="video_url">
					</div>
				</div>

				<div class="form-group col-md-2">
					<label for="inputPassword4">Tempo</label>
					<input type="time" value="<?php echo $lesson->time ?>" class="form-control" id="inputPassword4" name="time">
				</div>
			</div>
				
					<div class="form-group">
						<textarea type="text" class="form-control tinymce" rows="8" id="txtContent" placeholder="Conteúdo" name="description">
						<?php echo $lesson->description ?>
						</textarea>
					</div>

					<div class="form-group">
						<label for="txtTitle">Resumo</label>
						<textarea type="text" class="form-control" id="txtTitle" placeholder="Resumo" name="resume">
						<?php echo $lesson->resume ?>
						</textarea>
					</div>
				
				<input type="hidden" name="author_id" value="<?php echo $lesson->author_id ?>">
				<input type="hidden" name="course_id" value="<?php echo $lesson->course_id ?>">
				<input type="hidden" name="module_id" value="<?php echo $lesson->module_id ?>">
			</div>
			
			<div class="col-3">
				<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Editar</button>
				
					<div class="card mt-3">
					  <h5 class="card-header">Thumbnail</h5>
					  <div class="card-body">
							<div class="file-upload">
								<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn"><i class="material-icons">file_upload</i></a>
								<input id="thumbnail" value="<?php echo $lesson->thumbnail ?>" type="text" name="thumbnail">
							</div>
					  </div>
					</div>	
			</div>
			</div>
			
				<input type="hidden" value="PUT" name="_method">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</div>
</div>
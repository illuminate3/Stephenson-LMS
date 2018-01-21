<div class="container">
	<h2>Criar Aula</h2>
	
	<h4>Curso: <?php echo $course['title']; ?></h4>
	<h4>Modulo: <?php echo $module['name']; ?></h4>
	
	<div class="row">
		<form method="post" action="<?php echo URL::route('admin.add_lesson',['course' => $course['id'], 'module' => $module['id']]);?>" enctype="multipart/form-data">
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
						<input type="text" name="title" id="tutorial-title">
						<label for="tutorial-title">Titulo</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col s10 input-field">
						<input type="text" name="video_url" id="tutorial-url">
						<label for="tutorial-url">Url do Vídeo</label>
					</div>
					<div class="col s2 input-field">
						<input type="time" name="time" id="tutorial-time">
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 input-field">
						<textarea name="description" id="tutorial-content" class="tinymce"></textarea>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 input-field">
						<textarea name="resume" id="tutorial-resume" class="materialize-textarea"></textarea>
						<label for="tutorial-resume">Resumo</label>
					</div>
				</div>
				
				<input type="hidden" name="author_id" value="<?php echo Auth::user()->id;?>">
				<input type="hidden" name="course_id" value="<?php echo $course['id']?>">
				<input type="hidden" name="module_id" value="<?php echo $module['id']?>">
			</div>
			
			<div class="col s3">
				<div class="row">
					<div class="col s12">
						<button type="submit" class="btn-large full-btn cyan darken-2">Adicionar</button>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<div class="widget card">
							<h3 class="widget-title">Thumbnail</h3>

							<div class="widget-content">
								<div class="file-upload">
									<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn"><i class="material-icons">file_upload</i></a>
									<input id="thumbnail" type="text" name="thumbnail">
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</div>
</div>
<div class="container">
	<h2>Editar <?php echo $course['title']?></h2>
	<div class="divider"></div>
	
	<div class="row">
		<form method="post" action="<?php echo URL::route('courses.update', ['course_id' =>  $course['id']]);?>" enctype="multipart/form-data">
			<div class="col s9">
				
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
				
				<div class="col s12 input-field">
					<input type="text" name="title" id="course-title" value="<?php echo $course['title']?>">
					<label for="tutorial-title">Titulo</label>
				</div>

				<div class="col s12 input-field">
					<textarea name="description" id="course-description" class="tinymce">
					<?php echo $course['description']?>
					</textarea>
				</div>

				<div class="col s12 input-field" style="margin-top:40px;">
					<textarea name="resume" id="course-resume" class="materialize-textarea" >
					<?php echo $course['resume']?>
					</textarea>
					<label for="course-resume">Resumo do Curso</label>
				</div>

				<input type="hidden" name="author_id" value="<?php echo Auth::user()->id;?>">
			</div>

			<div class="col s3">
				<div class="row">
					<button type="submit" class="btn-large full-btn cyan darken-2">Editar</button>
				</div>
				
				<div class="row">
					<div class="widget card">
						<h3 class="widget-title">Tags</h3>
						
						<div class="widget-content">
							<div class="chips chips-placeholder"></div>
						</div>
					</div>
					
					<div class="widget card">
						<h3 class="widget-title">Categoria</h3>
						
						<div class="widget-content">
							<select name="category_id">
								<option value="<?php if($atual_category == NULL){echo "0";} else{echo $atual_category['id'];}?>" disabled selected><?php if($atual_category == NULL){echo "Sem Categoria";} else{echo $atual_category['name'];}?></option>
								
								<?php foreach ($categories as $category) { ?>
								<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="widget card">
						<h3 class="widget-title">Thumbnail</h3>
						
						<div class="widget-content">
							<div class="file-upload">
								<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn"><i class="material-icons">file_upload</i></a>
								<input id="thumbnail" type="text" name="cover" value="<?php echo $course['cover']?>">
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
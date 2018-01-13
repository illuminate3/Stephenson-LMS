<div class="container">
	<h2>Adicionar Curso</h2>

	<div class="row">
		<form method="post" action="<?php echo URL::route('admin.add_courses');?>" enctype="multipart/form-data">
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
					<input type="text" name="title" id="tutorial-title">
					<label for="tutorial-title">Titulo</label>
				</div>

				<div class="col s12 input-field">
					<textarea name="description" id="tutorial-content" class="materialize-textarea"></textarea>
				</div>

				<div class="col s12 input-field">
					<textarea name="resume" id="tutorial-resume" class="materialize-textarea"></textarea>
				</div>

				<input type="hidden" name="author" value="<?php echo Auth::user()->id;?>">
			</div>

			<div class="col s3">
				<div class="row">
					<button type="submit" class="btn-large full-btn cyan darken-2">Adicionar</button>
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
							<select name="category">
								<option value="0" disabled selected>Sem categoria</option>
								<?php foreach ($categories as $category) { ?>
								<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="widget card">
						<h3 class="widget-title">Thumbnail</h3>
						
						<div class="widget-content">
							<div class="file-field input-field">
								<div class="btn"><span>File</span><input type="file" name="image"></div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
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
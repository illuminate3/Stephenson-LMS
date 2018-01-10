<div class="container">
	<h2>Adicionar Tutorial</h2>

	<div class="row">
		<form method="post" action="<?php echo URL::route('admin.add_tutorials');?>" enctype="multipart/form-data">
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
					<input type="text" name="video_url" id="tutorial-url">
					<label for="tutorial-url">Url do Vídeo</label>
				</div>

				<div class="col s12 input-field">
					<textarea name="description" id="tutorial-content" class="materialize-textarea"></textarea>
				</div>

				<div class="col s12 input-field">
					<textarea name="resume" id="tutorial-resume" class="materialize-textarea"></textarea>
				</div>
				<input type="hidden" name="author" value="<?php echo Auth::user()->id;?>">

				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				<button type="submit" class="btn">Criar</button>
			</div>
			
			<div class="col s3">
				<div class="row">
					<div class="col s12">
						
					</div>
				</div>
				
				<div class="row">
					<div class="col s12">
						<h3>Tags</h3>
						<div class="chips chips-placeholder"></div>
					</div>
					
					<div class="col s12">
						<h3>Categoria</h3>
						<select name="category">
							<option value="0" disabled selected>Sem categoria</option>
							<?php foreach ($categories as $category) { ?>
							<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
							<?php } ?>
						</select>
					</div>
					
					<div class="col s12">
						<h3>Thumbnail</h3>
						 <div class="file-field input-field">
							<div class="btn">
							  <span>File</span>
							  <input type="file" name="image">
							</div>
							<div class="file-path-wrapper">
							  <input class="file-path validate" type="text">
							</div>
						 </div>
					</div>
				</div>	
			</div>
			
		</form>
	</div>
</div>
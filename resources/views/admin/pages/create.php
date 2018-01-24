<div class="container">
	<h2>Adicionar Página</h2>
	
		<div class="row">
		<form method="post" action="<?php echo URL::route('pages.store');?>" enctype="multipart/form-data">
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
						<input type="text" name="title" id="page-title">
						<label for="tutorial-title">Titulo</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 input-field">
						<input type="text" name="slug" id="page-slug">
						<label for="tutorial-slug">Slug</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 input-field">
						<textarea name="content" id="page-content" class="tinymce"></textarea>
					</div>
				</div>
				
				<input type="hidden" name="author_id" value="<?php echo Auth::user()->id;?>">
			</div>
			
			<div class="col s3">
				<div class="row">
					<div class="col s12">
						<button type="submit" class="btn-large full-btn cyan darken-2">Adicionar</button>
					</div>
				</div>
			</div>
			
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</div>
</div>
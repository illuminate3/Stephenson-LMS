<div class="container">
	<h2>Editar página "<?php echo $page->title; ?>"</h2>
	
		<div class="row">
		<form method="post" action="<?php echo URL::route('pages.update', ['page' => $page->id ]);?>">
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
						<input type="text" name="title" id="page-title" value="<?php echo $page->title; ?>">
						<label for="tutorial-title">Titulo</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 input-field">
						<input type="text" name="slug" id="page-slug" value="<?php echo $page->slug; ?>">
						<label for="tutorial-slug">Slug</label>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 input-field">
						<textarea name="content" id="page-content" class="tinymce">
						<?php echo $page->content; ?>
						</textarea>
					</div>
				</div>
				
				<input type="hidden" name="author_id" value="<?php echo $page->author_id; ?>">
			</div>
			
			<div class="col s3">
				<div class="row">
					<div class="col s12">
						<button type="submit" class="btn-large full-btn cyan darken-2">Atualizar</button>
					</div>
				</div>
			</div>
			
			<input type="hidden" value="PUT" name="_method">
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</div>
</div>
<div class="container">	
	
	<nav class="z-depth-0 transparent breadcrumbs">
		<div class="nav-wrapper">
			<div class="col s12">
				<a href="<?php echo URL::route('posts.index') ?>" class="breadcrumb">Postagens</a>
				<a href="#" class="breadcrumb">Criar Postagem</a>
			</div>
		</div>
	</nav>
	
	<h2>Adicionar Postagem</h2>

	<div class="row">
		<form method="post" action="<?php echo URL::route('posts.store');?>" enctype="multipart/form-data">
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
						<input type="text" name="title" id="post-title">
						<label for="post-title">Titulo</label>
					</div>
				</div>

				<div class="row">
					<div class="col s12 input-field">
						<textarea name="content" id="post-content" class="tinymce"></textarea>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 input-field">
						<textarea name="resume" id="post-resume" class="materialize-textarea"></textarea>
						<label for="post-resume">Resumo</label>
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

				<div class="row">
					<div class="col s12">
						<div class="widget card">
							<h3 class="widget-title">Tags</h3>

							<div class="widget-content">
								<div class="chips chips-placeholder"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<div class="widget card">
							<h3 class="widget-title">Categoria</h3>

							<div class="widget-content">
								<select name="category_id">
									<option value="0" disabled selected>Sem categoria</option>
									<?php foreach ($categories as $category) { ?>
									<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
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
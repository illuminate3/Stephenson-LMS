<div class="container">
	
	<nav class="z-depth-0 transparent breadcrumbs">
		<div class="nav-wrapper">
			<div class="col s12">
				<a href="<?php echo URL::route('courses.index') ?>" class="breadcrumb"><?php echo __('messages.courses'); ?></a>
				<a href="#" class="breadcrumb"><?php echo __('messages.create_course'); ?></a>
			</div>
		</div>
	</nav>
	
	<h2><?php echo __('messages.create_course'); ?></h2>

	<div class="row">
		<form method="post" action="<?php echo URL::route('courses.store');?>" enctype="multipart/form-data">
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
					<input type="text" name="title" id="course-title">
					<label for="course-title"><?php echo __('messages.title'); ?></label>
				</div>

				<div class="col s12 input-field">
					<textarea name="description" id="course-content" class="tinymce"></textarea>
				</div>

				<div class="col s12 input-field">
					<textarea name="resume" id="course-resume" class="materialize-textarea"></textarea>
					<label for="course-resume"><?php echo __('messages.resume'); ?></label>
				</div>

				<input type="hidden" name="author_id" value="<?php echo Auth::user()->id;?>">
			</div>

			<div class="col s3">
				<div class="row">
					<button type="submit" class="btn-large full-btn cyan darken-2"><?php echo __('messages.create'); ?></button>
				</div>
				
				<div class="row">
					<div class="widget card">
						<h3 class="widget-title"><?php echo __('messages.tags'); ?></h3>
						
						<div class="widget-content">
							<div class="chips chips-placeholder"></div>
						</div>
					</div>
					
					<div class="widget card">
						<h3 class="widget-title"><?php echo __('messages.category'); ?></h3>
						
						<div class="widget-content">
							<select name="category_id">
								<option value="0" disabled selected><?php echo __('messages.uncategorized'); ?></option>
								<?php foreach ($categories as $category) { ?>
								<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="widget card">
						<h3 class="widget-title"><?php echo __('messages.thumbnail'); ?></h3>
						
						<div class="widget-content">
							<div class="file-upload">
								<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn"><i class="material-icons">file_upload</i></a>
								<input id="thumbnail" type="text" name="cover">
							</div>
						</div>
					</div>
				</div>	
			</div>
			
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		</form>
	</div>
</div>
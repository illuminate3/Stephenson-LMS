<div class="container">	
	
	<nav class="z-depth-0 transparent breadcrumbs">
		<div class="nav-wrapper">
			<div class="col s12">
				<a href="<?php echo URL::route('categories.index') ?>" class="breadcrumb"><?php echo __('messages.categories'); ?></a>
				<a href="#" class="breadcrumb"><?php echo __('messages.edit_category'); ?></a>
			</div>
		</div>
	</nav>
	
	<h2><?php echo __('messages.edit_category'); ?> "<?php echo $category['name'];?>"</h2>

	<?php 
		if (session('success')){
			if (session('success')['success'] == true){
				echo "<div class='success-message'>" . session('success')['messages'] . "</div>";
			} else{
				echo "<div class='error-message'>" . session('success')['messages'] . "</div>";
			}
		}
	?>

	<form method="post" action="<?php echo URL::route('categories.update', ['id' => $category['id']]);?>">
		<div class="row">
			<div class="col s12 input-field">
				<input id="txtCategoryName" type="text" name="name" value="<?php echo $category['name'];?>">
				<label for="txtCategoryName"><?php echo __('messages.name'); ?></label>
			</div>
		</div>
		
		<div class="row">
			<div class="col s12 input-field">
				<input id="txtCategorySlug" type="text" name="slug" value="<?php echo $category['slug'];?>">
				<label for="txtCategorySlug"><?php echo __('messages.slug'); ?></label>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<label for="clrCategoryColor"><?php echo __('messages.color'); ?></label>
				<input id="clrCategoryColor" type="color" name="color" value="<?php echo $category['color'];?>">
			</div>
		</div>
		<div class="row">

		<div class="input-field col s12">
			<select name="level">
				<option value="0" disabled selected><?php echo __('messages.primary'); ?></option>
				<?php foreach($categories_list as $category_l) { ?>
				<option value="<?php echo $category_l['id']; ?>"><?php echo $category_l['name']; ?></option>
				<?php }?>
			</select>

			<label><?php echo __('messages.hierarchy'); ?></label>
		</div>

		</div>
		<div class="row">
			<div class="col s12">
				<button type="submit" class="btn"><?php echo __('messages.edit'); ?></button>
			</div>
		</div>
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
		<input type="hidden" value="PUT" name="_method">
	</form>
</div>
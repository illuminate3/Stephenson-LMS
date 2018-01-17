<div class="container">
	<h2>Editar categoria "<?php echo $category['name'];?>"</h2>

	<?php 
		if (session('success')){
			if (session('success')['success'] == true){
				echo "<div class='success-message'>" . session('success')['messages'] . "</div>";
			} else{
				echo "<div class='error-message'>" . session('success')['messages'] . "</div>";
			}
		}
	?>

	<form method="post" action="<?php echo URL::route('admin.edit_category', ['id' => $category['id']]);?>">
		<div class="row">
			<div class="col s12 input-field">
				<input id="txtCategorieName" type="text" name="name" value="<?php echo $category['name'];?>">
				<label for="txtCategorieName">Nome</label>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<label for="clrCategorieColor">Cor</label>
				<input id="clrCategorieColor" type="color" name="color" value="<?php echo $category['color'];?>">
			</div>
		</div>
		<div class="row">

		<div class="input-field col s12">
			<select name="level">
				<option value="0" disabled selected>Primária</option>
				<?php foreach($categories_list as $category_l) { ?>
				<option value="<?php echo $category_l['id']; ?>"><?php echo $category_l['name']; ?></option>
				<?php }?>
			</select>

			<label>Hierarquia</label>
		</div>

		</div>
		<div class="row">
			<div class="col s12">
				<button type="submit" class="btn">Editar</button>
			</div>
		</div>
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	</form>
</div>
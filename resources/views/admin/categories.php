<div class="container">
	<h2>Categorias</h2>
	<div class="row">
		<div class="col s5">
			<h4>Adicionar Categorias</h4>
			
			<?php 
				if (session('success')){
					if (session('success')['success'] == true){
						echo "<div class='success-message'>" . session('success')['messages'] . "</div>";
					} else{
						echo "<div class='error-message'>" . session('success')['messages'] . "</div>";
					}
				}
			?>
			
			<form method="post" action="<?php echo URL::route('admin.add_categories');?>">
				<div class="row">
					<div class="col s12 input-field">
						<input id="txtCategorieName" type="text" name="name">
						<label for="txtCategorieName">Nome</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<label for="clrCategorieColor">Cor</label>
						<input id="clrCategorieColor" type="color" name="color">
					</div>
				</div>
				<div class="row">
					
				<div class="input-field col s12">
					<select name="level">
						<option value="0" disabled selected>Primária</option>
						<?php foreach($categories as $category) { ?>
						<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
						<?php }?>
					</select>
					
					<label>Hierarquia</label>
				</div>
					
				</div>
				<div class="row">
					<div class="col s12">
						<button type="submit" class="btn">Criar Categoria</button>
					</div>
				</div>
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</form>
		</div>
		
		<div class="col s6 offset-s1">
		<h4>Ver Categorias</h4>
		<?php			
		if(count($categories) < 1){
			echo "<p>Nenhuma catagoria cadastrada.</p>";
		} else{
	?>
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td>#</td>
				<td>Categoria</td>
				<td></td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($categories as $category) { ?>
			<tr>
				<td><?php echo $category['id']; ?></td>
				<td><?php echo $category['name']; ?></td>
				<td>
					<a href="#"><i class="material-icons">remove_circle_outline</i></a>
					<a href="#"><i class="material-icons">edit</i></a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<?php }?>
</div>
		</div>
	</div>
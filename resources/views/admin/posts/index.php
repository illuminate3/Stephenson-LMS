<div class="container">
	<h2>Postagens</h2>
		<?php			
		if(count($posts) < 1){
			echo "<p>Nenhuma postagem cadastrada. <a href='". URL::route('posts.create') . "'>Criar uma postagem</a></p>";
		} else{
	?>
	
	FORMULARIO DE CADASTRO DE POST
	
	<?php	} ?>
</div>
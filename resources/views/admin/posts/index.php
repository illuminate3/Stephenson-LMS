<div class="container">
	
	<h2>Postagens</h2>
	
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
	
	
	<?php			
		if(count($posts) < 1){
			echo "<p>Nenhuma postagem cadastrada. <a href='". URL::route('posts.create') . "'>Criar uma postagem</a></p>";
		} else{
	?>
	
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td>Titulo</td>
				<td>Autor</td>
				<td>Criação</td>
				<td style="width:100px">Ações</td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($posts as $post) { ?>
			<tr>
				<td><a href="<?php echo URL::route('posts.edit', ['post_id' =>  $post['id']]);?>"><?php echo $post['title']; ?></a></td>
				<td><?php echo $post->author->firstname . " " . $post->author->lastname; ?></td>
				<td><?php echo $post->created_at; ?></td>
				<td>
					<div class="action">
						<a target="_blank" href="<?php echo URL::to('/blog/post/'. $post['id'] ); ?>"><button class="z-depth-1 waves-effect teal"><i class="material-icons">visibility</i></button></a>
					</div>
					
					<div class="action">
						<form method="post" action="<?php echo URL::route('posts.destroy', ['id' =>  $post['id']]);?>">
							<button class="z-depth-1 waves-effect red" type="submit"><i class="material-icons">remove_circle_outline</i></button>
							<input type="hidden" value="DELETE" name="_method">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						</form>
					</div>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	
	<?php	} ?>
</div>
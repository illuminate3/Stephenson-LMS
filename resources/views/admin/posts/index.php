<div class="container">
	
		<div class="page-title"><h2><?php echo __('messages.posts'); ?></h2><a href="<?php echo URL::route('posts.create'); ?>"><button class="btn"><i class="material-icons left">add</i><?php echo __('messages.create'); ?></button></a></div>
	
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
		<div class="card">
	<div class="row">
		<div class="col s12">
			<ul class="tabs" style="border-bottom:1px solid #ececec">
				<li class="tab col s2"><a target="_self" href="<?php echo URL::route('posts.index') ?>">Todas</a></li>
				<li class="tab col s2"><a target="_self" href="<?php echo URL::route('posts.trash') ?>">Lixeira</a></li>
			</ul>
		</div>
	</div>
	
	<div class="row list-itens">
		<div class="col s12">
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td style="width:40px;"><input type="checkbox" id="check_all" class="filled-in"/><label for="check_all"></label></td>
				<td><?php echo __('messages.title'); ?></td>
				<td><?php echo __('messages.author'); ?></td>
				<td><?php echo __('messages.date'); ?></td>
				<td style="width:100px"><?php echo __('messages.actions'); ?></td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($posts as $post) { ?>
			<tr>
				<td><input type="checkbox" class="filled-in item-checkbox" id="test<?php echo $post->id; ?>"/><label for="test<?php echo $post->id; ?>"></label></td>
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
	</div>
	</div>
	</div>
	<?php }?>
</div>

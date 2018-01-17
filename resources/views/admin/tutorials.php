<div class="container">
	<h2>Tutoriais</h2>
	
	<?php			
		if(count($tutorials) < 1){
			echo "<p>Nenhum tutorial cadastrado. <a href='". URL::to('/admin/tutorials/add') . "'>Criar um tutorial</a></p>";
		} else{
	?>
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td>Titulo</td>
				<td>Url</td>
				<td>Autor</td>
				<td>Criação</td>
				<td style="width:100px">Ações</td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($tutorials as $tutorial) { ?>
			<tr>
				<td><a href="<?php echo URL::to('/admin/tutorial/edit/'. $tutorial['id'] ); ?>"><?php echo $tutorial['title']; ?></a></td>
				<td><?php echo $tutorial->video_url; ?></td>
				<td><?php echo $tutorial->author->firstname . " " . $tutorial->author->lastname; ?></td>
				<td><?php echo $tutorial->created_at; ?></td>
				<td>
					<div class="action">
						<a target="_blank" href="<?php echo URL::to('/tutorial/'. $tutorial['id'] ); ?>"><button class="z-depth-1 waves-effect teal"><i class="material-icons">visibility</i></button></a>
					</div>
					
					<div class="action">
						<form method="post" action="<?php echo URL::route('admin.delete_tutorial', ['id' =>  $tutorial['id']]);?>">
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
	<?php }?>
</div>
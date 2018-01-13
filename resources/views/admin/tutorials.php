<div class="container">
	<h2>Tutoriais</h2>
	
	<?php			
		if(count($tutorials) < 1){
			echo "<p>Nenhum tutorial cadastrado.</p>";
		} else{
	?>
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td>Titulo</td>
				<td>Resumo</td>
				<td>Url</td>
				<td>Autor</td>
				<td>Criação</td>
				<td></td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($tutorials as $tutorial) { ?>
			<tr>
				<td><a href="<?php echo URL::to('/admin/tutorial/edit/'. $tutorial['id'] ); ?>"><?php echo $tutorial['title']; ?></a></td>
				<td><?php echo $tutorial->resume; ?></td>
				<td><?php echo $tutorial->video_url; ?></td>
				<td><?php echo $tutorial->author; ?></td>
				<td><?php echo $tutorial->created_at; ?></td>
				<td>
					<a href="#"><i class="material-icons">remove_circle_outline</i></a>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	<?php }?>
</div>
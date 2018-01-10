<div class="container">
	<h2>Cursos</h2>
	
	<?php			
		if(count($courses) < 1){
			echo "<p>Nenhum curso cadastrado.</p>";
		} else{
	?>
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td>Titulo</td>
				<td>Resumo</td>
				<td>Autor</td>
				<td>Criação</td>
				<td></td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($courses as $course) { ?>
			<tr>
				<td><a href="<?php echo URL::to('/admin/course/edit/'. $course['id'] ); ?>"><?php echo $course['title']; ?></a></td>
				<td><?php echo $course['resume']; ?></td>
				<td><?php echo $course['author']; ?></td>
				<td><?php echo $course['created_at']; ?></td>
				<td>
					<a href="#"><i class="material-icons">remove_circle_outline</i></a>
				</td>
			</tr>
			<?php }}?>
		</tbody>
	</table>
</div>
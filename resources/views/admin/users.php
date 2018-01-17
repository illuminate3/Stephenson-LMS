<div class="container">
	<h2>Usuários</h2>
		<?php			
		if(count($users) < 1){
			echo "<p>Nenhum usuário cadastrado.</p>";
		} else{
	?>
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td>Nome Completo</td>
				<td>Usuário</td>
				<td>E-mail</td>
				<td>Nascimento</td>
				<td>Gênero</td>
				<td>Permissão</td>
				<td></td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($users as $user) {?>
			<tr>
				<td><?php echo $user['firstname'] . " " . $user['lastname']; ?></td>
				<td><?php echo $user['user']; ?></td>
				<td><?php echo $user['email']; ?></td>
				<td><?php echo $user['birth']; ?></td>
				<td><?php echo $user['gender']; ?></td>
				<td><?php echo $user['permission']; ?></td>
				<td>
					<a href="<?php echo URL::to('/admin/user/edit/'. $user['id'] ); ?>"><i class="material-icons">mode_edit</i></a>
					<form method="post" action="<?php echo URL::route('admin.delete_user', ['id' =>  $user['id']]);?>">
						<button type="submit"><i class="material-icons">remove_circle_outline</i></button>
						<input type="hidden" value="DELETE" name="_method">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					</form>
				</td>
			</tr>
			<?php }}?>
		</tbody>
	</table>
</div>
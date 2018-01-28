<div class="container">
	<h2>Usuários</h2>
		
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
		if(count($users) < 1){
			echo "<p>Nenhum usuário cadastrado.</p>";
		} else {
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
				<td style="width:100px;">Ações</td>
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
					<div class="action">
						<a href="<?php echo URL::route('users.edit', ['user_id' =>  $user['id']]);?>"><button class="z-depth-1 waves-effect teal"><i class="material-icons">edit</i></button></a>
					</div>
					<div class="action">
					<form method="post" action="<?php echo URL::route('users.destroy', ['id' =>  $user['id']]);?>">
						<button type="submit" class="z-depth-1 waves-effect red"><i class="material-icons">remove_circle_outline</i></button>
						<input type="hidden" value="DELETE" name="_method">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					</form>
					</div>
				</td>
			</tr>
			<?php }}?>
		</tbody>
	</table>
</div>
<nav aria-label="breadcrumb" id="page-nav">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Usuários</li>
		</ol>
	</div>	
</nav>

<div class="jumbotron jumbotron-fluid">
	<div class="container">
		<h1 class="display-4">
			<?php echo __('messages.users'); ?>
		</h1>
	</div>
</div>

<div class="container">
	<?php 
		if (session('success')){
			if (session('success')['success'] == false){
				echo '<div class="alert alert-danger" role="alert">' . session('success')['messages'] . '</div>';
			} else {
				echo '<div class="alert alert-success" role="alert">' . session('success')['messages'] . '</div>';
			}
		}
	?>

	<?php			
	if(count($users) < 1){
		echo "<p>Nenhum usuário cadastrado.</p>";
	} else {
	?>
		<div class="card">

			<table class="table table-hover">
				<thead>
					<tr>
						<td style="width:40px;"><input type="checkbox" id="check_all" class="filled-in" /><label for="check_all"></label></td>
						<td>
							<?php echo __('messages.complet_name'); ?>
						</td>
						<td>
							<?php echo __('messages.user'); ?>
						</td>
						<td>
							<?php echo __('messages.email'); ?>
						</td>
						<td>
							<?php echo __('messages.permission'); ?>
						</td>
						<td style="width:100px;">
							<?php echo __('messages.actions'); ?>
						</td>
					</tr>
				</thead>

				<tbody>
					<?php foreach($users as $user) {?>
					<tr>
						<td><input type="checkbox" class="filled-in item-checkbox" id="test<?php echo $user->id; ?>" /><label for="test<?php echo $user->id; ?>"></label></td>
						<td>
							<?php echo $user['firstname'] . " " . $user['lastname']; ?>
						</td>
						<td>
							<?php echo $user['user']; ?>
						</td>
						<td>
							<?php echo $user['email']; ?>
						</td>
						<td>
							<?php echo $user['permission']; ?>
						</td>
						<td>
							<div class="btn-group action-buttons" role="group">
								<a href="<?php echo URL::route('users.edit', ['id' =>  $user['id']]);?>">
									<button type="button" class="btn btn-primary"><i class="material-icons">edit</i></button>
								</a>
								
								<form method="post" action="<?php echo URL::route('users.destroy', ['id' =>  $user['id']]);?>">
									<button type="submit" type="submit" class="btn btn-danger"><i class="material-icons">remove_circle_outline</i></button>
									<input type="hidden" value="DELETE" name="_method">
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								</form>
							</div>
						</td>
						<?php }?>
				</tbody>
			</table>
		</div>
		<?php }?>
</div>

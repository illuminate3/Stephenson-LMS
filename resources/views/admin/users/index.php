<div class="container">
		<div class="page-title"><h2><?php echo __('messages.users'); ?></h2><a href="<?php echo URL::route('users.create'); ?>"><button class="btn"><i class="material-icons left">add</i><?php echo __('messages.create'); ?></button></a></div>
		
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
		<div class="card">
	<div class="row">
		<div class="col s12">
			<ul class="tabs" style="border-bottom:1px solid #ececec">
				<li class="tab col s2"><a target="_self" href="<?php echo URL::route('users.index') ?>">Todas</a></li>
				<li class="tab col s2"><a target="_self" href="<?php echo URL::route('users.trash') ?>">Lixeira</a></li>
			</ul>
		</div>
	</div>
	
	<div class="row list-itens">
		<div class="col s12">
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td style="width:40px;"><input type="checkbox" id="check_all" class="filled-in"/><label for="check_all"></label></td>
				<td><?php echo __('messages.complet_name'); ?></td>
				<td><?php echo __('messages.user'); ?></td>
				<td><?php echo __('messages.email'); ?></td>
				<td><?php echo __('messages.permission'); ?></td>
				<td style="width:100px;"><?php echo __('messages.actions'); ?></td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($users as $user) {?>
			<tr>
				<td><input type="checkbox" class="filled-in item-checkbox" id="test<?php echo $user->id; ?>"/><label for="test<?php echo $user->id; ?>"></label></td>
				<td><?php echo $user['firstname'] . " " . $user['lastname']; ?></td>
				<td><?php echo $user['user']; ?></td>
				<td><?php echo $user['email']; ?></td>
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
			<?php }?>
		</tbody>
	</table>
	</div>
	</div>
	</div>
	<?php }?>
</div>
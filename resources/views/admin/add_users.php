<div class="container">
	<h2>Adicionar Usuário</h2>
	<?php if (session('success')){
		if (session('success')['success'] == true){
			echo "<div class='success-message'>" . session('success')['messages'] . "</div>";
		} else{
			echo "<div class='error-message'>" . session('success')['messages'] . "</div>";
		}
		
	}
	?>
	<form  method="post" action="<?php echo URL::route('admin.add_users');?>">
		<div class="row">
			<div class="col s6 input-field">
				<input id="txtFirstName" type="text" name="firstname">
				<label for="txtFirstName">Nome</label>
			</div>

			<div class="col s6 input-field">
				<input id="txtLastName" type="text" name="lastname">
				<label for="txtLastName">Sobrenome</label>
			</div>
		</div>

		<div class="row">
			<div class="col s12 input-field">
				<input id="txtUser" type="text" name="user">
				<label for="txtUser">Usuário</label>
			</div>
		</div>

		<div class="row">
			<div class="col s12 input-field">
				<input id="emlEmail" type="email" name="email">
				<label for="emlEmail">E-mail</label>
			</div>
		</div>

		<div class="row">
			<div class="col s12 input-field">
				<input id="pasPassword" type="password" name="password">
				<label for="pasPassword">Senha</label>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<button type="submit" class="btn">CADASTRAR</button>
			</div>
		</div>
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	</form>
</div>
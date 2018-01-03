
<main>
	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col l6 offset-l3 m8 offset-m2 s12">
					<div class="row">
						<div class="col s12">
							<h2><i class="material-icons medium left">person_add</i>Cadastro</h2>
						</div>
					</div>
					
					<div class="row">
						<div class="col s12">		
							<div class="card-panel">
								<div class="row">
									<div class="col s12">
										<a href="<?php echo URL::to('/login'); ?>">Já tem uma conta?</a>
									</div>
								</div>
								
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
								
								<form  method="post" action="<?php echo URL::route('signup');?>">
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
											<input id="pasPassword" type="password" name="password_email">
											<label for="pasPassword">Senha</label>
										</div>
									</div>

									<div class="row">
										<div class="col s12 input-field">
											<input id="pasCPassword" type="password" name="cpassword_email">
											<label for="pasCPassword">Confirmar Senha</label>
										</div>
									</div>

									<div class="row">
										<div class="col s12">
											<button type="submit" class="btn">CADASTRAR</button>
											<input type="checkbox" class="filled-in" id="rememberme" />
											<label for="rememberme" style="margin-left:20px;">Confirmo que li e aceito os <a href="">Termos de Uso</a></label>
										</div>
									</div>
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

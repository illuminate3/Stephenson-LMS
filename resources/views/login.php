<main>
<div class="container">
	<div class="section">
		<div class="row">
			<div class="col l6 offset-l3 m8 offset-m2 s12">
				<div class="row">
					<div class="col s12">
						<h2><i class="material-icons medium left">lock</i>Login</h2>
					</div>
				</div>
								<div class="row">
									<div class="col s12">
										<div class="card-panel">
											<form method="post" action="<?php echo URL::route('admin.login');?>">
												<div class="row">
													<div class="col s12">
														<?php if (session('login_message')){
															if (session('success')['login_message'] == false){
																	echo "<div class='error-message'>" . session('login_message')['messages'] . "</div>";
																}
															}
														?>
													</div>
												</div>
												<div class="row">
													<div class="col s12">
														<input type="text" placeholder="E-mail" name="login_email">
													</div>
												</div>

												<div class="row">
													<div class="col s12">
														<input type="password" placeholder="Senha" name="login_senha">
													</div>
												</div>

												<div class="row">
													<div class="col s12">
														<button type="submit" class="btn">ENTRAR</button>
														<input type="checkbox" class="filled-in" id="rememberme" name="login_rememberme" value="1" />
														<label for="rememberme" style="margin-left:20px;">Lembrar de Mim</label>
													</div>
												</div>

												<div class="row">
													<div class="col s12">
														<a href="#">Esqueceu a senha?</a>
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

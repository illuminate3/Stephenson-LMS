<?php include_once('header.php'); ?>
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
				<div class="row">
					<div class="col s12">
						<a href="cadastro.php">Não possui uma conta?</a>
					</div>
				</div>
				
				<form>
					<div class="row">
						<div class="col s12">
							<input type="text" placeholder="E-mail">
						</div>
					</div>
					
					<div class="row">
						<div class="col s12">
							<input type="password" placeholder="Senha">
						</div>
					</div>
					
					<div class="row">
						<div class="col s12">
							<button type="submit" class="btn">ENTRAR</button>
							<input type="checkbox" class="filled-in" id="rememberme" />
							<label for="rememberme" style="margin-left:20px;">Lembrar de Mim</label>
						</div>
					</div>
					
					<div class="row">
						<div class="col s12">
							<a href="#">Esqueceu a senha?</a>
						</div>
					</div>
				</form>
					</div></div>
			</div>
		</div>
	</div>
	</div>
</div>
</main>
<?php include_once('footer.php'); ?>
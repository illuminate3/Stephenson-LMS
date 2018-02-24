{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
		<div class="jumbotron jumbotron-fluid">
		<div class="container">
		<h1 class="display-4">Cadastro</h1>
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

			<form  method="post" action="<?php echo URL::route('register');?>">
				<div class="form-row">
					<div class="form-group col-md-6">
						<input type="text" class="form-control" placeholder="Nome" name="firstname">
					</div>

					<div class="form-group col-md-6">
						<input type="text" class="form-control" placeholder="Sobrenome" name="lastname">
					</div>
				</div>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="Usuário" name="user">
				</div>

				<div class="form-group">
					<input type="email" class="form-control" placeholder="E-mail" name="email">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="Senha" name="password">
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="Confirmar Senha" name="cpassword">
				</div>

				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>

						<label class="form-check-label" for="invalidCheck">Confirmo que li e aceito os <a href="#">Termos de Uso</a></label>
						<div class="invalid-feedback">Você deve aceitar os termos para se cadastrar.</div>
					</div>
				</div>

				<button class="btn btn-primary" type="submit">Cadastrar</button>
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</form>
		</div>
@endsection

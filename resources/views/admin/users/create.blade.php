
{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Criar Usuário</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{URL::route('users.index')}}">Usuários</a></li>
                <li class="breadcrumb-item active">Criar Usuário</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->

		<div class="container-fluid">
			<?php
				if (session('success')){
					if (session('success')['success'] == false){
						echo '<div class="alert alert-danger" role="alert">' . session('success')['messages'] . '</div>';
					} else {
						echo '<div class="alert alert-success" role="alert">' . session('success')['messages'] . '</div>';
					}
				}
			?>


			<form  method="post" action="{{URL::route('users.store')}}">

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="txtTitle">Nome</label>
						<input type="text" class="form-control" id="txtTitle" placeholder="Nome" name="firstname">
					</div>

					<div class="form-group col-md-6">
						<label for="txtTitle">Sobrenome</label>
						<input type="text" class="form-control" id="txtTitle" placeholder="Sobrenome" name="lastname">
					</div>
				</div>

				<div class="form-group">
						<label for="txtUser">Usuário</label>
						<input id="txtUser" type="text" name="user" class="form-control" placeholder="Usuário">

				</div>

				<div class="form-group">
						<label for="emlEmail">E-mail</label>
						<input id="emlEmail" type="email" name="email" class="form-control" placeholder="E-mail">
				</div>

				<div class="form-group">
						<label for="pasPassword">Senha</label>
						<input id="pasPassword" type="password" name="password" class="form-control" placeholder="Senha">
				</div>

        <div class="form-group">
          <label for="slcPermission">Permissão</label>
          <select class="form-control" id="slcPermission" name="permission">
            <option value="app.user">Usuário Comum</option>
            <option value="app.admin">Administrador</option>
           </select>
        </div>

				<button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Adicionar</button>
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			</form>
		</div>
@endsection

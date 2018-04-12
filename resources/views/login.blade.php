{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent

    <div class="container mt-5">
		@if (session('login_message') and session('success')['login_message'] == false)
				<div class="alert alert-danger" role="alert">{{ session('login_message')['messages'] }}</div>
		@endif

    <div class="row justify-content-md-center">

      <div class="col-7">
        <h2 class="mb-5 text-center">Login</h2>
      <div class="card p-5">

    <form method="post" action="{{URL::route('login')}}">
      <div class="form-group">
        <label for="input-email">E-mail</label>
        <input name="login_email" type="email" class="form-control" id="input-email" placeholder="E-mail">
      </div>
      <div class="form-group">
        <label for="input-password">Senha</label>
        <input name="login_senha" type="password" class="form-control" id="input-password" placeholder="Senha">
      </div>
      <div class="form-check">
        <input name="login_rememberme" type="checkbox" class="form-check-input" id="input-rememberme">
        <label class="form-check-label" for="input-rememberme">Matenha-me Conectado</label>
      </div>
      <button type="submit" class="btn btn-primary btn-block btn-round btn-lg mt-3">Entrar</button>
    	<input type="hidden" name="_token" value="{{csrf_token()}}">
    </form>
    </div>
    </div>
    </div>
    </div>
@endsection

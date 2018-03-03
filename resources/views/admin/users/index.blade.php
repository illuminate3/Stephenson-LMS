{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
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
					{{__('messages.users')}}
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

			@if(count($users) < 1)
				<p>Nenhum usuário cadastrado.</p>
			@else
				<div class="card">

					<table class="table table-hover">
						<thead>
							<tr>
								<td style="width:40px;"><input type="checkbox" id="check_all" class="filled-in" /><label for="check_all"></label></td>
								<td>
									{{__('messages.complet_name')}}
								</td>
								<td>
									{{__('messages.user')}}
								</td>
								<td>
									{{__('messages.email')}}
								</td>
								<td>
									{{__('messages.permission')}}
								</td>
								<td style="width:100px;">
									{{__('messages.actions')}}
								</td>
							</tr>
						</thead>

						<tbody>
							@foreach($users as $user)
							<tr>
								<td><input type="checkbox" class="filled-in item-checkbox" id="test{{$user->id}}" /><label for="test{{$user->id}}"></label></td>
								<td>
									{{$user['firstname'] . " " . $user['lastname']}}
								</td>
								<td>
									{{$user['user']}}
								</td>
								<td>
									{{$user['email']}}
								</td>
								<td>
									{{$user['permission']}}
								</td>
								<td>
									<div class="btn-group action-buttons" role="group">
										<a href="{{URL::route('users.edit', ['id' =>  $user['id']])}}">
											<button type="button" class="btn btn-primary"><i class="material-icons">edit</i></button>
										</a>

										<form method="post" action="{{URL::route('users.destroy', ['id' =>  $user['id']])}}">
											<button type="submit" type="submit" class="btn btn-danger"><i class="material-icons">remove_circle_outline</i></button>
											<input type="hidden" value="DELETE" name="_method">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
										</form>
									</div>
								</td>
              @endforeach
						</tbody>
					</table>
				</div>
      @endif
		</div>
@endsection

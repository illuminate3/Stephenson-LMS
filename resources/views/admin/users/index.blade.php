{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Usuários</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Usuários</li>
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

			@if(count($users) < 1)
				<p>Nenhum usuário cadastrado.</p>
			@else
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
      @endif
		</div>
@endsection

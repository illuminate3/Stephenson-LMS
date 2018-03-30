{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <div class="pages-navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Usuários</li>
      </ol>
    </div>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
          <h3 class="text-primary">Usuários</h3>
        </div>

        <div class="col-md-7">
          <div class="btn-group float-right" role="group">
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ações Múltiplas
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#">Excluir</a>
              </div>
            </div>
          </div>
        </div>
    </div>

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
								<td style="width:110px;">
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
									<div class="action-buttons" role="group">
                    <div class="action">
                      <a href="{{URL::route('users.edit', ['id' =>  $user['id']])}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    </div>

                    <div class="action">
  										<form method="post" action="{{URL::route('users.destroy', ['id' =>  $user['id']])}}">
  											<button type="submit" type="submit" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
  											<input type="hidden" value="DELETE" name="_method">
  											<input type="hidden" name="_token" value="{{csrf_token()}}">
  										</form>
									  </div>
									</div>
								</td>
              @endforeach
						</tbody>
					</table>
      @endif
		</div>
@endsection

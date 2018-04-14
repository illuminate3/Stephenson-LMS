{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent

    <div class="pages-navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Tutoriais</li>
      </ol>
    </div>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
          <h3 class="text-primary">Tutoriais</h3>
        </div>

        <div class="col-md-7">
          <div class="btn-group float-right" role="group">
            <a class="btn btn-secondary" href="{{URL::route('tutorials.create')}}"><i class="fa fa-plus-circle"></i> Criar</a>

            <a class="btn btn-secondary" href="{{URL::route('tutorials.all')}}" target="_blank"><i class="fa fa-eye"></i> Ver Todos</a>

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

					<ul class="nav nav-tabs customtab mb-3">
						<li class="nav-item"><a class="nav-link {{ ($items == 'all') ? 'active' : null }}" href="{{URL::route('tutorials.index')}}">Publicados</a></li>
						<li class="nav-item"><a class="nav-link {{ ($items =='trash') ? 'active' : null}}" href="{{URL::route('tutorials.trash')}}">Lixeira</a></li>
					</ul>

						@if(count($tutorials) < 1)
							@if($items == "trash")
                Nenhum tutorial encontrado na lixeira.
							@else
                Nenhum tutorial cadastrado. <a href="{{URL::route('tutorials.create')}}">Criar um tutorial</a>
							@endif
						@else
						<table class="table table-hover">
							<thead>
								<tr>
									<td style="width:40px;"><input type="checkbox" id="check_all" class="filled-in" /><label for="check_all"></label></td>
									<td>
										{{__('messages.title')}}
									</td>
									<td>
										{{__('messages.url')}}
									</td>
									<td>
										{{__('messages.author')}}
									</td>
									<td>
										{{__('messages.date')}}
									</td>
									<td style="width:110px">
										{{__('messages.actions')}}
									</td>
								</tr>
							</thead>

							<tbody>
								@foreach($tutorials as $tutorial)
								<tr>
									<td><input type="checkbox" class="filled-in item-checkbox" id="test{{$tutorial->id}}" /><label for="test{{$tutorial->id}}"></label></td>
									<td>
										<a href="{{URL::route('tutorials.edit', ['tutorial_id' =>  $tutorial['id']])}}">
											{{$tutorial['title']}}
										</a>
									</td>
									<td>
										{{$tutorial->video_url}}
									</td>
									<td>
										{{$tutorial->author->firstname . " " . $tutorial->author->lastname}}
									</td>
									<td>
										{{$tutorial->created_at}}
									</td>
									<td>
										@if($items == "trash")
										<div class="action-buttons">
											<div class="action">
												<form method="post" action="{{URL::route('tutorials.restore', ['id' =>  $tutorial['id']])}}">
													<button type="submit" class="btn btn-primary"><i class="fa fa-undo"></i></button>
													<input type="hidden" name="_token" value="{{csrf_token()}}">
												</form>
											</div>

											<div class="action">
												<form method="post" action="{{URL::route('tutorials.deletefrombd', ['id' =>  $tutorial['id']])}}">
													<button type="submit" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
													<input type="hidden" name="_token" value="{{csrf_token()}}">
												</form>
											</div>
										</div>
                  @else
										<div class="action-buttons" role="group">
                      <div class="action">
  											<a class="btn btn-primary" href="{{URL::to('/tutorial/'. $tutorial['id'] )}}"><i class="fa fa-eye"></i></a>
                      </div>

                      <div class="action">
  											<form method="post" action="{{URL::route('tutorials.destroy', ['id' =>  $tutorial['id']])}}">
  												<button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
  												<input type="hidden" value="DELETE" name="_method">
  												<input type="hidden" name="_token" value="{{csrf_token()}}">
  											</form>
                      </div>
										</div>
                  @endif
									</td>
								</tr>
              @endforeach
							</tbody>
						</table>
            {!! $tutorials->links('vendor.pagination.bootstrap-4'); !!}
          @endif
			</div>
		</div>
@endsection

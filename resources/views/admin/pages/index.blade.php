{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <div class="pages-navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Páginas</li>
      </ol>
    </div>
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
          <h3 class="text-primary">Páginas</h3>
        </div>

        <div class="col-md-7">
          <div class="btn-group float-right" role="group">
            <div class="btn-group" role="group">
              <a class="btn btn-secondary" href="{{URL::route('pages.create')}}"><i class="fa fa-plus-circle"></i> Criar</a>
              
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
						<li class="nav-item"><a class="nav-link {{ ($items == "all") ? "active " : null}}" href="{{ URL::route('pages.index') }}">Publicados</a></li>
						<li class="nav-item"><a class="nav-link {{ ($items == "trash") ? "active " : null}}" href="{{ URL::route('pages.trash') }}">Lixeira</a></li>
					</ul>

						@if(count($pages) < 1)
							@if($items == "trash")
                Nenhuma página encontrada na lixeira
							@else
                Nenhuma página cadastrada. <a href="{{URL::route('pages.create')}}">Criar uma página</a>
							@endif
						@else
						<table class="table table-hover">
							<thead>
								<tr>
									<td style="width:40px;"><input type="checkbox" id="check_all" class="filled-in" /><label for="check_all"></label></td>
									<td>
										{{ __('messages.title')}}
									</td>
									<td>
										{{ __('messages.slug')}}
									</td>
									<td style="width:110px">
										{{ __('messages.actions')}}
									</td>
								</tr>
							</thead>

							<tbody>
								@foreach($pages as $page)
								<tr>
									<td><input type="checkbox" class="filled-in item-checkbox" id="test{{ $page->id}}" /><label for="test{{ $page->id}}"></label></td>
									<td><a href="{{ URL::route('pages.edit', ['page_id' =>  $page->id])}}">{{ $page->title}}</a></td>
									<td>
										{{ $page->slug}}
									</td>
									<td>
										@if($items == "trash")
										<div class="action-buttons">
											<div class="action">
												<form method="post" action="{{ URL::route('pages.restore', ['id' =>  $page['id']])}}">
													<button type="submit" class="btn btn-primary"><i class="fa fa-undo"></i></button>
													<input type="hidden" name="_token" value="{{ csrf_token()}}">
												</form>
											</div>

											<div class="action">
												<form method="post" action="{{ URL::route('pages.deletefrombd', ['id' =>  $page['id']])}}">
													<button type="submit" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
													<input type="hidden" name="_token" value="{{ csrf_token()}}">
												</form>
											</div>
										</div>
                  @else
										<div class="action-buttons" role="group">
                      <div class="action">
                        <a class="btn btn-primary" href="{{ URL::to('/'. $page['slug'] )}}"><i class="fa fa-eye"></i></a>
                      </div>

                      <div class="action">
  											<form method="post" action="{{ URL::route('pages.destroy', ['id' =>  $page['id']])}}">
  												<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
  												<input type="hidden" value="DELETE" name="_method">
  												<input type="hidden" name="_token" value="{{ csrf_token()}}">
  											</form>
                      </div>
										</div>
                  @endif
									</td>
								</tr>
              @endforeach
							</tbody>
						</table>
          @endif
			</div>
		</div>
@endsection

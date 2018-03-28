{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Páginas</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Páginas</li>
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


					<ul class="nav nav-tabs customtab mb-3">
						<li class="nav-item"><a class="nav-link {{ ($loop == "all") ? "active " : null}}" href="{{ URL::route('pages.index') }}">Publicados</a></li>
						<li class="nav-item"><a class="nav-link {{ ($loop == "trash") ? "active " : null}}" href="{{ URL::route('pages.trash') }}">Lixeira</a></li>
					</ul>

						@if(count($pages) < 1)
							@if($loop == "trash")
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
									<td style="width:100px">
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
										@if($loop == "trash")
										<div class="btn-group action-buttons" role="group">
											<div class="action">
												<form method="post" action="{{ URL::route('pages.restore', ['id' =>  $page['id']])}}">
													<button type="submit" class="btn btn-primary"><i class="fa fa-undo"></i></button>
													<input type="hidden" name="_token" value="{{ csrf_token()}}">
												</form>
											</div>

											<div class="action">
												<form method="post" action="{{ URL::route('pages.deletefrombd', ['id' =>  $page['id']])}}">
													<button type="submit" class="btn btn-danger"><i class="fa fa-remove"></button>
													<input type="hidden" name="_token" value="{{ csrf_token()}}">
												</form>
											</div>
										</div>
                  @else
										<div class="btn-group action-buttons" role="group">
											<a href="{{ URL::to('/'. $page['slug'] )}}">
                  		    <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button>
                  		</a>
											<form method="post" action="{{ URL::route('pages.destroy', ['id' =>  $page['id']])}}">
												<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
												<input type="hidden" value="DELETE" name="_method">
												<input type="hidden" name="_token" value="{{ csrf_token()}}">
											</form>
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

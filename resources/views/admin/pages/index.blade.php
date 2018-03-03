{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<nav aria-label="breadcrumb" id="page-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Páginas</li>
				</ol>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">
					{{ __('messages.pages')}}
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

			<div class="card">
				<div class="card-header">
					<ul class="nav nav-tabs card-header-tabs">
						<li class="nav-item"><a class="nav-link {{ ($loop == "all") ? "active " : null}}" href="{{ URL::route('pages.index') }}">Publicados</a></li>
						<li class="nav-item"><a class="nav-link {{ ($loop == "trash") ? "active " : null}}" href="{{ URL::route('pages.trash') }}">Lixeira</a></li>
					</ul>
				</div>

				<div class="card-body">
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
													<button type="submit" class="btn btn-primary"><i class="material-icons">restore</i></button>
													<input type="hidden" name="_token" value="{{ csrf_token()}}">
												</form>
											</div>

											<div class="action">
												<form method="post" action="{{ URL::route('pages.deletefrombd', ['id' =>  $page['id']])}}">
													<button type="submit" class="btn btn-danger"><i class="material-icons">remove</i></button>
													<input type="hidden" name="_token" value="{{ csrf_token()}}">
												</form>
											</div>
										</div>
                  @else
										<div class="btn-group action-buttons" role="group">
											<a href="{{ URL::to('/'. $page['slug'] )}}">
		<button type="button" class="btn btn-primary"><i class="material-icons">visibility</i></button>
		</a>
											<form method="post" action="{{ URL::route('pages.destroy', ['id' =>  $page['id']])}}">
												<button type="submit" class="btn btn-danger"><i class="material-icons">remove_circle_outline</i></button>
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
		</div>
@endsection

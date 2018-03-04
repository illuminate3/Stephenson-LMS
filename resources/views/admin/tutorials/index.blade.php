{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<nav aria-label="breadcrumb" id="page-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Tutoriais</li>
				</ol>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">
					{{__('messages.tutorials')}}
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
						<li class="nav-item"><a class="nav-link {{($loop == "all") ? "active " : null}}" href="{{URL::route('tutorials.index')}}">Publicados</a></li>
						<li class="nav-item"><a class="nav-link {{($loop == "trash") ? "active " : null}}" href="{{URL::route('tutorials.trash')}}">Lixeira</a></li>
					</ul>
				</div>

				<div class="card-body">
						@if(count($tutorials) < 1)
							@if($loop == "trash")
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
									<td style="width:100px">
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
										@if($loop == "trash")
										<div class="btn-group action-buttons" role="group">
											<div class="action">
												<form method="post" action="{{URL::route('tutorials.restore', ['id' =>  $tutorial['id']])}}">
													<button type="submit" class="btn btn-primary"><i class="material-icons">restore</i></button>
													<input type="hidden" name="_token" value="{{csrf_token()}}">
												</form>
											</div>

											<div class="action">
												<form method="post" action="{{URL::route('tutorials.deletefrombd', ['id' =>  $tutorial['id']])}}">
													<button type="submit" class="btn btn-danger"><i class="material-icons">remove</i></button>
													<input type="hidden" name="_token" value="{{csrf_token()}}">
												</form>
											</div>
										</div>
                  @else
										<div class="btn-group action-buttons" role="group">
											<a href="{{URL::to('/tutorial/'. $tutorial['id'] )}}">
												<button type="button" class="btn btn-primary"><i class="material-icons">visibility</i></button>
											</a>
											<form method="post" action="{{URL::route('tutorials.destroy', ['id' =>  $tutorial['id']])}}">
												<button type="submit" class="btn btn-danger"><i class="material-icons">remove_circle_outline</i></button>
												<input type="hidden" value="DELETE" name="_method">
												<input type="hidden" name="_token" value="{{csrf_token()}}">
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

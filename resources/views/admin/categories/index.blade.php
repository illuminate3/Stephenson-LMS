{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Categorias</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Categorias</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
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

	<div class="row">
		<div class="col-5">
			<div class="card list-itens">
				<div class="card-body">
				<h5 class="card-title">{{ __('messages.create_category')}}</h5>
				<form method="post" action="{{ URL::route('categories.store')}}">
					<div class="form-group">
						<label for="txtName">Nome</label>
						<input type="text" class="form-control" id="txtName" placeholder="Nome" name="name">
					</div>

					<div class="form-group">
						<label for="txtSlug">Slug</label>
						<input type="text" class="form-control" id="txtSlug" placeholder="Slug" name="slug">
					</div>

					  <div class="form-group">
						 <label for="exampleFormControlSelect1">Hirarquia</label>
						 <select class="form-control" id="exampleFormControlSelect1" name="level">
								<option value="0" disabled selected>{{ __('messages.primary')}}</option>
								@foreach($categories as $category)
								<option value="{{ $category['id']}}">{{ $category['name']}}</option>
                @endforeach
						 </select>
					  </div>


					<button type="submit" class="btn btn-primary btn-lg btn-block mt-3">Adicionar</button>
					<input type="hidden" name="_token" value="{{ csrf_token()}}">
				</form>
			</div>
		</div>
		</div>

		<div class="col-7">
			<div class="card list-itens">
					@if(count($categories) < 1)
						{{__('messages.no_category_created')}}
					@else
					<table class="table table-hover">
						<thead>
							<tr>
								<td>
									{{ __('messages.category')}}
								</td>
								<td>Slug</td>
								<td style="width:100px;">
									{{ __('messages.actions')}}
								</td>
							</tr>
						</thead>

						<tbody>
							@foreach($categories as $category)
							<tr>
								<td>
									{{ $category['name']}}
								</td>
								<td>
									{{ $category['slug']}}
								</td>
								<td>
									<div class="btn-group action-buttons" role="group">
										<a href="{{ URL::route('categories.edit', ['id' =>  $category['id']])}}">
											<button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
										</a>

										<form method="post" action="{{ URL::route('categories.destroy', ['id' =>  $category['id']])}}">
											<button type="submit" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
											<input type="hidden" value="DELETE" name="_method">
											<input type="hidden" name="_token" value="{{ csrf_token()}}">
										</form>

								</td>
							</tr>
              @endforeach
						</tbody>
					</table>
          @endif
			</div>
		</div>
	</div>
</div>
@endsection

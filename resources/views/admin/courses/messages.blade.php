{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <div class="pages-navigation">
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{URL::route('courses.index')}}">Cursos</a></li>
          <li class="breadcrumb-item active">Mensagens</li>
      </ol>
    </div>

    @include('admin.courses.menu')

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
      <p>Página em construção!</p>
		</div>
@endsection

{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<nav aria-label="breadcrumb" id="page-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">{{__('messages.settings')}}</li>
				</ol>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">{{__('messages.settings')}}</h1>
		  </div>
		</div>

		<div class="container">

		</div>
@endsection

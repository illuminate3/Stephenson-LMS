{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
		<nav aria-label="breadcrumb" id="page-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Estilo</li>
				</ol>
			</div>
		</nav>

		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4"><?php echo __('messages.style'); ?></h1>
		  </div>
		</div>

		<div class="container">
				<div class="row">

					<?php $themes = Theme::all(); foreach($themes as $theme){ ?>

		  <div class="col-sm-4">
		    <div class="card">
		      <div class="card-body">
		        <h5 class="card-title"><?php echo $theme->name; ?></h5>
		        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
					<form method="post" action="<?php echo URL::route('style.change_theme'); ?>">
		          	<button class="btn btn-primary" type="submit">Ativar</button>
						<input type="hidden" value="<?php echo $theme->name; ?>" name="theme">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					</form>
		      </div>
		    </div>
		  </div>

					<?php } ?>
				</div>
		</div>
@endsection

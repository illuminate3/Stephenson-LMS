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
					<?php echo __('messages.pages'); ?>
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
						<li class="nav-item"><a class="nav-link <?php echo ($loop == "all") ? "active " : null; ?>" href="<?php echo URL::route('pages.index') ?>">Publicados</a></li>
						<li class="nav-item"><a class="nav-link <?php echo ($loop == "trash") ? "active " : null; ?>" href="<?php echo URL::route('pages.trash') ?>">Lixeira</a></li>
					</ul>
				</div>

				<div class="card-body">

					<?php
						if(count($pages) < 1){
							if($loop == "trash"){
								echo "Nenhuma página encontrada na lixeira.";
							} else{
								echo "Nenhuma página cadastrada. <a href='". URL::route('pages.create') . "'>Criar uma página</a>";
							}
						} else{
					?>
						<table class="table table-hover">
							<thead>
								<tr>
									<td style="width:40px;"><input type="checkbox" id="check_all" class="filled-in" /><label for="check_all"></label></td>
									<td>
										<?php echo __('messages.title'); ?>
									</td>
									<td>
										<?php echo __('messages.slug'); ?>
									</td>
									<td style="width:100px">
										<?php echo __('messages.actions'); ?>
									</td>
								</tr>
							</thead>

							<tbody>
								<?php foreach($pages as $page) { ?>
								<tr>
									<td><input type="checkbox" class="filled-in item-checkbox" id="test<?php echo $page->id; ?>" /><label for="test<?php echo $page->id; ?>"></label></td>
									<td><a href="<?php echo URL::route('pages.edit', ['page_id' =>  $page->id]);?>"><?php echo $page->title; ?></a></td>
									<td>
										<?php echo $page->slug; ?>
									</td>
									<td>
										<?php if($loop == "trash"){ ?>
										<div class="btn-group action-buttons" role="group">
											<div class="action">
												<form method="post" action="<?php echo URL::route('pages.restore', ['id' =>  $page['id']]);?>">
													<button type="submit" class="btn btn-primary"><i class="material-icons">restore</i></button>
													<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
												</form>
											</div>

											<div class="action">
												<form method="post" action="<?php echo URL::route('pages.deletefrombd', ['id' =>  $page['id']]);?>">
													<button type="submit" class="btn btn-danger"><i class="material-icons">remove</i></button>
													<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
												</form>
											</div>
										</div>
										<?php } else {?>
										<div class="btn-group action-buttons" role="group">
											<a href="<?php echo URL::to('/'. $page['slug'] ); ?>">
		<button type="button" class="btn btn-primary"><i class="material-icons">visibility</i></button>
		</a>
											<form method="post" action="<?php echo URL::route('pages.destroy', ['id' =>  $page['id']]);?>">
												<button type="submit" class="btn btn-danger"><i class="material-icons">remove_circle_outline</i></button>
												<input type="hidden" value="DELETE" name="_method">
												<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
											</form>
										</div>
										<?php }?>
									</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
						<?php }?>
				</div>
			</div>
		</div>
@endsection

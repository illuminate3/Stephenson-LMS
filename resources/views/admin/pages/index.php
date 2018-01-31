<div class="container">
		<div class="page-title"><h2><?php echo __('messages.pages'); ?></h2><a href="<?php echo URL::route('pages.create'); ?>"><button class="btn"><i class="material-icons left">add</i><?php echo __('messages.create'); ?></button></a></div>
	
	<div class="row">
		<div class="col s12">
			<?php 
			if (session('success')){
				if (session('success')['success'] == true){
					echo "<div class='success-message'>" . session('success')['messages'] . "</div>";
				} else{
					echo "<div class='error-message'>" . session('success')['messages'] . "</div>";
				}
			}
			?>
		</div>
	</div>
	
	<div class="card">
		<div class="row">
			<div class="col s12">
				<div class="col s12">
					<ul class="tabs" style="border-bottom:1px solid #ececec">
						<li class="tab col s2"><a target="_self" <?php if($loop == "all"){echo "class='active'";} ?> href="<?php echo URL::route('pages.index') ?>">Todas</a></li>
						<li class="tab col s2"><a target="_self" <?php if($loop == "trash"){echo "class='active'";} ?> href="<?php echo URL::route('pages.trash') ?>">Lixeira</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row list-itens">
			<div class="col s12">
				<?php			
					if(count($pages) < 1){
						if($loop = "trash"){
							echo "Nenhuma página encontrada na lixeira.";
						} else{
							echo "Nenhuma página cadastrada. <a href='". URL::route('pages.create') . "'>Criar uma página</a>";
						}
					} else{
				?>
				<table class="highlight responsive-table">
				<thead>
					<tr>
						<td style="width:40px;"><input type="checkbox" id="check_all" class="filled-in"/><label for="check_all"></label></td>
						<td><?php echo __('messages.title'); ?></td>
						<td><?php echo __('messages.slug'); ?></td>
						<td style="width:100px"><?php echo __('messages.actions'); ?></td>
					</tr>
				</thead>

				<tbody>
					<?php foreach($pages as $page) { ?>
					<tr>
						<td><input type="checkbox" class="filled-in item-checkbox" id="test<?php echo $page->id; ?>"/><label for="test<?php echo $page->id; ?>"></label></td>
						<td><a href="<?php echo URL::route('pages.edit', ['page_id' =>  $page->id]);?>"><?php echo $page->title; ?></a></td>
						<td><?php echo $page->slug; ?></td>
						<td>
							<?php if($loop == "trash"){ ?>
							<div class="action">
								<form method="post" action="<?php echo URL::route('pages.restore', ['id' =>  $page['id']]);?>">
									<button class="z-depth-1 waves-effect teal" type="submit"><i class="material-icons">restore</i></button>
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								</form>
							</div>

							<div class="action">
								<form method="post" action="<?php echo URL::route('pages.deletefrombd', ['id' =>  $page['id']]);?>">
									<button class="z-depth-1 waves-effect red" type="submit"><i class="material-icons">remove_circle_outline</i></button>
									<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
								</form>
							</div>
							<?php } else {?>
							<div class="action">
								<a href="<?php echo URL::to('/page/'. $page['id'] ); ?>"><button class="z-depth-1 waves-effect teal"><i class="material-icons">visibility</i></button></a>
							</div>

							<div class="action">
								<form method="post" action="<?php echo URL::route('pages.destroy', ['id' =>  $page['id']]);?>">
									<button class="z-depth-1 waves-effect red" type="submit"><i class="material-icons">remove_circle_outline</i></button>
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
</div>

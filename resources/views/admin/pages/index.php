<div class="container">
	<h2>Páginas</h2>
	
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
	
	<?php			
		if(count($pages) < 1){
			echo "<p>Nenhuma página cadastrada. <a href='". URL::to('/admin/pages/add') . "'>Criar uma página</a></p>";
		} else{
	?>
	
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td>Titulo</td>
				<td>Slug</td>
				<td style="width:100px">Ações</td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($pages as $page) { ?>
			<tr>
				<td><a href="<?php echo URL::route('pages.edit', ['page_id' =>  $page->id]);?>"><?php echo $page->title; ?></a></td>
				<td><?php echo $page->slug; ?></td>
				<td>
					<div class="action">
						<a target="_blank" href="<?php echo URL::to('/'. $page->slug ); ?>"><button class="z-depth-1 waves-effect teal"><i class="material-icons">visibility</i></button></a>
					</div>
					
					<div class="action">
						<form method="post" action="<?php echo URL::route('pages.destroy', ['id' =>  $page->id]);?>">
							<button class="z-depth-1 waves-effect red" type="submit"><i class="material-icons">remove_circle_outline</i></button>
							<input type="hidden" value="DELETE" name="_method">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						</form>
					</div>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	
	<?php	} ?>
</div>
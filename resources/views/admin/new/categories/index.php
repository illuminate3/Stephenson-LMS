<div class="container">
	<div class="page-title"><h2><?php echo __('messages.categories'); ?></h2></div>
	
	<?php 
		if (session('success')){
			if (session('success')['success'] == true){
				echo "<div class='success-message'>" . session('success')['messages'] . "</div>";
			} else{
				echo "<div class='error-message'>" . session('success')['messages'] . "</div>";
			}
		}
	?>
	
	
	<div class="row">
		<div class="col s5">
			<h4><?php echo __('messages.create_category'); ?></h4>
			
			<div class="card list-itens">
				<form method="post" action="<?php echo URL::route('categories.store');?>">
					<div class="row">
						<div class="col s12 input-field">
							<input id="txtCategoryName" type="text" name="name">
							<label for="txtCategoryName"><?php echo __('messages.name'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col s12 input-field">
							<input id="txtCategorySlug" type="text" name="slug">
							<label for="txtCategorySlug"><?php echo __('messages.slug'); ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col s12">
							<label for="clrCategoryColor"><?php echo __('messages.color'); ?></label>
							<input id="clrCategoryColor" type="color" name="color">
						</div>
					</div>
					<div class="row">

					<div class="input-field col s12">
						<select name="level">
							<option value="0" disabled selected><?php echo __('messages.primary'); ?></option>
							<?php foreach($categories as $category) { ?>
							<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
							<?php }?>
						</select>

						<label><?php echo __('messages.hierarchy'); ?></label>
					</div>

					</div>
					<div class="row">
						<div class="col s12">
							<button type="submit" class="btn"><?php echo __('messages.create_category'); ?></button>
						</div>
					</div>
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				</form>
			</div>
		</div>
		
		<div class="col s7">
			<h4><?php echo __('messages.view_category'); ?></h4>
			<div class="card list-itens">

			<?php			
			if(count($categories) < 1){
				echo __('messages.no_category_created');
			} else{
			?>
				<table class="highlight responsive-table">
					<thead>
						<tr>
							<td><?php echo __('messages.category'); ?></td>
							<td>Slug</td>
							<td style="width:100px;"><?php echo __('messages.actions'); ?></td>
						</tr>
					</thead>

					<tbody>
						<?php foreach($categories as $category) { ?>
							<tr>
								<td><?php echo $category['name']; ?></td>
								<td><?php echo $category['slug']; ?></td>
								<td>
									<div class="action">
										<a href="<?php echo URL::route('categories.edit', ['categories_id' => $category->id]);?>"><button class="z-depth-1 waves-effect teal"><i class="material-icons">edit</i></button></a>
									</div>

									<div class="action">
										<form method="post" action="<?php echo URL::route('categories.destroy',['categories_id' => $category->id]);?>">
											<button class="red z-depth-1 waves-effect" type="submit"><i class="material-icons">remove_circle_outline</i></button>
											<input type="hidden" value="DELETE" name="_method">
											<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
										</form>
									</div>
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
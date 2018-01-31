<div class="container">
	
	<div class="page-title"><h2><?php echo __('messages.courses'); ?></h2><a href="<?php echo URL::route('courses.create'); ?>"><button class="btn"><i class="material-icons left">add</i><?php echo __('messages.create'); ?></button></a></div>
	
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
		if(count($courses) < 1){
			echo "<p>Nenhum curso cadastrado. <a href='". URL::route('courses.create') . "'>" .  __('messages.create_course') . "</a></p>";
		} else{
	?>	
	<div class="card">
	
	<div class="row list-itens">
		<div class="col s12">
	<table class="highlight responsive-table">
		<thead>
			<tr>
				<td style="width:40px;"><input type="checkbox" id="check_all" class="filled-in"/><label for="check_all"></label></td>
				<td><?php echo __('messages.title'); ?></td>
				<td><?php echo __('messages.author'); ?></td>
				<td><?php echo __('messages.date'); ?></td>
				<td style="width:150px"><?php echo __('messages.actions'); ?></td>
			</tr>
		</thead>
		
		<tbody>
			<?php foreach($courses as $course) { ?>
			<tr>
				<td><input type="checkbox" class="filled-in item-checkbox" id="test<?php echo $course->id; ?>"/><label for="test<?php echo $course->id; ?>"></label></td>
				<td><a href="<?php echo URL::route('courses.edit', ['course_id' =>  $course['id']]);?>"><?php echo $course->title; ?></a></td>
				<td><?php echo $course->author->firstname . " " . $course->author->lastname; ?></td>
				<td><?php echo $course->created_at; ?></td>
				<td>
					<div class="action">
						<a target="_blank" href="<?php echo URL::to('/curso/'. $course['id'] ); ?>"><button class="z-depth-1 waves-effect teal"><i class="material-icons">visibility</i></button></a>
					</div>
					
					<div class="action">
						<a href="<?php echo URL::route('courses.manage', ['course_id' =>  $course['id']]);?>"><button class="z-depth-1 waves-effect teal"><i class="material-icons">settings</i></button></a>
					</div>
					
					<div class="action">
						<form method="post" action="<?php echo URL::route('courses.destroy', ['id' =>  $course['id']]);?>">
							<button type="submit" class="red z-depth-1 waves-effect"><i class="material-icons">remove_circle_outline</i></button>
							<input type="hidden" value="DELETE" name="_method">
							<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						</form>
					</div>
				</td>
			</tr>
			<?php }?>
		</tbody>
	</table>
	</div>
	</div>
	</div>
	<?php }?>
</div>

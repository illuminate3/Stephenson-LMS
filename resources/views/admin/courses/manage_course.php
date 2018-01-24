<div class="container">
	<h2>Gerenciar <?php echo $course['title'];?></h2>
	
	<ul class="collapsible white" data-collapsible="accordion">
		<?php 
			if(count($course->getModules) > 0){
				$modules = $course->getModules;
				foreach ($modules as $module) { 
		?>
		
		<li>
			<div class="collapsible-header"><?php echo $module['name']; ?> 
			<div class="action" class="right" >
				<form method="post"action="<?php echo URL::route('admin.delete_module', ['id' =>  $module['id']]);?>">
					<button type="submit" class="red z-depth-1 waves-effect"><i class="material-icons">remove_circle_outline</i></button>
					<input type="hidden" value="DELETE" name="_method">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				</form>
			</div>
			</div>
			<div class="collapsible-body">
				<ul class="collection with-header">
					<?php 
						if(count($module->getLessons) > 0){
							$lessons = $module->getLessons;
							foreach ($lessons as $lesson) { 
					?>
					<li class="collection-item">
						<div>
							<a href="<?php echo URL::route('admin.edit_lesson',['course' => $course->id, 'module' => $module->id, 'lesson' => $lesson->id]);?>"><?php echo $lesson->title; ?></a>
						</div>
					</li>
					<?php }} else{?>
						Nenhuma aula cadastrada nesse módulo.
					<?php }?>
					<li class="collection-item">
						<div>
							<a href="<?php echo URL::route('admin.add_lesson',['course' => $course['id'], 'module' => $module['id']]);?>"><button type="submit" class="btn">Adicionar Aula</button></a>
						</div>
					</li>
				</ul>
			</div>
		</li>
		
		<?php } } else{ ?>
			<li style="padding:20px;">Nenhum módulo criado, clique no botão abaixo para criar um.</li>
		<?php }?>
		
		<li style="padding:20px;">
			<form method="post" action="<?php echo URL::route('admin.add_module',['id' => $course['id']]);?>">
				<div class="row"  style="margin:0px;">
					<div class="col s8"><input type="text" placeholder="Nome do Modulo" name="name"></div>
					<div class="col s4"><button class="btn">Adicionar Módulo</button></div>
					<input type="hidden" name="course_id" value="<?php echo $course['id'] ?>">
				</div>
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</form>
		</li>
	</ul>
</div>
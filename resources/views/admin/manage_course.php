	<h3>Conteúdo do Curso</h3>

	<ul class="collapsible" data-collapsible="accordion">
		<?php 
			if(count($modules) > 0){
				foreach ($modules as $module) { 
		?>
		
		<li>
			<div class="collapsible-header"><?php echo $module['name']; ?></div>
			<div class="collapsible-body">
				<ul class="collection with-header">
					<li class="collection-item"><div>Aula 1<a href="#!" class="secondary-content"><i class="material-icons">remove_circle_outline</i></a><a href="#!" class="secondary-content"><i class="material-icons">edit</i></a></div></li>
					<li class="collection-item"><div>Aula 2<a href="#!" class="secondary-content"><i class="material-icons">remove_circle_outline</i><a href="#!" class="secondary-content"><i class="material-icons">edit</i></a></div></li>
					<li class="collection-item"><div>Aula 3<a href="#!" class="secondary-content"><i class="material-icons">remove_circle_outline</i><a href="#!" class="secondary-content"><i class="material-icons">edit</i></a></div></li>
					<li class="collection-item"><div>Aula 4<a href="#!" class="secondary-content"><i class="material-icons">remove_circle_outline</i><a href="#!" class="secondary-content"><i class="material-icons">edit</i></a></div></li>
					<li class="collection-item"><div><button type="submit" class="btn">Adicionar Aula</button></div></li>
				</ul>
			</div>
		</li>
		
		<?php } } else{ ?>
			<li>Nenhum módulo criado, clique no botão abaixo para criar um.</li>
		<?php }?>
		
		<li style="padding:20px;">
			<form method="post" action="<?php echo URL::route('admin.add_module',['id' => $course['id']]);?>">
				<div class="row"  style="margin:0px;">
					<div class="col s8"><input type="text" placeholder="Nome do Modulo" name="name"></div>
					<div class="col s4"><button class="btn">Adicionar Módulo</button></div>
					<input type="hidden" name="course" value="<?php echo $course['id'] ?>">
				</div>
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			</form>

		</li>
	</ul>
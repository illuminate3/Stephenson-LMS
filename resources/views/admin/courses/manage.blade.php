{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <div class="modal" tabindex="-1" role="dialog" id="add-material-modal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

        </div>
      </div>
    </div>

    <nav aria-label="breadcrumb" id="page-nav">
    	<div class="container">
    		<ol class="breadcrumb">
    			<li class="breadcrumb-item">
    				<a href="<?php echo URL::route('courses.index');?>">
    					<?php echo __('messages.courses'); ?>
    				</a>
    			</li>
    			<li class="breadcrumb-item active" aria-current="page">
    				<?php echo __('messages.manage_course'); ?>
    			</li>
    		</ol>
    	</div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
    	<div class="container">
    		<h1 class="display-4">
    			<?php echo __('messages.manage_course'); ?>
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

    	<?php if(count($course->getModules) > 0){?>
    	<div id="modules-list">
    		<?php $modules = $course->getModules; foreach ($modules as $module) {  ?>
    		<div class="card module" id="module-<?php echo $module->id ?>">
    			<div class="card-header" id="module-heading-<?php echo $module->id ?>">
    				<div class="row">
    					<div class="col-1 drag-module">=</div>
    					<h5 class="mb-0 col-8">
    						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-<?php echo $module->id ?>" aria-expanded="false" aria-controls="collapse-<?php echo $module->id ?>">
    						 <?php echo $module->name ?>
    					  </button>
    					</h5>

    					<div class="module-actions col-3">
    						<div class="btn-group action-buttons" role="group">
    							<a href="#">
    							<button type="button" class="btn btn-primary"><i class="material-icons">edit</i></button>
    						</a>

    							<form method="post" action="<?php echo URL::route('course.module.destroy', ['course_id' => $course->id, 'module_id' =>  $module['id']]);?>">
    								<button type="submit" class="btn btn-danger"><i class="material-icons">remove_circle_outline</i></button>
    								<input type="hidden" value="DELETE" name="_method">
    								<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div id="collapse-<?php echo $module->id ?>" class="collapse" aria-labelledby="module-heading-<?php echo $module->id ?>" data-parent="#modules-list">
    				<div class="card-body">
    					<?php if(count($module->getLessons) > 0){ ?>

    					<div class="lessons-list">
    						<?php $lessons = $module->getLessons; foreach ($lessons as $lesson) { ?>
    						<div class="card lesson" id="lesson-<?php echo $lesson->id ?>">
    							<div class="card-header" id="lesson-heading-<?php echo $lesson->id; ?>">
    								<div class="row">
    									<div class="col-1 drag-lesson">=</div>
    									<h5 class="mb-0 col-8">
    										<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#lesson-collapse-<?php echo $lesson->id; ?>" aria-expanded="false" aria-controls="collapseTwo">
    											<?php echo $lesson->title ?>
    									   </button>
    									</h5>

    									<div class="lesson-actions col-3">
    										<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    											<a href="<?php echo URL::route('course.module.lesson.edit',['course_id' => $course->id, 'module_id' => $module->id, 'lesson_id' => $lesson->id]);?>">
    												<button type="button" class="btn btn-primary"><i class="material-icons">edit</i></button>
    											</a>
    											<form method="post" action="<?php echo URL::route('course.module.lesson.destroy', ['course_id' => $course->id, 'module_id' =>  $module->id, 'lesson_id' => $lesson->id]);?>">
    												<button type="submit" class="btn btn-danger"><i class="material-icons">remove_circle_outline</i></button>
    												<input type="hidden" value="DELETE" name="_method">
    												<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    											</form>

    											<div class="btn-group" role="group">
    												<button id="add-material-<?php echo $lesson->id; ?>" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    												Material
    											 </button>
    												<div class="dropdown-menu" aria-labelledby="add-material-<?php echo $lesson->id; ?>">
    													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="file" href="#">Arquivo</a>
    													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="image" href="#">Imagem</a>
    													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="video" href="#">Vídeo</a>
    													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="note" href="#">Nota</a>
    													<a class="dropdown-item" class="add-material" data-toggle="modal" data-target="#add-material-modal" data-mtype="poll" href="#">Enquete</a>
    												</div>
    											</div>
    										</div>
    									</div>
    								</div>
    							</div>
    							<div id="lesson-collapse-<?php echo $lesson->id; ?>" class="collapse" aria-labelledby="lesson-heading-<?php echo $lesson->id; ?>" data-parent=".lesson-list">
    								<div class="card-body">
    									<?php if(count($lesson->getMaterials) > 0){ ?>
    									<div class="materials">
    										<?php $materials = $lesson->getMaterials; foreach ($materials as $material) { ?>
    											<div id="material">
    												<?php
    													switch ($material->type) {
    													case "add_note":
    														echo "<i class='material-icons'>note</i>";
    														break;
    													case "add_poll":
    														echo "<i class='material-icons'>question_answer</i>";
    														break;
    													case "add_photo":
    														echo "<i class='material-icons'>photo</i>";
    														break;
    													case "add_video":
    														echo "<i class='material-icons'>play_arrow</i>";
    														break;
    													}
    												?>
    												<?php echo $material->title;?>
    											</div>
    										<?php }?>
    									</div>
                    <?php } else {?>
                      <p>Nenhum material cadastrado.</p>
                    <?php } ?>
    								</div>
    							</div>
    						</div>
    						<?php } ?>
    					</div>
    					<?php } else { ?> Nenhuma aula cadastrada
    					<?php } ?>
    					<a class="btn btn-primary btn-lg btn-block mt-3" href="<?php echo URL::route('course.module.lesson.create',['course_id' => $course->id, 'module_id' => $module->id]);?>">
    						Criar Aula para este Módulo
    					</a>
    				</div>
    			</div>
    		</div>
    		<?php } ?>
    	</div>
    	<?php } else { ?>
    	<p>Nenhum módulo criado, crie um usando o formulário abaixo.</p>
    	<?php } ?>
    		<div class="card">
    			<div class="card-body">
    				<form class="form-inline" method="post" action="<?php echo URL::route('course.module.store',['course_id' => $course->id]);?>">
    					<div class="form-group">
    						<label for="inlineFormInputName2">Criar um Módulo</label>
    						<input type="text" class="form-control mx-sm-3" id="inlineFormInputName2" placeholder="Nome do Módulo" name="name">
    					</div>
    					<input type="hidden" name="course_id" value="<?php echo $course['id'] ?>">
    					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    					<button type="submit" class="btn btn-primary sm-3">Criar</button>

    				</form>
    			</div>
    		</div>
    </div>
@endsection

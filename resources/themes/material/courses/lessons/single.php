<!DOCTYPE html>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<link rel="stylesheet" href="<?php echo url('css/materialize.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo theme_url('css/material-icons.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo theme_url('css/lesson.css'); ?>">
	</head>

	<body>
		
		<div id="slide-left" class="side-nav fixed">
			<div class="header-bar">
				<h4>Navegação</h4>
			</div>	
			<?php if(count($course->getModules) > 0){?>
				<div id="modules-list">
					<?php $modules = $course->getModules; foreach ($modules as $module) { ?>
						<div class="module">
							<div class="module-header">
								<div class="module-name">
									<i class="material-icons">folder</i><?php echo $module['name']; ?>
								</div> 
							</div>

							<div class="module-body">
								<?php if(count($module->getLessons) > 0){ ?>
									<div class="lessons-list">
										<?php $lessons = $module->getLessons; foreach ($lessons as $lesson) { ?>
											<div class="lesson">
												<i class="material-icons">play_circle_outline</i><a href="<?php echo URL::route('lesson.view_lesson', ['course_id' => $course->id, 'lesson' => $lesson->id]);?>"><?php echo $lesson->title; ?></a>
											</div>
										<?php }?>
									</div>
								<?php } else{ ?>
									<div class="no-lesson">Nenhuma aula cadastrada nesse módulo.</div>
								<?php }?>
							</div>
						</div>

					<?php } ?>
				</div>
			<?php } else { ?>

			<div class="no-module card">Nenhum módulo criado. Quem sabe mais tarde...</div>

			<?php }?>
			
			<div style="padding:15px 5%;">
				<a href="<?php echo URL::to('/course/' . $course['id']);?>"><buttons class="btn"><i class="material-icons left">keyboard_arrow_left</i>Voltar</button></a>
			</div>
		</div>
		
		<main>
			<div class="container">
				<a href="#" data-activates="slide-left" class="button-collapse-left"><i class="material-icons">menu</i></a>
			<div class="container">
				<h3 class="white-text"><?php echo $lesson->title; ?></h3>

				<div class="video-container">
					<?php echo $video; ?>
				</div>
				<?php echo $lesson->description; ?>
				
			</div>
				<a href="#" data-activates="slide-right" class="button-collapse-right"><i class="material-icons">menu</i></a>
			</div>
		</main>
		
		<div id="slide-right" class="side-nav fixed">
			<div class="header-bar">
				<h4>Materiais</h4>
			</div>	
		<?php $materials = $lesson->getMaterials; if(count($materials) > 0){ ?>
			<div class="row">
				<?php foreach($materials as $material) { ?>
				<div class="col s12">
				<div class="card">
            <div class="card-content">
              <span class="card-title"><?php echo $material->title;?></span>
					<?php echo $material->content;?>
            </div>
				 </div>
				 </div>
				<?php } ?>
			</div>	
		<?php } else {?>
			<div class="row">
			<div class="col s12">
			Nenhum material disponível para esta aula.
			</div>
			</div>
		<?php } ?>
		
		</div>	


    	<script type="text/javascript" src="<?php echo url('js/jquery-3.2.1.min.js'); ?>"></script>
    	<script type="text/javascript" src="<?php echo url('js/materialize.min.js'); ?>"></script>
		<script>
			$('.button-collapse-left').sideNav({
			menuWidth: 300, // Default is 300
			edge: 'left', // Choose the horizontal origin
			});
			
			$('.button-collapse-right').sideNav({
			menuWidth: 300, // Default is 300
			edge: 'right', // Choose the horizontal origin
			});
			
			$('.module-name').click(function(){
				if($(this).parent().parent().find('.module-body').is(':visible')){
					$(this).parent().parent().find('.module-body').slideUp();
				} else{
					$('.module-body').slideUp();
					$(this).parent().parent().find('.module-body').slideDown();
				}
			});
		</script> 	
	</body>
</html>

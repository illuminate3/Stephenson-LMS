<!DOCTYPE html>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<link rel="stylesheet" href="<?php echo url('css/materialize.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo url('css/material-icons.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo url('css/lesson.css'); ?>">
	</head>

	<body>
		<div id="lesson-left-bar"  class="z-depth-1">
			<div class="header-bar">
				<button><i class="material-icons">menu</i></button>
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
				<a href="<?php echo URL::to('/curso/' . $course['id']);?>"><buttons class="btn"><i class="material-icons left">keyboard_arrow_left</i>Voltar</button></a>
			</div>
		</div>
		
		
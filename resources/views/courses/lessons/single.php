
	<div class="teal white-text" id="lesson-left-bar">
		<ul class="modules">
		<?php $modules = $course->getModules; foreach($modules as $module){ ?>
			<li class="module"><?php echo $module->name; ?>
			<ul class="lessons">
				<?php $lessons = $module->getLessons; foreach($lessons as $lesson){ ?>
					<li class="lesson"><?php echo $lesson->title; ?></li>
				<?php } ?>
			</ul>
			</li>
		<?php } ?>
		</ul>
	</div>

	<div id="lesson-video">
		<div class="container">
			<h3><?php echo $lesson->title; ?></h3>

			<div class="video-container">
				<?php echo $video; ?>
			</div>
		</div>
	</div>

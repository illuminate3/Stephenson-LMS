<?php echo view('header', ['title' => $title, 'course' => $course]); ?>

<?php echo view('courses.course_panel_header', ['page' => $page, 'course' => $course, 'modules' => $modules, 'user_joined' => $user_joined]); ?>

<div id="course-description">
	<?php if( $course->description == null){?>
	<p>Nenhuma descrição disponível para este curso.</p>
	<?php } else {echo $course->description;}?>
</div>

<?php echo view('courses.course_panel_footer'); ?>
<?php echo view('footer'); ?>

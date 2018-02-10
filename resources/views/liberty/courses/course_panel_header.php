<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function confirmLeave(){
	swal({
		title: "Você tem certeza?",
		text: "Caso saia do curso, todo seu progresso será perdido!",
		icon: "warning",
buttons: ["Cancelar", "Sair!"],
		dangerMode: true,
	})
	
	.then((willDelete) => {
		if (willDelete) {
			document.getElementById("leave-course").submit();
		} else {
			swal.close();
		}
	});
}
</script>

<main id="course-single">
	<div class="container">
		<div class="row">
			<div class="col s3">
			<div class="card" id="course-sidebar">
				<div id="course-cover">
					<img src="<?php echo $course->cover;?>">
				</div>
				<div class="container">
				<form method="post" id="leave-course" action="<?php echo URL::route('courses.leave_course', ['course_id' => $user_joined->id]);?>">
					<button type="button" class="btn-large" onclick="confirmLeave();">Sair do Curso</button>
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				</form>
				<div id="course-info">
					<div class="info"><i class="material-icons">person</i><?php echo $course->author->firstname . " " . $course->author->lastname;?></div>
					<div class="info"><i class="material-icons">folder</i><?php echo count($course->getModules)?> módulos</div>
					<div class="info"><i class="material-icons">video_library</i><?php echo count($course->getLessons)?> aulas</div>
				</div>
				</div>
			</div>
			</div>
			
			<div class="col s9">
				<h2 class="course-title"><?php echo $course->title;?></h2>

				<ul class="tabs">
					<li class="tab col s3"><a <?php echo ($page == "single" ? 'class="active"' : null);?> href="<?php echo URL::route('courses.single', ['course_id' => $course->id]);?>" target="_self">Descrição</a></li>
					<li class="tab col s3"><a <?php echo ($page == "content" ? 'class="active"' : null);?> href="<?php echo URL::route('courses.single_content', ['course_id' => $course->id, 'page' => 'content']);?>" target="_self">Conteúdos</a></li>
					<li class="tab col s3 disabled"><a href="<?php echo URL::route('courses.single_content', ['course_id' => $course->id, 'page' => 'notices']);?>" target="_self">Avisos</a></li>
					<li class="tab col s3 disabled"><a href="<?php echo URL::route('courses.single_content', ['course_id' => $course->id, 'page' => 'rating']);?>" target="_self">Avaliações</a></li>
				</ul>
				<div class="section">
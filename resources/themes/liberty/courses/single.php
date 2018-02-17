<?php echo view('header', ['title' => $title]); ?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php echo $course->title ?></h1>
  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-3">

			<div class="card" id="course-sidebar">
				<img class="card-img-top" src="<?php echo $course->cover;?>">
				
				<div class="card-body">
				<?php if(Auth::user()){ ?>
					<form method="post" action="<?php echo URL::route('courses.enter_course', ['course_id' => $course->id, 'user_id' => Auth::user()->id, 'type' => 2]);?>">
						<button class="btn btn-primary btn-block" type="submit">Entrar no Curso</button>
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					</form>
				<?php } else { ?>
					<a href="<?php echo URL::route('login');?>" class="btn btn-primary btn-block">Entrar no Curso</a>
				<?php } ?>	
				<div id="course-info">
					<div class="info"><i class="far fa-user"></i><?php echo $course->author->firstname . " " . $course->author->lastname;?></div>
					<div class="info"><i class="far fa-folder"></i><?php echo count($course->getModules)?> módulos</div>
					<div class="info"><i class="far fa-play"></i><?php echo count($course->getLessons)?> aulas</div>
				</div>
				</div>
			</div>
		</div>
		
		<div class="col-9">
			<?php if( $course->description == null){?>
				<p>Nenhuma descrição disponível para este curso.</p>
			<?php } else {echo $course->description;}?>
		</div>
	</div>
</div>

<?php echo view('footer'); ?>
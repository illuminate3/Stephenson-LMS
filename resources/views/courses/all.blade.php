{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Cursos</h1>
      </div>
    </div>

    <div class="container">
    		<?php if(count($courses) > 0) { ?>
    			<div class="row">
    				<?php foreach($courses as $course) { ?>
    				<div class="col-3">
    					<div class="card">
    							<?php if($course['cover'] == NULL){?>
    								<img class="card-img-top" src="<?php echo asset("assets/images/thumbnail-default.jpg"); ?>" alt="<?php echo $course['title']; ?>">
    							<?php } else {?>
    								<img class="card-img-top" src="<?php echo asset($course['cover']); ?>" alt="<?php echo $course['title']; ?>">
    							<?php }?>
    						<div class="card-body">
    						<h5 class="card-title"><?php echo $course['title']; ?></h5>
    						<p class="card-text"><?php echo $course['resume'] ?></p>
    						<a href="<?php echo URL::route('courses.single', ['course' => $course->id]);?>" class="btn btn-primary">Ver</a>
    						</div>
    					</div>
    				</div>
    			<?php } ?>
    		</div>
    		<?php } else {?>
    			<p>Nenhum curso cadastrado.</p>
    		<?php }?>
    </div>
@endsection

<?php echo view('header', ['title' => "Cursos - Stephenson"]); ?>
<main>
	<div id="page-title"><div class="container"><h2>Cursos</h2></div></div>
	
	<div class="container">
		<div class="section">
				<?php if(count($courses) > 0) { ?>
				<div class="row">
					<?php foreach($courses as $course) { ?>
						<div class="col s12 m6 l3">
							<div class="card">
								<div class="card-image">
									<?php if($course['cover'] == NULL){?>
										<img src="images/thumbnail-default.jpg">
									<?php } else {?>
										<img src="<?php echo $course['cover'] ?>">
									<?php }?>

									<!--<form method="post" action=""> -->
										<button class="btn-floating halfway-fab waves-effect waves-light grey" type="submit"><i class="material-icons">watch_later</i></button>
										<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
									<!--</form>-->
								</div>
								
								<div class="card-content">
									<span class="card-title"><?php echo $course['title']; ?></span>
									<p><?php echo $course['resume']; ?></p>
								</div>
								<div class="card-action"><a href="<?php echo URL::route('courses.single', ['course' => $course->id]);?>">Ver</a></div>
							</div>
						</div>  
					<?php } ?>
				</div>
				<?php } else { ?>
					<p>Nenhum curso cadastrado.</p>
				<?php }  ?>
		</div>
	</div>
</main>
<?php echo view('footer'); ?>
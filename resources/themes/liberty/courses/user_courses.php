<main>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Meus Cursos</h1>
  </div>
</div>
	
	<div class="container">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link <?php echo ($loop == "studying") ? "active" : null;?>" href="<?php echo URL::route('courses.user_courses'); ?>">Cursando</a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link <?php echo ($loop == "favorites") ? "active" : null;?>" href="<?php echo URL::route('courses.user_favorite_courses'); ?>">Favoritos</a>
			</li>
		</ul>
<br>
				<?php if(count($courses) > 0) { ?>
					<div class="row">
						<?php foreach($courses as $course) { ?>
							<div class="col-3">
								<div class="card">
										<?php if($course->course->cover == NULL){?>
											<img class="card-img-top" src="<?php echo theme_url("images/thumbnail-default.jpg"); ?>" alt="<?php echo $course['title']; ?>">
										<?php } else {?>
											<img class="card-img-top" src="<?php echo theme_url($course->course->cover); ?>" alt="<?php echo $course['title']; ?>">
										<?php }?>
									<div class="card-body">
									<h5 class="card-title"><?php echo $course->course->title; ?></h5>
									<p class="card-text"><?php echo $course->course->resume; ?></p>
									<a href="<?php echo URL::to('/curso/' . $course->course->id); ?>" class="btn btn-primary">Ver</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } else {
					if($loop == "studying"){
						echo "<p>Você não está cursando nenhum curso atualmente.</p>";
					} else{
						echo "<p>Você não favoritou nenhum curso.</p>";
					}
				}  ?>
		</div>
	</div>
</main>
<main>
	<div id="page-title"><div class="container"><h2>Meus Cursos</h2></div></div>
	
	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col s12">
					<ul class="tabs">
						<li class="tab col s3"><a href="<?php echo URL::route('courses.user_courses'); ?>" target="_self" <?php if($loop == "studying"){echo "class='active'";} ?>>Cursando</a></li>
						<li class="tab col s3"><a href="<?php echo URL::route('courses.user_favorite_courses'); ?>" target="_self" <?php if($loop == "favorites"){echo "class='active'";} ?>>Favoritos</a></li>
					</ul>
				</div>
			</div>

				<?php if(count($courses) > 0) { ?>
					<div class="row">
						<?php foreach($courses as $course) { ?>
							<div class="col s12 m6 l3">
								<div class="card medium">
									<div class="card-image">
										<?php if($course->course->cover == NULL){?>
											<img src="images/thumbnail-default.jpg">
										<?php } else {?>
											<img src="<?php echo $course->course->cover ?>">
										<?php }?>
									</div>

									<div class="card-content">
										<span class="card-title"><?php echo $course->course->title; ?></span>
										<p><?php echo $course->course->resume; ?></p>
									</div>
									<div class="card-action"><a href="<?php echo URL::to('/curso/' . $course->course->id); ?>">Ver</a></div>
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
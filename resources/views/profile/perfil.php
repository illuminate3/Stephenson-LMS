<main>
	<?php echo view('profile/sidebar-profile', ['user' => $user, 'isLoggedProfile' => $isLoggedProfile ]); ?>
	</div>

	<div class="col s9" id="profile-content">
		<h2 class="profile-page-title">Feed</h2>
		<div class="row">
			<?php 
			$courses = $user->getCourses();

			foreach($courses as $course){?>
				echo $course->title;
			<?php } ?>

		</div>
	</div>
	</div>
	</div>
</main>	
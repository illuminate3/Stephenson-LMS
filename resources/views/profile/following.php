<main>
	<div class="container">
		<div class="row">
			<?php echo view('profile/sidebar-profile', ['user' => $user, 'isLoggedProfile' => $isLoggedProfile ]); ?>

			<div class="col s9" id="profile-content">
				<h2 class="profile-page-title">Seguindo</h2>
			</div>
		</div>
	</div>
</main>	
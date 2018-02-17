<?php echo view('header', ['title' => $title]); ?>
		<?php echo view('profile/sidebar-profile', ['user' => $user, 'isLoggedProfile' => $isLoggedProfile ]); ?>

		<div class="col s9" id="profile-content">
			<h2 class="profile-page-title">Feed</h2>
			<hr>
			  <form>
				  <div class="form-group">
					 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alguma novidade que deseja compartilhar?"></textarea>
				  </div>

				  <button type="button" class="btn btn-primary float-right">Publicar</button>
			  </form>
		</div>
	</div>
</div>
<?php echo view('footer'); ?>
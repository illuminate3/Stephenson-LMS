<main>
	<?php echo view('profile/sidebar-profile', ['user' => $user, 'isLoggedProfile' => $isLoggedProfile ]); ?>
	</div>

	<div class="col s9" id="profile-content">
		<h2 class="profile-page-title">Feed</h2>
		<div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Publicar Atualização</span>
				  <textarea class="materialize-textarea"></textarea>
            </div>
            <div class="card-action">
              <a href="#">Publicar</a>
            </div>
          </div>
        </div>
      </div>
	</div>
	</div>
	</div>
</main>	
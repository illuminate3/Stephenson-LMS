<div class="col s3">
	<div id="profile-cover">
		<div id="profile-picture">
			<img src="<?php echo url('images/depoimento/user1.png');?>">
		</div>

		<div id="profile-name"><?php echo $user['firstname'] . " " . $user['lastname']; ?></div>
	</div>
	<div class="collection" id="profile-links">
		<a href="<?php echo URL::route('profile.profile', ['profile' => $user->user]); ?>" class="collection-item">Feed</a>
		<a href="<?php echo URL::route('profile.about', ['profile' => $user->user]); ?>" class="collection-item">Sobre</a>
		<a href="<?php echo URL::route('profile.following', ['profile' => $user->user]);  ?>" class="collection-item">Seguindo</a>
		<a href="<?php echo URL::route('profile.followers', ['profile' => $user->user]);  ?>" class="collection-item">Seguidores</a>
		<?php if($isLoggedProfile){?>
		<a href="<?php echo URL::route('profile.settings', ['profile' => $user->user]);  ?>" class="collection-item">Configurações</a>
		<?php } ?>
	</div>
</div>
<div id="profile-cover">
	<div class="container">
		<div id="profile-picture">
			<img src="<?php echo url('images/depoimento/user1.png');?>">
		</div>

		<div id="profile-name"><?php echo $user['firstname'] . " " . $user['lastname']; ?></div>
		
		<div id="profile-buttons">
			<button class="btn"><i class="material-icons left">rss_feed</i>Seguir</button>
			<button class="btn"><i class="material-icons left">message</i>Mensagem</button>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col s3">
			<ul class="collection">
				<li class="collection-item"><a href="<?php echo URL::route('profile.profile', ['profile' => $user->user]); ?>">Feed</a></li>
				<li class="collection-item"><a href="<?php echo URL::route('profile.about', ['profile' => $user->user]); ?>">Sobre</a></li>
				<li class="collection-item"><a href="<?php echo URL::route('profile.following', ['profile' => $user->user]);  ?>">Seguindo</a></li>
				<li class="collection-item"><a href="<?php echo URL::route('profile.followers', ['profile' => $user->user]);  ?>">Seguidores</a></li>
			<?php if($isLoggedProfile){?>
				<li class="collection-item"><a href="<?php echo URL::route('profile.settings', ['profile' => $user->user]);  ?>" >Configurações</a></li>
			<?php } ?>
			</ul>


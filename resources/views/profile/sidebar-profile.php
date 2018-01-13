<div class="col s3">
	<div id="profile-cover">
		<div id="profile-picture">
			<img src="<?php echo url('images/depoimento/user1.png');?>">
		</div>

		<div id="profile-name"><?php echo $user['firstname'] . " " . $user['lastname']; ?></div>
	</div>
	<div class="collection" id="profile-links">
		<a href="<?php echo URL::to('/perfil/' . $user['user'] .'/'); ?>" class="collection-item">Feed</a>
		<a href="<?php echo URL::to('/perfil/' . $user['user'] .'/about'); ?>" class="collection-item">Sobre</a>
		<a href="<?php echo URL::to('/perfil/' . $user['user'] .'/following'); ?>" class="collection-item">Seguindo</a>
		<a href="<?php echo URL::to('/perfil/' . $user['user'] .'/followers'); ?>" class="collection-item">Seguidores</a>
		<a href="<?php echo URL::to('/perfil/' . $user['user'] .'/settings'); ?>" class="collection-item">Configurações</a>
	</div>
</div>
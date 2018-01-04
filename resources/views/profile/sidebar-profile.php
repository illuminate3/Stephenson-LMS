<div class="col s3">
	<div id="profile-cover">
		<div id="profile-picture">
			<img src="<?php echo url('images/depoimento/user1.png');?>">
		</div>

		<div id="profile-name">John Doe</div>
	</div>
	<div class="collection" id="profile-links">
		<a href="<?php echo URL::to('/perfil/' . $user .'/'); ?>" class="collection-item">Feed</a>
		<a href="<?php echo URL::to('/perfil/' . $user .'/about'); ?>" class="collection-item">Sobre</a>
		<a href="<?php echo URL::to('/perfil/' . $user .'/following'); ?>" class="collection-item">Seguindo</a>
		<a href="<?php echo URL::to('/perfil/' . $user .'/followers'); ?>" class="collection-item">Seguidores</a>
		<a href="<?php echo URL::to('/perfil/' . $user .'/settings'); ?>" class="collection-item">Configurações</a>
	</div>
</div>
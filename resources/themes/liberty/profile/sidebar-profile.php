<?php if($isLoggedProfile){ ?>
<div id="change-profile-picture" class="modal">
	<div class="modal-content">
		<h4>Alterar Foto de Perfil</h4>
		  <form action="#">
    <div class="file-field input-field">
      <div class="btn">
        <span>Imagem</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
  </form>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
	</div>
</div>
<?php } ?>

<div id="profile-cover">
	<div class="container">
		<div id="profile-picture">
			<?php if($isLoggedProfile){ echo '<a class="modal-trigger" href="#change-profile-picture"><div id="change-photo"><i class="material-icons">camera_alt</i></div></a>'; } ?>
			
			<?php if ($user['avatar'] == null){ ?>
				<img src="<?php echo url('images/avatar-default.png');?>">
			<?php } else { ?>
				<img src="<?php echo url($user['avatar']);?>">
			<?php }?>
		</div>

		<div id="profile-name"><?php echo $user['firstname'] . " " . $user['lastname']; ?></div>
		
		<?php if(!$isLoggedProfile){ ?>
		<div id="profile-buttons">
			<button class="btn"><i class="material-icons left">rss_feed</i>Seguir</button>
			<button class="btn"><i class="material-icons left">message</i>Mensagem</button>
		</div>
		<?php } ?>
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
			</ul>


<div class="container mt-5">
<div class="row">
	<div class="col-3">
		<div class="card">
			<?php if ($user['avatar'] == null){ ?>
			<img class="card-img-top" src="<?php echo asset('assets/images/avatar-default.png');?>" alt="Card image cap">
			<?php } else { ?>
			<img class="card-img-top" src="<?php echo asset('uploads/avatars/' . $user['avatar']);?>" alt="Card image cap">
			<?php }?>

			<div class="card-body">
				<h5 class="card-title text-center">
					<?php echo $user['firstname'] . " " . $user['lastname']; ?>
				</h5>

				@auth
					@if(!$isLoggedProfile)
					<div class="card-text mb-2">
						<div class="btn-group" role="group" aria-label="Basic example" style="width:100%">
						  <button type="button" class="btn btn-primary" style="width:50%"><i class="ion-social-rss"></i></button>
						  <button type="button" class="btn btn-primary" style="width:50%"><i class="ion-ios-email"></i></button>
						</div>
						</div>
						@endif
					@endauth

				<ul class="nav nav-pills flex-column list-group">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo URL::route('profile.profile', ['profile' => $user->user]); ?>">Feed</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo URL::route('profile.about', ['profile' => $user->user]); ?>">Sobre</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo URL::route('profile.following', ['profile' => $user->user]);  ?>">Seguindo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo URL::route('profile.followers', ['profile' => $user->user]);  ?>">Seguidores</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-9">

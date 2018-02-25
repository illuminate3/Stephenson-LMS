{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
		<?php echo view('profile/sidebar-profile', ['user' => $user, 'isLoggedProfile' => $isLoggedProfile ]); ?>

		<div class="col s9" id="profile-content">
			<h2 class="profile-page-title">Feed</h2>
			<hr>
			<?php if ($isLoggedProfile){ ?>
			  <form method="post" action="<?php echo URL::route('post.store'); ?>">
				  <div class="form-group">
					 <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alguma novidade que deseja compartilhar?"></textarea>
				  </div>
				  <input type="hidden" name="user_id" value="<?php echo $user->id; ?>">
				  <input type="hidden" name="type" value="status">
				  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				  <button type="submit" class="btn btn-primary float-right">Publicar</button>
				  <div class="clearfix"></div>
			  </form>
			<?php } ?>

			<ul class="list-unstyled" id="activities">
			<?php foreach($activities as $activity) { ?>
				<li class="media mb-3">
					<img class="mr-3" height="64px" src="<?php echo asset('assets/images/avatar-default.png');?>">
					<div class="media-body">
      				<h5 class="mt-0 mb-1"><?php echo $user->firstname . " " . $user->lastname; ?></h5>
						<?php echo __("messages.activity." . $activity->type, ['course' => $activity->relation]); ?>
					</div>
				</li>
			<?php } ?>
			</ul>
		</div>
	</div>
</div>
@endsection

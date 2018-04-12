{{-- Chama a template pré pronta --}}
@extends('profile.profile-template')

@section('profileContent')
    @parent
			<?php if ($isLoggedProfile){ ?>
			  <form method="post" action="<?php echo URL::route('post.store'); ?>">
				  <div class="form-group">
					 <textarea name="data" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alguma novidade que deseja compartilhar?"></textarea>
				  </div>

				  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				  <button type="submit" class="btn btn-primary float-right">Publicar</button>
				  <div class="clearfix"></div>
			  </form>
			<?php } ?>
      @if (count($activities) >= 1)
      <ul class="list-unstyled" id="activities">
    		@foreach($activities as $activity)
          <li class="media mb-3">
            <?php if ($user['avatar'] == null){ ?>
              <img class="mr-3" height="64px" src="<?php echo asset('assets/images/avatar-default.png');?>" alt="Card image cap">
            <?php } else { ?>
              <img class="mr-3" height="64px" src="<?php echo asset('uploads/avatars/' . $user['avatar']);?>" alt="Card image cap">
            <?php }?>
  					<div class="media-body">
        			<div class="mt-0 mb-1"><b><?php echo $user->firstname . " " . $user->lastname; ?></b>  - em <span>{{$activity->created_at}}</span></div>
              <?php
              switch($activity->type){
                  case('enter_course'):
                      $activity_data = unserialize($activity->data);
                      echo __('messages.activity.' . $activity->type, ['course' => $activity_data['course_name']]);
                      break;
                  case('favorite_course'):
                      $activity_data = unserialize($activity->data);
                      echo __('messages.activity.' . $activity->type, ['course' => $activity_data['course_name']]);
                      break;
                  case('leave_course'):
                      $activity_data = unserialize($activity->data);
                      echo __('messages.activity.' . $activity->type, ['course' => $activity_data['course_name']]);
                      break;
                  default:
                      echo $activity->data;
              }
              ?>
  					</div>
  				</li>
        @endforeach
			</ul>
      @else
        Nenhuma atividade encontrada.
      @endif
@endsection

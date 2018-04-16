{{-- Chama a template pré pronta --}}
@extends('profile.profile-template')

@section('profileContent')
    @parent
			<?php if ($user->isLoggedProfile){ ?>
			  <form method="post" action="<?php echo URL::route('activity.store'); ?>">
				  <div class="form-group">
					 <textarea name="data" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alguma novidade que deseja compartilhar?"></textarea>
				  </div>

				  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				  <button type="submit" class="btn btn-primary float-right">Publicar</button>
				  <div class="clearfix"></div>
			  </form>
			<?php } ?>
      @if (count($activities) >= 1)
      <div id="activities">
    		@foreach($activities as $activity)
          <div class="activity mt-4 mb-4">
            <div class="activity-header">
              <div class="activity-avatar">
                @if (is_null($user->user->avatar))
                  <img class="mr-3" src="<?php echo asset('assets/images/avatar-default.png');?>" alt="Card image cap">
                @else
                  <img class="mr-3" src="<?php echo asset('uploads/avatars/' . $user->user->avatar);?>" alt="Card image cap">
                @endif
              </div>

              <div class="activity-info">
                <div class="activity-name">{{ $user->user->firstname . " " . $user->user->lastname }}</div>
                <div class="activity-date"><span>{{$activity->created_at}}</span></div>
              </div>

              @if($user->isLoggedProfile)
                <div class="activity-actions">
                  <!-- <a href="#"><i class="fa fa-edit"></i></a> -->
                  <form action="{{URL::route('activity.destroy', ['id' => $activity->id])}}" method="post">
                    <button type="submit"><i class="fa fa-trash"></i></button>
                    <input type="hidden" value="DELETE" name="_method">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  </form>
                </div>
              @endif

              <div class="clearfix">
              </div>
            </div>

  					<div class="activity-body pt-3">
              <?php
              switch($activity->type){
                  case('enter_course'):
                      $activity_data = unserialize($activity->data);
                      echo '<i class="fa fa-star"></i> ' . __('messages.activity.' . $activity->type, ['course' => $activity_data['course_name']]);
                      break;
                  case('favorite_course'):
                      $activity_data = unserialize($activity->data);
                      echo '<i class="fa fa-star"></i> ' . __('messages.activity.' . $activity->type, ['course' => $activity_data['course_name']]);
                      break;
                  case('leave_course'):
                      $activity_data = unserialize($activity->data);
                      echo '<i class="fa fa-star"></i> ' . __('messages.activity.' . $activity->type, ['course' => $activity_data['course_name']]);
                      break;
                  default:
                      echo $activity->data;
              }
              ?>
  					</div>
  				</div>
        @endforeach
			</div>
      @else
        Nenhuma atividade encontrada.
      @endif
@endsection

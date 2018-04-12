{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="container mt-5">
      <div class="row">
        <div class="col-3">
          <div class="profile-avatar">
            <?php if ($user['avatar'] == null){ ?>
            <img src="<?php echo asset('assets/images/avatar-default.png');?>" alt="Card image cap">
            <?php } else { ?>
            <img src="{{ asset('uploads/avatars/' . $user['avatar'])}}" alt="Card image cap">
            <?php }?>
          </div>

          <div class="profile-info">
            <h5 class="profile-name">{{$user['firstname'] . " " . $user['lastname']}}</h5>
            <div class="profile-username">{{"@" . $user->user}}</div>
          </div>

          <div class="profile-social-buttons">
            @auth
              @if(!$isLoggedProfile)
                <button type="button" class="btn"><i class="fa fa-rss"></i></button>
                <button type="button" class="btn"><i class="fa fa-envelope"></i></button>
              @endif
            @endauth
          </div>
        </div>

        <div class="col-9">
          <ul class="nav" id="profile-menu">
            <li class="nav-item active">
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
          <div id="profile-content">
            @section('profileContent')
              @show
          </div>
        </div>
      </div>
    </div>
@endsection

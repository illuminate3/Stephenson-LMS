{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Enviar Mensagem</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Digite sua mensagem..."></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Enviar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5">
      <div class="row">
        <div class="col-3">
          <div class="profile-avatar">
            <?php if (is_null($user->user->avatar)){ ?>
            <img src="<?php echo asset('assets/images/avatar-default.png');?>" alt="Card image cap">
            <?php } else { ?>
            <img src="{{ asset('uploads/avatars/' . $user->user->avatar)}}" alt="Card image cap">
            <?php }?>
          </div>

          <div class="profile-info">
            <h5 class="profile-name">{{$user->user->firstname. " " . $user->user->lastname}}</h5>
            <div class="profile-username">{{"@" . $user->user->user}}</div>
          </div>

          <div class="profile-social-buttons">
            @auth
              @if(!$user->isLoggedProfile)
                <form class="" action="{{URL::route('follow_user', ['user' => $user->user->id])}}" method="post">
                  @if($user->isFollowing)
                    <button type="submit" class="btn active" role="button"><i class="fa fa-rss"></i></button>
                  @else
                    <button type="submit" class="btn" role="button"><i class="fa fa-rss"></i></button>
                  @endif
                  <input type="hidden" name="_token" value="{{ csrf_token()}}">
                </form>

                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope"></i></button>
              @endif
            @endauth
          </div>
        </div>

        <div class="col-9">
          <ul class="nav" id="profile-menu">
            <li class="nav-item {{ request()->is('profile/*') ? 'active' : '' }}">
              <a class="nav-link" href="<?php echo URL::route('profile.profile', ['profile' => $user->user->user]); ?>">Feed</a>
            </li>
            <li class="nav-item {{ request()->is('profile/*/about') ? 'active' : '' }}">
              <a class="nav-link" href="<?php echo URL::route('profile.about', ['profile' => $user->user->user]); ?>">Sobre</a>
            </li>
            <li class="nav-item {{ request()->is('profile/*/following') ? 'active' : '' }}">
              <a class="nav-link" href="<?php echo URL::route('profile.following', ['profile' => $user->user->user]);  ?>">Seguindo</a>
            </li>
            <li class="nav-item {{ request()->is('profile/*/followers') ? 'active' : '' }}">
              <a class="nav-link" href="<?php echo URL::route('profile.followers', ['profile' => $user->user->user]);  ?>">Seguidores</a>
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

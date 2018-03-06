{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
		<?php echo view('profile/sidebar-profile', ['user' => $user, 'isLoggedProfile' => $isLoggedProfile ]); ?>

    <div class="col-10" id="profile-content">
      <h2 class="profile-page-title">Sobre</h2> <hr>
    @if($isLoggedProfile)
      <?php
        if (session('success')){
          if (session('success')['success'] == false){
            echo '<div class="alert alert-danger" role="alert">' . session('success')['messages'] . '</div>';
          } else {
            echo '<div class="alert alert-success" role="alert">' . session('success')['messages'] . '</div>';
          }
        }
      ?>
      <h4 class="pb-3">Foto de Perfil</h4>

      <div class="row mb-4">
        <div class="col-2">
          <?php if ($user['avatar'] == null){ ?>
            <img class="card-img-top" style="max-width:100px"src="<?php echo asset('assets/images/avatar-default.png');?>" alt="Card image cap">
          <?php } else { ?>
            <img class="card-img-top" style="max-width:100px"src="<?php echo asset('uploads/avatars/' . $user['avatar']);?>" alt="Card image cap">
          <?php }?>
        </div>

        <div class="col-9">
          <form action="{{URL::route('profile.update_avatar')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="avatar">
            </div>
            <input type="hidden" value="PUT" name="_method">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            <button class="btn btn-primary">Alterar Foto</button> <a href="#">Remover Foto</a>
          </form>
        </div>
      </div>

      <h4 class="pb-3">Configurações Gerais</h4>

      <form method="post" action="{{URL::route('profile.update_profile')}}">
        <div class="form-group">
          <input type="date" name="born" value="{{$user->born}}">
        </div>

        <div class="form-group">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" name="sex" class="custom-control-input" value="male" id="radio-male" {{ $user->sex == 'male' ? 'checked' : '' }}>
            <label class="custom-control-label" for="radio-male">Masculino</label>
          </div>

          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" name="sex" class="custom-control-input" value="female" id="radio-female" {{$user->sex == 'female' ? 'checked' : '' }}>
            <label class="custom-control-label" for="radio-female">Feminino</label>
          </div>
        </div>
        <?php $locale = unserialize($user->locale) ?>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <input type="text" class="form-control" id="validationTooltip03" placeholder="Cidade" name="city" value="{{$locale['city']}}">
            <div class="invalid-tooltip">Por favor, insira uma cidade válida</div>
          </div>

          <div class="col-md-3 mb-3">
            <input type="text" class="form-control" id="validationTooltip04" placeholder="Estado" name="state" value="{{$locale['state']}}">
            <div class="invalid-tooltip">Por favor, insira um estado válido</div>
          </div>

          <div class="col-md-3 mb-3">
            <input type="text" class="form-control" id="validationTooltip05" placeholder="País" name="country" value="{{$locale['country']}}">
            <div class="invalid-tooltip">Por favor, insira um país válido</div>
          </div>
        </div>
        <input type="hidden" value="PUT" name="_method">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <button class="btn btn-primary" type="submit">Alterar Informações</button>
      </form>

      <a href="#" class="mt-3">Configurações da Conta</a>
    @else
    @if($user->born != null)<b>Nascimento:</b> {{$user->born}}<br>@endif
    @if($user->sex != null)<b>Sexo:</b> {{$user->sex}}<br>@endif

    @if($user->locale != null)
    @php $locale = unserialize($user->locale) @endphp
    <b>Localidade:</b> {{$locale['city']}}, {{$locale['state']}} - {{$locale['country']}}<br>
    @endif

    <b>Entrou em:</b> {{$user->created_at}}<br>
    @endif
    </div>
@endsection

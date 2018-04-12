{{-- Chama a template pré pronta --}}
@extends('admin.templates.template')

@section('viewMain')
    @parent
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Configurações</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Configurações</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->

		<div class="container-fluid">
      <?php
        if (session('success')){
          if (session('success')['success'] == false){
            echo '<div class="alert alert-danger" role="alert">' . session('success')['messages'] . '</div>';
          } else {
            echo '<div class="alert alert-success" role="alert">' . session('success')['messages'] . '</div>';
          }
        }
      ?>

      <form action="{{URL::route('settings.update')}}" method="post">
        <h3>Gerais</h3>

        @foreach($settings as $setting)
        <div class="form-group">
         <label for="txtSlug">{{__('messages.setting.' . $setting->name)}}</label>
         <input type="text" class="form-control" id="txtSlug" placeholder="{{__('messages.setting.' . $setting->name)}}" name="{{$setting->name}}" value="{{$setting->value}}">
        </div>
        @endforeach

        <input type="hidden" value="PUT" name="_method">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="Atualizar" class="btn btn-block btn-primary btn-lg">
      </form>
		</div>
@endsection

{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Erro 404</h1>
      </div>
    </div>

    <div class="container">
    Ops! Parece que a página que você está buscando não existe, foi deletada ou você não tem permissão para acessá-la.
    </div>
@endsection

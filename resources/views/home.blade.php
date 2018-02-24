{{-- Chama a template pré pronta --}}
@extends('template')

@section('viewMain')
    @parent
		<div class="container">
      <div class="mt-5 mb-5" style="text-align:center; width:60%; margin:auto">
			  <h2>Olá, @auth {{Auth::user()->firstname}}! @endauth @guest visitante! @endguest</h2>
        <p>Esta página ainda está sendo construída, mas matenha o sistema atualizado para ver o mais rápido possível quando tivermos acabado. Por enquanto você pode navegar pelas páginas do site que estão no menu.@guest Crie sua conta e faça login para a experiência completa ; )@endguest</p>
		  </div>
		</div>
@endsection

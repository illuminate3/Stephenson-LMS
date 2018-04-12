<!DOCTYPE html>
<html>
<head>
@include('head')
</head>
<body>
    <div id="interface">
      <header>
      @include('header')
      <header>
      <main id="content">
        <!-- DIVISA DE CONTEUDO -->
        @section('viewMain')
            @show
  	 </main>
   </div>
   
   @include('footer')
</body>
</html>

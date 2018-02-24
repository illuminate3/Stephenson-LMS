<!DOCTYPE html>
<html>
<head>
@include('head')
</head>
<body>
    @include('header')
    <div id="content">
        <!-- DIVISA DE CONTEUDO -->
        @section('viewMain')
            @show

    @include('footer')
	 </div>
</body>
</html>

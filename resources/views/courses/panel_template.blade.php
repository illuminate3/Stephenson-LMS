<!DOCTYPE html>
<html>
<head>
@include('head')
</head>
<body>
    @include('header')
      <div id="content">
        @include('courses.panel_header')
            <!-- DIVISA DE CONTEUDO -->
            @section('courseContent')
                @show

        @include('courses.panel_footer')
      </div>
    @include('footer')
</body>
</html>

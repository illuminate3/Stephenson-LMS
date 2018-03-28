<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.templates.head')
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        @include('admin.templates.header')

        <div class="page-wrapper">
          @section('viewMain')
              @show
            <!-- footer -->
            <footer class="footer"> © {{date("Y")}} Todos os direitos reservados. Template disponibilizado por <a href="https://colorlib.com">Colorlib</a></footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>

    @include('admin.templates.footer')
</body>

</html>

<nav class="navbar navbar-expand-lg" id="topnav">
	<div class="container">
		<a class="navbar-brand" href="#">{{config('app.name')}}</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ URL::route('home')}}">Home</a></li>
				<li class="nav-item {{ request()->is('tutorials') ? 'active' : '' }}"><a class="nav-link" href="{{ URL::route('tutorials.all')}}">Tutoriais</a></li>
				<li class="nav-item {{ request()->is('courses') ? 'active' : '' }}"><a class="nav-link" href="{{ URL::route('courses.all')}}">Cursos</a></li>
				<li class="nav-item {{ request()->is('posts') ? 'active' : '' }}"><a class="nav-link" href="{{ URL::route('posts.all')}}">Blog</a></li>
			</ul>

			<form class="form-inline mr-auto search">
				<input class="form-control" type="search" placeholder="Busque por tutoriais, postagens e cursos" aria-label="Search">
			</form>

			<ul class="navbar-nav my-2 my-lg-0">
				@auth
					<li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          {{ Auth::user()->firstname }}
		        </a>
		        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="{{ URL::route('profile.profile', ['user' =>  Auth::user()->user])}}">Ver Perfil</a>
		          <a class="dropdown-item" href="{{ URL::route('courses.user_courses')}}">Meus Cursos</a>
					 		@if (Auth::user()->permission == "app.admin")
		          <a class="dropdown-item" href="{{ URL::route('dashboard.index')}}">Painel</a>
					 		@endif

					 		<div class="dropdown-divider"></div>

		          <a class="dropdown-item" href="{{ URL::route('logout')}}">Sair</a>
		        </div>
		      </li>
				@endauth
				@guest
					<li class="nav-item"><a class="nav-link" href="{{ URL::route('register')}}">Cadastro</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ URL::route('login')}}">Login</a></li>
				@endguest
			</ul>
		</div>
	</div>
</nav>
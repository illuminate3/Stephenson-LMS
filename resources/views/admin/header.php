<!DOCTYPE html>

<html>

<head>
	<title>
		<?php echo $title; ?>
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1" />
	<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo url('css/layout.css'); ?>">
</head>

<body>
	<div id="sidebar">
		<div id="site-logo">S</div>
		<nav id="sidemenu-fixed"></nav>
		<nav id="sidemenu">
			<ul class="left-navigation">
				<li>
					<a href="<?php echo URL::route('dashboard.index');?>">
					 <i class="material-icons">dashboard</i>
					 <span>Dashboard</span>
				 </a>
				</li>

				<li>
					<a href="<?php echo URL::route('categories.index');?>">
					 <i class="material-icons">folder</i>
					 <span>Categorias</span>
				 </a>
				</li>

				<li>
					<a href="<?php echo URL::route('pages.index');?>">
					 <i class="material-icons">insert_drive_file</i>
					 <span>Páginas</span>
				 </a>
				</li>

				<li>
					<a href="<?php echo URL::route('posts.index');?>">
					 <i class="material-icons">edit</i>
					 <span>Postagens</span>
				 </a>
				</li>

				<li>
					<a href="<?php echo URL::route('tutorials.index');?>">
					 <i class="material-icons">video_library</i>
					 <span>Tutoriais</span>
				 </a>
				</li>

				<li>
					<a href="<?php echo URL::route('courses.index');?>">
					 <i class="material-icons">star</i>
					 <span>Cursos</span>
				 </a>
				</li>

				<li>
					<a href="<?php echo URL::route('style.index');?>">
				 	<i class="material-icons">brush</i>
				 	<span>Design</span>
				 </a>
				</li>

				<li>
					<a href="<?php echo URL::route('library.index');?>">
					 <i class="material-icons">library_add</i>
					 <span>Galeria</span>
				 </a>
				</li>

				<li>
					<a href="<?php echo URL::route('users.index');?>">
					 <i class="material-icons">people</i>
					 <span>Usuários</span>
				 </a>
				</li>

				<li>
					<a href="<?php echo URL::route('settings.index');?>">
					 <i class="material-icons">settings</i>
					 <span>Configurações</span>
				 </a>
				</li>

			</ul>
		</nav>
	</div>

	<nav class="navbar navbar-expand-lg navbar-light" id="top-menu">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo URL::route('home');?>">Visitar Site <span class="sr-only">(current)</span></a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="createDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Criar
					   </a>
						<div class="dropdown-menu" aria-labelledby="createDropdown">
							<a class="dropdown-item" href="<?php echo URL::route('pages.create');?>">Página</a>
							<a class="dropdown-item" href="<?php echo URL::route('posts.create');?>">Postagem</a>
							<a class="dropdown-item" href="<?php echo URL::route('tutorials.create');?>">Tutorial</a>
							<a class="dropdown-item" href="<?php echo URL::route('courses.create');?>">Curso</a>
							<a class="dropdown-item" href="<?php echo URL::route('users.create');?>">Usuário</a>
						</div>
					</li>
				</ul>

				<form class="form-inline mr-auto">
					<input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
				</form>

				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo Auth::user()->firstname; ?>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
							<a class="dropdown-item" href="<?php echo URL::route('profile.profile', ['user' => Auth::user()->user]);?>">Ver Perfil</a>
							<a class="dropdown-item" href="<?php echo URL::route('logout');?>">Sair</a>
						</div>
					</li>

				</ul>

			</div>
		</div>
	</nav>
	
	<div id="content">
	<main>

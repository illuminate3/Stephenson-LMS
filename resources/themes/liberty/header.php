<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/main.css">
	<title><?php echo $title; ?></title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
		<a class="navbar-brand" href="#"><?php echo config('app.name'); ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link" href="<?php echo URL::route('home');?>">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo URL::route('tutorials.all');?>">Tutoriais</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo URL::route('courses.all');?>">Cursos</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo URL::route('posts.all');?>">Blog</a></li>
			</ul>
			
			<form class="form-inline mr-auto">
				<input class="form-control mr-sm-2" type="search" placeholder="Busque por tutoriais, postagens e cursos" aria-label="Search">
			</form>
			
			<ul class="navbar-nav my-2 my-lg-0">
				<?php if (Auth::check()) {?>
			<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo Auth::user()->firstname; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo URL::route('profile.profile', ['user' =>  Auth::user()->user]);?>">Ver Perfil</a>
          <a class="dropdown-item" href="<?php echo URL::route('courses.user_courses');?>">Meus Cursos</a>
			 <?php if(Auth::user()->permission == "app.admin") {?>
          <a class="dropdown-item" href="<?php echo URL::route('dashboard.index');?>">Painel</a>
			 <?php } ?>
			 <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo URL::route('logout');?>">Sair</a>
        </div>	
      	</li>
				<?php } else {?>
								<li class="nav-item"><a class="nav-link" href="<?php echo URL::route('register');?>">Cadastro</a></li>
				<li class="nav-item"><a class="nav-link" href="<?php echo URL::route('login');?>">Login</a></li>
				<?php } ?>

			</ul>
			

		</div>
		</div>
	</nav>
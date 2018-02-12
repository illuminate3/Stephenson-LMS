<!DOCTYPE html>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<link rel="stylesheet" href="<?php echo theme_url('css/materialize.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo theme_url('css/material-icons.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo theme_url('css/layout.css')?>">
		<?php if(isset($css)){foreach($css as $css_file){echo Theme::css('css/' . $css_file . ".css"); }} ?>
	</head>

	<body>
		<header class="navbar-fixed">
			<nav class=" teal darken-3">
				<div class="container">
					<div class="nav-wrapper">
						<a class="brand-logo dropdown-button" href="#!"><?php echo config('app.name'); ?></a>
						
						<ul class="left hide-on-med-and-down">
							<li><a href="<?php echo URL::route('home');?>">Home</a></li>
							<li><a href="<?php echo URL::route('tutorials.all');?>">Tutoriais</a></li>
							<li><a href="<?php echo URL::route('courses.all');?>">Cursos</a></li>
							<li><a href="<?php echo URL::route('posts.all');?>">Blog</a></li>
						</ul>
						
						<ul class="right hide-on-med-and-down">
							<?php if (Auth::check()) {?>
								<li><a href="<?php echo URL::route('chat');?>"><i class="material-icons">chat</i></a></li>
								<li><a class="dropdown-button" href="#!" data-activates="user-menu" ><i class="material-icons left">person</i> <?php echo Auth::user()->firstname;?> <i class="material-icons right">more_vert</i></a></li>
							<?php } else {?>
								<li><a class="waves-effect waves-light btn" href="<?php echo URL::route('login');?>"><i class="material-icons left">person</i>ENTRAR</a></li>
							<?php } ?>
						</ul>
						<?php if (Auth::check()) {?>
						<ul id="user-menu" class="dropdown-content">
							<li><a href="<?php echo URL::route('profile.profile',['user' =>  Auth::user()->user]);?>">Ver Perfil</a></li>
							<li><a href="<?php echo URL::route('courses.user_courses');?>">Meus Cursos</a></li>
							<?php if(Auth::user()->permission == "app.admin") {?>
							<li><a href="<?php echo URL::route('dashboard.index');?>">Painel</a></li>
							<?php } ?>
							<li><a href="<?php echo URL::route('logout');?>">Sair</a></li>
						</ul>
						<?php } ?>
					</div>
				</div>
			</nav>
		</header>
		
		
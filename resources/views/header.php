<!DOCTYPE html>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<link rel="stylesheet" href="<?php echo url('css/materialize.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo url('css/material-icons.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo url('css/layout.css'); ?>">
	</head>

	<body>
		<header class="navbar-fixed">
			<nav class=" teal darken-3">
				<div class="container">
					<div class="nav-wrapper">
						<a class="brand-logo dropdown-button" href="#!" data-activates="channels-menu">Escola LTG <i class="material-icons right">more_vert</i></a>
						
						<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
						
						<ul id="channels-menu" class="dropdown-content">
							<li><a href="#">Áudio</a></li>
							<li><a href="#">Escritório</a></li>
							<li><a href="#">Imagem</a></li>
							<li><a href="#">Marketing</a></li>
							<li><a href="#">Programação</a></li>
							<li><a href="#">Vídeo</a></li>
						</ul>
						
						<ul class="left hide-on-med-and-down">
							<li><a href="<?php echo URL::to('/'); ?>">Home</a></li>
							<li><a href="<?php echo URL::to('/tutoriais'); ?>">Tutoriais</a></li>
							<li><a href="#">Cursos</a></li>
							<li><a href="#">Fórum</a></li>
							<li><a href="#">Blog</a></li>
						</ul>
						
						<ul class="right hide-on-med-and-down">
							<?php if (Auth::check()) {?>
								<li><a  class="dropdown-button" href="#!" data-activates="user-menu" ><i class="material-icons left">person</i> <?php echo Auth::user()->firstname;?> <i class="material-icons right">more_vert</i></a></li>
								<li><a href="<?php echo URL::to('/chat'); ?>" ><i class="material-icons">message</i></a></li>
							<?php } else {?>
								<li><a class="waves-effect waves-light btn" href="<?php echo URL::to('/login'); ?>"><i class="material-icons left">person</i>ENTRAR</a></li>
							<?php } ?>
						</ul>
						<?php if (Auth::check()) {?>
						<ul id="user-menu" class="dropdown-content">
							<li><a href="<?php echo URL::to('/perfil', ['user' =>  Auth::user()->user]); ?>">Ver Perfil</a></li>
							<?php if(Auth::user()->permission == "app.admin") {?>
							<li><a href="<?php echo URL::to('/admin'); ?>">Painel</a></li>
							<?php } ?>
							<li><a href="<?php echo URL::to('/logout'); ?>">Sair</a></li>
						</ul>
						<?php } ?>
						
						<ul id="slide-out" class="side-nav">
							<?php if (Auth::check()) {?>
								<li>
									<div class="user-view">
										<div class="background">
											<img src="http://hgdecorvietnam.com/wp-content/uploads/2014/09/sdfggj.jpg">
										</div>

										<a href="#!user"><img class="circle" src="images/depoimento/user1.png"></a>
										<a href="<?php echo URL::to('/perfil'); ?>"><span class="white-text name"><?php echo Auth::user()->firstname . " " . Auth::user()->lastname;?></span></a>
										<a href="#!email"><span class="white-text email"><?php echo Auth::user()->email ?></span></a>
									</div>
								</li>
								<li><a href="<?php echo URL::to('/'); ?>">Home</a></li>
								<li><a href="#">Tutoriais</a></li>
								<li><a href="#">Cursos</a></li>
								<li><a href="#">Fórum</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="<?php echo URL::to('/perfil', ['user' =>  Auth::user()->user]); ?>"><i class="material-icons">person</i>Ver Perfil</a></li>
								<li><a href="<?php echo URL::to('/chat'); ?>"><i class="material-icons">messages</i>Mensagens</a></li>
								<?php if(Auth::user()->permission == "app.admin") {?>
								<li><a href="<?php echo URL::to('/admin'); ?>">Painel</a></li>
								<?php } ?>
								<li><a href="#?logout=true"><i class="material-icons">exit_to_app</i>Sair</a></li>
							<?php } else {?>
								<li><a class="waves-effect waves-light btn" href="<?php echo URL::to('/login'); ?>"><i class="material-icons left">person</i>ENTRAR</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		
		
<?php $logado = true ; ?>

<!DOCTYPE html>

<html>
	<head>
		<title>Escola LTG - Estudar não precisa ser chato</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<link rel="stylesheet" href="../css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="../css/admin/layout.css">
		<link rel="stylesheet" type="text/css" href="../css/admin/material-icons.css">
	</head>

	<body>
		<div id="navbar">
			<div id="logo">Escola LTG</div>
			
			<div id="side-menu">
				<ul>
					<li><a href="<?php echo URL::to('/admin/dashboard'); ?>"><i class="material-icons left">dashboard</i>Dashboard</a></li>
					<li><a href="<?php echo URL::to('/admin/dashboard'); ?>"><i class="material-icons left">folder</i>Categorias</a></li>
					<li><a href="<?php echo URL::to('/admin/dashboard'); ?>"><i class="material-icons left">edit</i>Postagens</a></li>
					<li><a href="<?php echo URL::to('/admin/dashboard'); ?>"><i class="material-icons left">video_library</i>Tutoriais</a></li>
					<li><a href="<?php echo URL::to('/admin/dashboard'); ?>"><i class="material-icons left">grade</i>Cursos</a></li>
					<li><a href="<?php echo URL::to('/admin/dashboard'); ?>"><i class="material-icons left">group</i>Usuários</a></li>
					<li><a href="<?php echo URL::to('/admin/dashboard'); ?>"><i class="material-icons left">photo_library</i>Mídia</a></li>
				</ul>
			</div>
		</div>
		
		<div id="content">
			<nav class=" cyan darken-3">
				<div class="container">
				<div class="nav-wrapper">
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					
					<ul class="right hide-on-med-and-down">
						<li><a href="<?php echo URL::to('/'); ?>">Visitar Site</a></li>

					</ul>
					
					<ul class="side-nav" id="mobile-demo">
						<li><a href="sass.html">Sass</a></li>
						<li><a href="badges.html">Components</a></li>
						<li><a href="collapsible.html">Javascript</a></li>
						<li><a href="mobile.html">Mobile</a></li>
					</ul>
				</div>
				</div>
			</nav>
		</div>
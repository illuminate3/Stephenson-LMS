<?php 
$logado = false ; 

if($logado == true){
	echo redirect()->route('dashboard.login');
}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Escola LTG - Estudar não precisa ser chato</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<link rel="stylesheet" href="<?php echo url('../css/materialize.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo url('../css/admin/layout.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo url('../css/admin/material-icons.css'); ?>">
	</head>

	<body>
		<div id="navbar">
			<div id="logo">Escola LTG</div>
			
			<div id="side-menu">
				<ul>
					<li><a href="<?php echo URL::to('/admin'); ?>"><i class="material-icons left">dashboard</i>Dashboard</a></li>
					
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">folder</i>Categorias</a>
						
						<ul class="submenu">
							<li><a href="<?php echo URL::to('/admin'); ?>">Ver Categorias</a></li>
							<li><a href="<?php echo URL::to('/admin'); ?>">Adicionar Categoria</a></li>
						</ul>
					</li>
					
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">edit</i>Postagens</a>
						
						<ul class="submenu">
							<li><a href="<?php echo URL::to('/admin'); ?>">Ver Postagens</a></li>
							<li><a href="<?php echo URL::to('/admin'); ?>">Adicionar Postagem</a></li>
						</ul>	
					</li>
					
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">video_library</i>Tutoriais</a>
						
						<ul class="submenu">
							<li><a href="<?php echo URL::to('/admin'); ?>">Ver Tutoriais</a></li>
							<li><a href="<?php echo URL::to('/admin'); ?>">Adicionar Tutorial</a></li>
						</ul>	
					</li>
					
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">grade</i>Cursos</a>
						
						<ul class="submenu">
							<li><a href="<?php echo URL::to('/admin'); ?>">Ver Cursos</a></li>
							<li><a href="<?php echo URL::to('/admin'); ?>">Adicionar Curso</a></li>
						</ul>	
					</li>
					
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">group</i>Usuários</a>
						
						<ul class="submenu">
							<li><a href="<?php echo URL::to('/admin/users'); ?>">Ver Usuários</a></li>
							<li><a href="<?php echo URL::to('/admin/users/add'); ?>">Adicionar Usuário</a></li>
						</ul>	
					</li>
					
					<li><a href="<?php echo URL::to('/admin'); ?>"><i class="material-icons left">photo_library</i>Mídia</a></li>
				</ul>
			</div>
		</div>
		
		
		<nav class="cyan darken-3" id="topbar">
			<div class="container">
				<div class="nav-wrapper">
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

					<ul class="right hide-on-med-and-down">
						<li><a  class="dropdown-button" href="#!" data-activates="user-menu" ><i class="material-icons left">person</i> <?php echo Auth::user()->firstname;?> <i class="material-icons right">more_vert</i></a></li>
						<li><a href="<?php echo URL::to('/'); ?>">Visitar Site</a></li>
					</ul>
					
					<ul id="user-menu" class="dropdown-content">
						<li><a href="<?php echo URL::to('/perfil'); ?>">Ver Perfil</a></li>
						<li><a href="<?php echo URL::to('/logout'); ?>">Sair</a></li>
					</ul>
					
					<ul class="side-nav" id="mobile-demo">
						<li><a href="<?php echo URL::to('/perfil'); ?>">Ver Perfil</a></li>
						<li><a href="<?php echo URL::to('/logout'); ?>">Sair</a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div id="content">

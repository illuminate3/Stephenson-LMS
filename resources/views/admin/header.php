<!DOCTYPE html>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<meta name="csrf-token" content="<?php echo csrf_token(); ?>">
		<link rel="stylesheet" href="<?php echo url('../css/materialize.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo url('../css/admin/layout.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo url('../css/admin/material-icons.css'); ?>">
	</head>

	<body>
		<div id="navbar">
			<div id="navbar-header">
				<a href="#" class="button-expand"><i class="material-icons">toc</i></a>
				<div id="logo">Escola LTG</div>
			</div>
			
			<div id="side-menu">
				<ul>
					<li><a href="<?php echo route('dashboard.index'); ?>"><i class="material-icons left">dashboard</i><?php echo __('messages.dashboard'); ?></a></li>
					<li><a href="<?php echo route('categories.index'); ?>"><i class="material-icons left">folder</i><?php echo __('messages.categories'); ?></a></li>
					
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">insert_drive_file</i><?php echo __('messages.pages'); ?></a>
						
						<ul class="submenu">
							<li><a href="<?php echo route('pages.index'); ?>"><?php echo __('messages.view_pages'); ?></a></li>
							<li><a href="<?php echo route('pages.create'); ?>"><?php echo __('messages.create_page'); ?></a></li>
						</ul>	
					</li>

					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">edit</i><?php echo __('messages.posts'); ?></a>
						
						<ul class="submenu">
							<li><a href="<?php echo route('posts.index'); ?>"><?php echo __('messages.view_posts'); ?></a></li>
							<li><a href="<?php echo route('posts.create'); ?>"><?php echo __('messages.create_post'); ?></a></li>
						</ul>	
					</li>
					
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">video_library</i><?php echo __('messages.tutorials'); ?></a>
						
						<ul class="submenu">
							<li><a href="<?php echo route('tutorials.index'); ?>"><?php echo __('messages.view_tutorials'); ?></a></li>
							<li><a href="<?php echo route('tutorials.create'); ?>"><?php echo __('messages.create_tutorial'); ?></a></li>
						</ul>	
					</li>
					
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">grade</i><?php echo __('messages.courses'); ?></a>
						
						<ul class="submenu">
							<li><a href="<?php echo route('courses.index'); ?>"><?php echo __('messages.view_courses'); ?></a></li>
							<li><a href="<?php echo route('courses.create'); ?>"><?php echo __('messages.create_course'); ?></a></li>
						</ul>	
					</li>
					
					<!--
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">forum</i>Fórum</a>
						
						<ul class="submenu">
							<li><a href="#">Fóruns</a></li>
							<li><a href="#">Tópicos</a></li>
						</ul>	
					</li>
					-->
					
					<li class="dropdown-menu-item">
						<a href="#"><i class="material-icons left">group</i><?php echo __('messages.users'); ?></a>
						
						<ul class="submenu">
							<li><a href="<?php echo route('users.index'); ?>"><?php echo __('messages.view_users'); ?></a></li>
							<li><a href="<?php echo route('users.create'); ?>"><?php echo __('messages.create_user'); ?></a></li>
						</ul>	
					</li>
					
					<li><a href="<?php echo URL::to('/admin/library'); ?>"><i class="material-icons left">photo_library</i><?php echo __('messages.library'); ?></a></li>
					<li><a href="<?php echo URL::to('/admin/settings'); ?>"><i class="material-icons left">settings</i><?php echo __('messages.settings'); ?></a></li>
				</ul>
			</div>
		</div>
		
		
		<nav class="cyan darken-3" id="topbar">
			<div class="container">
				<div class="nav-wrapper">
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

					<ul class="right hide-on-med-and-down">
						<li><a class="dropdown-button" href="#!" data-activates="user-menu" ><i class="material-icons left">person</i> <?php echo Auth::user()->firstname;?> <i class="material-icons right">more_vert</i></a></li>
						<li><a href="<?php echo URL::to('/'); ?>"><?php echo __('messages.visit_site'); ?></a></li>
					</ul>
					
					<ul id="user-menu" class="dropdown-content">
						<li><a href="<?php echo URL::to('/perfil', ['user' =>  Auth::user()->user]); ?>"><?php echo __('messages.view_profile'); ?></a></li>
						<li><a href="<?php echo URL::to('/logout'); ?>"><?php echo __('messages.logout'); ?></a></li>
					</ul>
					
					<ul class="side-nav" id="mobile-demo">
						<li><a href="<?php echo URL::to('/perfil', ['user' =>  Auth::user()->user]); ?>">Ver Perfil</a></li>
						<li><a href="<?php echo URL::to('/logout'); ?>"><?php echo __('messages.logout'); ?></a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div id="content">

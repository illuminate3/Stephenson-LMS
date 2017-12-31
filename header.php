<?php $logado = true ; ?>

<!DOCTYPE html>

<html>
	<head>
		<title>Escola LTG - Estudar não precisa ser chato</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<link rel="stylesheet" href="css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="css/layout.css">
	</head>

	<body>
		<header class="navbar-fixed">
			<nav class=" teal darken-3">
				<div class="container">
					<!-- Dropdown Structure -->
					<ul id="dropdown1" class="dropdown-content">

					</ul>
									
					<div class="nav-wrapper">
						<a href="index.php" class="brand-logo">Escola LTG</a>
						<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

						<ul id="user-menu" class="dropdown-content">
							<li><a href="perfil.php">Ver Perfil</a></li>
							<li><a href="?logout=true">Sair</a></li>
						</ul>
						
						<ul class="right hide-on-med-and-down">
							<?php if($logado){?>
								<li><a  class="dropdown-button" href="#!" data-activates="user-menu"><i class="material-icons left">person</i> Luan <i class="material-icons right">more_vert</i></a></li>
							<?php } else {?>
								<li><a class="waves-effect waves-light btn" href="login.php"><i class="material-icons left">person</i>ENTRAR</a></li>
							<?php } ?>
						</ul>

						<ul class="side-nav" id="mobile-demo">
							<?php if($logado){?>
								<li><a href="perfil.php">Ver Perfil</a></li>
								<li><a href="?logout=true">Sair</a></li>
							<?php } else {?>
								<li><a class="waves-effect waves-light btn" href="login.php"><i class="material-icons left">person</i>ENTRAR</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<div id="header-break"></div>
		
		
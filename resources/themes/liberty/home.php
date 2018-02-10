<!DOCTYPE html>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<link rel="stylesheet" href="<?php echo theme_url('css/materialize.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo theme_url('css/material-icons.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo theme_url('css/layout.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo theme_url('css/home.css')?>">
	</head>

	<body>
		<header id="home-header">
			<nav id="transparent-nav">
				<div class="container">
					<div class="nav-wrapper">
					<div class="nav-wrapper">
						<a class="brand-logo dropdown-button" href="#!" data-activates="channels-menu">Escola LTG <i class="material-icons right">more_vert</i></a>
						
						<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
						
						<ul id="channels-menu" class="dropdown-content">
							<?php foreach($categories as $category){ 
								echo '<li><a href="' . URL::route('user.category', ['slug' => $category->slug]) . '">' . $category->name . '</a></li>';
							} ?>
						</ul>
						
						<ul class="left hide-on-med-and-down">
							<li><a href="<?php echo URL::to('/'); ?>">Home</a></li>
							<li><a href="<?php echo URL::to('/tutoriais'); ?>">Tutoriais</a></li>
							<li><a href="<?php echo URL::to('/cursos'); ?>">Cursos</a></li>
							<li><a href="<?php echo URL::to('/blog'); ?>">Blog</a></li>
						</ul>
						
						<ul class="right hide-on-med-and-down">
							<?php if (Auth::check()) {?>
								<li><a href="<?php echo URL::route('chat');?>"><i class="material-icons">chat</i></a></li>
								<li><a  class="dropdown-button" href="#!" data-activates="user-menu" ><i class="material-icons left">person</i> <?php echo Auth::user()->firstname;?> <i class="material-icons right">more_vert</i></a></li>
							<?php } else {?>
								<li><a class="waves-effect waves-light btn" href="<?php echo URL::to('/login'); ?>"><i class="material-icons left">person</i>ENTRAR</a></li>
							<?php } ?>
						</ul>
						<?php if (Auth::check()) {?>
						<ul id="user-menu" class="dropdown-content">
							<li><a href="<?php echo URL::to('/perfil', ['user' =>  Auth::user()->user]); ?>">Ver Perfil</a></li>
							<li><a href="<?php echo URL::to('/meus-cursos'); ?>">Meus Cursos</a></li>
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
								<li><a href="<?php echo URL::to('/tutoriais'); ?>">Tutoriais</a></li>
								<li><a href="<?php echo URL::to('/cursos'); ?>">Cursos</a></li>
								<li><a href="<?php echo URL::to('/blog'); ?>">Blog</a></li>
								<li><a href="<?php echo URL::to('/perfil', ['user' =>  Auth::user()->user]); ?>"><i class="material-icons">person</i>Ver Perfil</a></li>
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
				</div>
			</nav>

			<hgroup id="welcome-text">
				<div class="container">
					<h2>Estudar não precisa ser chato</h2>
					<h3>Estude de maneira descomplicada e interativa</h3>
				</div>
			</hgroup>
		</header>

		<div class="benefits">
			<div class="container">  
				<div class="row">  
					<div class="col s12 m6 l3">
						<div class="card benefit">
							<img src="<?php echo theme_url('images/004-piggy-bank.png'); ?>" class="benefit-icon">
							<h3>Gratuito</h3>
							<p>Tenha acesso a todos os vídeos e materiais sem pagar nada</p>
						</div>
					</div>

					<div class="col s12 m6 l3">
						<div class="card benefit">
							<img src="<?php echo theme_url('images/003-hd-square-symbol.png'); ?>" class="benefit-icon">
							<h3>Qualidade</h3>
							<p>Vídeos com qualidade de imagem, áudio, e didática</p>
						</div>
					</div>

					<div class="col s12 m6 l3">
						<div class="card benefit">
							<img src="<?php echo theme_url('images/002-browser.png'); ?>" class="benefit-icon"> 
							<h3>Interativo</h3>
							<p>Ferramentas que lhe ajudam no aprendizado</p>
						</div>
					</div>

					<div class="col s12 m6 l3">
						<div class="card benefit">
							<img src="<?php echo theme_url('images/001-share.png'); ?>" class="benefit-icon">
							<h3>Social</h3>
							<p>Tire suas dúvidas no fórum e crie grupos de estudo</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<main>
			<div id="how-works" class="section">
				<div class="container">
					<div class="row">  
						<div class="col l5">
							<h2  class="section-title">Como funciona?</h2>
							<p>A maioria dos tutoriais ou cursos gratuitos publicados na internet são feitos de maneira amadora, sem qualidade de vídeo, áudio e didática. Sem contar que não existe material de apoio, o que dificulta muito a aprendizagem. Nós viemos para mudar isso, somos uma plataforma independente, sem fins lucrativos e que tem como único objetivo transmitir conhecimento de qualidade, grauito e de fácil entendimento. Descubra mais sobre o projeto assisitindo ao vídeo ao lado.</p>
						</div>

						<div class="col l6 offset-l1">
							<div id="introVid4" class="video-container video">
								<div id="videoContainer" style="display:none">
									<iframe width="560" height="315" src="https://www.youtube.com/embed/7CdrIgEhqPM" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="our-courses" class="section">
				<div class="container">
					<h2 class="section-title">Nossos Cursos</h2>
					
					<div class="row">
						<?php $course_limit = 0;foreach($courses as $course) { if(++$course_limit > 4) break; ?>
							<div class="col l3 m6 s12">
								<div class="card">
									<div class="card-image">
										<img src="<?php echo $course['cover'] ?>">
									</div>

									<div class="card-content">
										<span class="card-title activator grey-text text-darken-4"><?php echo $course['title'] ?></span>
									</div>

									<div class="card-reveal">
										<span class="card-title grey-text text-darken-4"><?php echo $course['title'] ?></span>
										<p><?php echo $course['resume'] ?></p>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>

			<div id="who-use" class="section">
				<div class="container">
					<h2 class="section-title">Quem usa, aprova!</h2>
					
					<ul id="depoiments">
						<li class="depoiment row">
							<div class="people-info col s4">
								<div class="row">
									<div class="col s4">
										<div class="people-avatar">
											<img src="<?php echo theme_url('images/depoimento/luiz_orlovas.png'); ?>" class="people-avatar-img">
										</div>
									</div>

									<div class="col s8">
										<div class="people-name">Luiz C. Orlovas</div>
										<div class="people-city"><i class="material-icons">location_on</i> Santo André - SP</div>
									</div>
								</div>
							</div>

							<div class="depoiment-text col s8">
								<p>Quero enaltecer esse esse canal, bem como o professor Luan, que é uma grande honra ter usufruído de seus conhecimentos, pois são poucos, e falo isso por experiência de autodidata, que tem o talento de ensinar objetivamente, de maneira clara e precisa, que alcança todos os níveis de educandos. Seus tutorias são, uns dos melhores do Brasil.
								Por mais pessoas altruístas assim, que nosso país precisa.Sejam todos bem vindos a esse canal de aprendizado!</p>
							</div>
						</li>

						<li class="depoiment row">
							<div class="people-info col s4">
								<div class="row">
									<div class="col s4">
										<div class="people-avatar">
											<img src="<?php echo theme_url('images/depoimento/willian.png'); ?>" class="people-avatar-img">
										</div>
									</div>

									<div class="col s8">
										<div class="people-name">Willian Fagundes</div>
										<div class="people-city"><i class="material-icons">location_on</i> Vanini - RS</div>
									</div>
								</div>
							</div>

							<div class="depoiment-text col s8">
								<p>Tudo se iniciou no canal Tonin Tutoriais... O pouco que sei editar imagens ou videos aprendi no seu canal, além de aprender bastante sobre Facebook. Agora com o canal Escola LTG eu tenho certeza que você vai ensinar muitas pessoas, inclusive eu hehehe. Tenho muita esperança no seu canal, e o site irá ajudar muito no no aprendizado dos seus alunos! Logo você irá ter muitos inscritos e será usado como exemplo para motivar outros youtubers pequenos.</p>
							</div>
						</li>

						<li class="depoiment row">
							<div class="people-info col s4">
								<div class="row">
									<div class="col s4">
										<div class="people-avatar">
											<img src="<?php echo theme_url('images/depoimento/lazaro.jpg'); ?>" class="people-avatar-img">
										</div>
									</div>

									<div class="col s8">
										<div class="people-name">Luiz Lázaro</div>
										<div class="people-city"><i class="material-icons">location_on</i> Nova Iguaçu - RJ</div>
									</div>
								</div>
							</div>

							<div class="depoiment-text col s8">
								<p>Aulas incríveis, com grandíssima qualidade e conteúdo inigualável! Mais que um projeto, a escola LTG é um movimento que promove em nós uma incessante onda de vontade pela busca de mais conhecimento. Muito obrigado!</p>
							</div>
						</li>

						<li class="depoiment row">
							<div class="people-info col s4">
								<div class="row">
									<div class="col s4">
										<div class="people-avatar">
											<img src="<?php echo theme_url('images/depoimento/user1.png'); ?>" class="people-avatar-img">
										</div>
									</div>

									<div class="col s8">
										<div class="people-name">Malaquias</div>
										<div class="people-city"><i class="material-icons">location_on</i> Unkown City</div>
									</div>
								</div>
							</div>

							<div class="depoiment-text col s8">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pretium consequat nunc vel laoreet. Quisque egestas eleifend tortor at ornare. Praesent nec semper risus. Vestibulum pharetra sagittis leo in rhoncus. Nullam consectetur dui mauris. Aliquam non semper enim. In hac habitasse platea dictumst. eu egestas.</p>
							</div>
						</li>
					</ul>

					<div id="depoiments-slider"></div>
				</div>
			</div>

			<div id="statistcs">
				<div class="container">
					<div class="row">
						<div class="col s3 statistc"><div class="number"><?php echo count($tutorials) + count($lessons); ?></div> vídeos produzidos</div>
						<div class="col s3 statistc"><div class="number"><?php echo count($courses); ?></div> cursos produzidos</div>
						<div class="col s3 statistc"><div class="number">0hs</div> de aula</div>
						<div class="col s3 statistc"><div class="number"><?php echo count($users); ?></div> alunos</div>
					</div>
				</div>
			</div>
		</main>


		<footer class="page-footer  teal darken-2">
			<div class="container">
				<div class="row">
					<div class="col l5 s12">
						<h5 class="white-text">Assinar Feed</h5>
						<p>Ao assinar o feed, você receberá em seu e-mail todas as nossas novas aulas.</p>
						
						<div class="assinar-feed">
							<form>
								<div class="row">
									<div class="col s9"><input type="text" placeholder="Seu e-mail"></div>
									<div class="col s3"><button class="btn">ASSINAR</button></div>
								</div>
							</form>
						</div>
					</div>

					<div class="col l3 offset-l1 s12">
						<h5 class="white-text">Link Úteis</h5>

						<ul>
							<li><a class="grey-text text-lighten-3" href="<?php echo URL::to('/contato'); ?>">Contato</a></li>
							<li><a class="grey-text text-lighten-3" href="<?php echo URL::to('/anunciar'); ?>">Anunciar</a></li>
							<li><a class="grey-text text-lighten-3" href="<?php echo URL::to('/termos-de-uso'); ?>">Termos de Uso</a></li>
							<li><a class="grey-text text-lighten-3" href="<?php echo URL::to('/quero-postar-aulas'); ?>">Quero Postar Aulas</a></li>
						</ul>
					</div>

					<div class="col l3 s12">
						<h5 class="white-text">Redes Sociais</h5>

						<ul>
							<li><a target="_black" class="grey-text text-lighten-3" href="https://www.youtube.com/escolaltg/">YouTube</a></li>
							<li><a target="_black" class="grey-text text-lighten-3" href="https://www.facebook.com/escolaltg">Facebook</a></li>
							<li><a target="_black" class="grey-text text-lighten-3" href="https://twitter.com/escolaltg">Twitter</a></li>
							<li><a target="_black" class="grey-text text-lighten-3" href="https://www.instagram.com/escolaltg/">Instagram</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="footer-copyright  teal darken-3">
				<div class="container">
					&copy; Todos os direitos reservados a Escola LTG - 2018 | 2018 
				</div>
			</div>
		</footer>

		<script type="text/javascript" src="<?php echo theme_url('js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo theme_url('js/materialize.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo theme_url('js/script.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo theme_url('js/cycle.js'); ?>"></script>
		
		<script>
			$('#depoiments').cycle({ 
				fx:    'scrollLeft', 
				delay: -1000,
				timeout: 0, 
				pager:  '#depoiments-slider', 
				pagerAnchorBuilder: function(idx, slide) { 
					return '<a href="#"><div>' + jQuery(slide).children("h3").eq(0).text() + '</div></a>'; 
				} 
			});
		</script>
	</body>
</html>
<?php echo view('header', ['title' => $title, 'css' => ['home']]); ?>
			<hgroup id="welcome-text">
				<div class="container">
					<h2>Estudar não precisa ser chato</h2>
					<h3>Estude de maneira descomplicada e interativa</h3>
				</div>
			</hgroup>

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

<script type="text/javascript" src="<?php echo theme_url('js/cycle.js'); ?>"></script>

<?php echo view('footer', ['js' => ['cycle', 'home']]);?>
<!DOCTYPE html>
<html>
<head>
@include('head')
</head>
<body>
	<?php
		if (session('success')){
			echo '<script>alert("' . session('success')['messages'] . '");</script>';
		}
	?>
	<header {{ Route::current()->getName() == 'home' ? 'class=home-header' : null }}>
		@include('header')
		<div class="v-header container">
    <div class="fullscreen-video-wrap">
      <video src="{{asset('assets/css/header-bg.mp4')}}" autoplay="true" loop muted>
    </video>
    </div>
    <div class="header-overlay"></div>
    <div class="header-content">
      <h1>Stephenson LMS</h1>
      <h2>Plataforma de Grenciamento Educacional Open Source</h2>
      <a class="btn">Conheça o Projeto</a>
    </div>
    </div>
  </header>

	<section>
		<div class="container pt-5 pb-5">
			<h3>Sobre</h3>
			<hr>
			<p>O Stephenson LMS é um sistema para gerenciamento educacional de código aberto. Ele ainda está sendo desevolvido, porém através desse site você tem a oportunidade de testa-lo antes do lançamento da primeira beta oficial.</p>

			<p>Nosso objetivo com esse projeto é fornecer uma ferramenta melhor das que existem hoje, para isso, antes de iniciar o desenvolvimento da plataforma foram analisadas muitas outras, tanto abertas quanto pagas. Com isso foi possível ver o melhor e o pior de cada uma. Várias coisas super legais foram descobertas, além de problemas muito comuns que prejudicam a experiência do estudante e fazem o mesmo abandonar seus estudos. Após isso formulamos um plano para oferecer uma plataforma que mesclasse tudo de positivo, corrigisse problemas comuns e fornecesse novas soluções.</p>

			<p>Nossa versão final será baseada nos seguintes quesitos:</p>
			<ul>
				<li>Usabilidade</li>
				<li>Sociabilidade</li>
				<li>Interatividade</li>
				<li>Comunicação entre aluno/tutor</li>
				<li>Design</li>
				<li>Configuração</li>
			</ul>

			<p>Toda ajuda é bem vinda, seja com um feedback que você pode dar a qualquer momento clicando no botão flutuante localizado no canto inferior direito da tela ou até mesmo ajudando diretamento no desenvolvimento. Caso seja programador, designer ou tradutor e queira ajudar entre em contato pelo formulário abaixo.</p>
		</div>
	</section>

	<section id="contact-section">
		<div class="container pt-5 pb-5">
			<h3>Contato</h3>
			<hr>

			<form action="{{URL::route('send_email')}}" method="post">
				<div class="form-group">
					<label for="inputName">Nome Completo</label>
					<input type="text" class="form-control" id="inputName" placeholder="Nome Completo" name="name">
				</div>

			  <div class="form-group">
			    <label for="inputAddress">E-mail</label>
			    <input type="email" class="form-control" id="inputEmail" placeholder="E-mail" name="email">
			  </div>

				<div class="form-group">
					<label class="my-1 mr-2" for="slcSubject">Assunto</label>
					<select class="custom-select my-1 mr-sm-2" id="slcSubject" name="subject">
						<option selected>Selecione um assunto...</option>
						<option value="1">Quero Ajudar</option>
						<option value="2">Informações adicionais</option>
						<option value="3">Outro</option>
					</select>
				</div>

				<div class="form-group">
			    <label for="txtMessage">Mensagem</label>
			    <textarea class="form-control" id="txtMessage" rows="3" name="message"></textarea>
			  </div>

				<div class="form-group pt-3 pb-3">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="newsCheck" name="news">
						<label class="form-check-label" for="newsCheck">
							Quero receber novidades a respeito da plataforma em meu e-mail.
						</label>
					</div>
				</div>
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			  <button type="submit" class="btn btn-block">Enviar</button>
			</form>
		</div>
	</section>
	@include('footer')
  </body>
</html>

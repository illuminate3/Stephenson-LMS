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
<div class="container mt-5 mb-5 text-center">
      <h1>Stephenson LMS</h1>
      <h2>Plataforma de Grenciamento Educacional Open Source</h2>
</div>
  </header>

	<section>
		<div class="container pt-5 pb-5 text-justify">
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
		</div>
	</section>

	@include('footer')
  </body>
</html>

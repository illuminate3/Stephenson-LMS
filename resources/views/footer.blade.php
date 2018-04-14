		<footer>
			<div class="container">
				<div class="row footer-content">
					<div class="col-lg-5 col-12 col-sm-12 footer-widget feed-subscribe">
						<h4>Feed RSS</h4>
						<p>Assine nosso feed para receber em primeira mão no seu e-mail todos os novos tutoriais, cursos, postagens e promoções.</p>
						<form class="" action="#" method="post">
							<input type="email" name="" placeholder="Digite seu e-mail">
							<button type="submit" name="button">Assinar</button>
						</form>
					</div>

					<div class="col-lg-3 offset-lg-1 col-12 col-sm-6 footer-widget">
						<h4>Links Úteis</h4>
						<ul>
							<li> <a href="{{URL::to('/sobre')}}">Sobre</a></li>
							<li> <a href="{{URL::to('/contato')}}">Contato</a></li>
							<li> <a href="{{URL::to('/anunciar')}}">Anunciar</a></li>
							<li> <a href="{{URL::to('/termos-de-uso')}}">Termos de Uso</a></li>
						</ul>
					</div>

					<div class="col-lg-3 col-12 col-sm-6 footer-widget">
						<h4>Redes Sociais</h4>
						<ul>
							<li> <a href="http://facebook.com/escolaltg" target="_blank"><i class="fab fa-facebook-square"></i> Facebook</a></li>
							<li> <a href="http://twitter.com/escolaltg" target="_blank"><i class="fab fa-twitter-square"></i> Twitter</a></li>
							<li> <a href="http://youtube.com/escolaltg" target="_blank"><i class="fab fa-youtube-square"></i> YouTube</a></li>
							<li> <a href="http://github.com/escolaltg" target="_blank"><i class="fab fa-github-square"></i> GitHub</a></li>
						</ul>
					</div>
					</div>
				</div>

				<div class="footer-credits mt-3 mb-3">
					<div class="container">
						&copy; Todos os direitos reservados a Escola LTG - 2018 | {{date('Y')}}
					</div>
				</div>

		</footer>

		<script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/script.js')}}"></script>
		@yield('scripts')
</body>

</html>

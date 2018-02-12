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
					&copy; Todos os direitos reservados a <?php echo config('app.name'); ?> - 2018 | 2018 
				</div>
			</div>
		</footer>
		
		<script type="text/javascript" src="<?php echo theme_url('js/jquery-3.2.1.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo theme_url('js/materialize.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo theme_url('js/script.js'); ?>"></script>
		<?php if(isset($js)){foreach($js as $file){echo Theme::js('js/' . $file . ".js"); }} ?>
	</body>
</html>
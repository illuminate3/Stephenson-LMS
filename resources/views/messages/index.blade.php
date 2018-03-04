<?php echo view('header', ['title' => "Chat - Stephenson"]); ?>
		<div class="inbox">
			<div class="messages">
				<div id="messages-menu">
					<ul class="tabs tabs-fixed-width">
						<li class="tab col s3"><a href="#private-messages" class="active"><i class="material-icons">chat</i></a></li>
						<li class="tab col s3 "><a href="#groups-messages"><i class="material-icons">group_work</i></a></li>
						<li class="tab col s3 "><a href="#forum-messages"><i class="material-icons">forum</i></a></li>
					</ul>
				</div>

				<div id="private-messages" class="col s12 list-messages">
					Aqui vão as mensagens privadas
				</div>

				<div id="groups-messages" class="col s12 list-messages">
					Aqui ficam os grupos de Estudo
				</div>

				<div id="forum-messages" class="col s12 list-messages">
					Aqui ficam as respostas no fórum
				</div>
			</div>

			<div class="chat">
				<div id="chat-menu">
					<div class="container">
						<div id="chat-user-avatar"><img src="images/depoimento/user1.png"></div>
						<div id="chat-user-name">Maikon</div>
					</div>
				</div>

				<div id="chat-messages">
					<div class="container">

						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non ex pellentesque, pellentesque sapien quis, consequat magna. Integer feugiat id augue dignissim pharetra. Etiam fermentum magna sit amet magna tincidunt, nec vehicula mi gravida. Pellentesque ac lectus viverra magna hendrerit scelerisque. Vestibulum tristique arcu tortor, eget viverra justo feugiat eu. Ut varius, turpis et ultrices suscipit, purus lectus placerat ante, non sollicitudin neque lorem sit amet nisl. Proin elit tellus, posuere sed ipsum quis, convallis euismod diam. Mauris egestas tristique dolor, sit amet rhoncus metus pulvinar nec. Nam libero leo, luctus sed malesuada at, eleifend ut odio. Phasellus congue posuere diam vel laoreet. Sed imperdiet, metus at aliquam dignissim, tortor nibh consectetur eros, in mattis odio tortor quis dui. In feugiat tempus venenatis. Vivamus ac pellentesque est.

						Donec id blandit velit. Pellentesque ut augue tincidunt, ultricies tellus in, pharetra lectus. Suspendisse potenti. Aliquam imperdiet at justo et dapibus. Fusce neque tellus, porttitor ut dui non, commodo pretium nibh. Nunc feugiat, nisl a condimentum interdum, arcu augue imperdiet erat, feugiat vulputate dui neque varius sapien. Aenean feugiat, tortor at fermentum consequat, eros ante commodo ipsum, vitae dapibus urna tellus quis nulla. Nulla volutpat ornare diam sed rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut nec diam volutpat, vulputate nisi nec, varius lectus.

						Praesent ultricies, arcu a dapibus iaculis, nibh velit sagittis odio, nec feugiat nunc purus id nunc. Ut laoreet leo id dictum congue. Ut semper blandit tortor vel imperdiet. In hac habitasse platea dictumst. Cras faucibus ligula quis est commodo, at sollicitudin sapien bibendum. Duis eu nisl interdum, consequat urna nec, feugiat metus. Nullam volutpat lacinia sollicitudin. Phasellus dignissim condimentum tellus a mollis. Nulla dictum, est at sodales molestie, tellus mi semper mi, id molestie elit tellus sed nisl. Ut leo lorem, blandit in turpis pretium, consequat consectetur neque. Donec vulputate enim tortor, id molestie dolor rutrum vitae. Integer varius enim ipsum, sit amet vehicula tortor vehicula ut. Maecenas dapibus nisl elementum, finibus elit at, faucibus sapien. Morbi quis ex ultricies, porta quam ut, eleifend turpis.

						Maecenas tempus pulvinar mollis. Proin finibus bibendum urna ut rutrum. Sed venenatis, lectus sed maximus commodo, arcu sapien auctor ex, vel tempus ligula ante ut elit. Curabitur eu eros commodo, elementum sem a, tincidunt lectus. Vestibulum vel risus et enim pretium laoreet. Praesent mollis a magna id blandit. Vivamus sit amet sollicitudin eros, ac lobortis nisi. Aenean iaculis, mauris eu ultrices convallis, mauris nisi tempor orci, non consectetur nisi lacus sed justo. Sed vel malesuada ante, vel aliquet turpis. Fusce ornare nisi quis diam accumsan suscipit.

						Maecenas leo neque, bibendum ac congue eu, consequat quis ipsum. Vivamus mattis quam id ipsum lobortis, et vulputate nunc cursus. Ut rutrum, diam eget scelerisque euismod, orci quam porta dui, at consectetur nibh sem eu dolor. Aenean facilisis ante orci, nec vestibulum lacus faucibus sit amet. Etiam iaculis semper magna, vel lacinia urna bibendum id. Nulla id elementum lacus. Nunc vestibulum ex lobortis luctus mattis. Proin finibus, metus facilisis congue accumsan, nunc ligula blandit tortor, quis imperdiet enim sem finibus lorem. Suspendisse potenti. In varius, nibh ac tincidunt facilisis, diam risus porta est, sit amet vehicula nisl ligula ut velit. Donec sit amet risus gravida, volutpat neque at, pulvinar mauris. Donec sagittis malesuada ligula, et viverra augue dignissim vitae.

					</div>
				</div>

				<div id="chat-box">
					<form>
						<div class="container">
						<input type="text" placeholder="Digite sua mensagem e pressione ENTER" autofocus>
						</div>
					</form>
				</div>
			</div>
			<div style="clear:both"></div>
		</div>

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/cycle.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>

<div class="container">
	<h2>Dashboard</h2>
	
	<h3>Estatísticas</h3>
	<div class="row">
		<div class="col s3">
			<div class="card card-panel">
				<span class="card-title">Usuários</span>
				<p><?php echo count($users); ?></p>
			</div>
		</div>
		
		<div class="col s3">
			<div class="card card-panel">
				<span class="card-title">Tutoriais</span>
				<p><?php echo count($tutorials); ?></p>
			</div>
		</div>
		
		<div class="col s3">
			<div class="card card-panel">
				<span class="card-title">Cursos</span>
				<p><?php echo count($courses); ?></p>
			</div>
		</div>
		
		<div class="col s3">
			<div class="card card-panel">
				<span class="card-title">Páginas</span>
				<p><?php echo count($pages); ?></p>
			</div>
		</div>
	</div>
</div>
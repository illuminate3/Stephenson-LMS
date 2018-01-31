<div class="container">
	<div class="page-title"><h2><?php echo __('messages.dashboard'); ?></h2></div>

	<h5><?php echo __('messages.statistcs'); ?></h5>
	<div class="row">
		<div class="col l3 m6 s12">
			<div class="card card-panel">
				<span class="card-title"><?php echo __('messages.users'); ?></span>
				<p><?php echo count($users); ?></p>
			</div>
		</div>
		
		<div class="col l3 m6 s12">
			<div class="card card-panel">
				<span class="card-title"><?php echo __('messages.tutorials'); ?></span>
				<p><?php echo count($tutorials); ?></p>
			</div>
		</div>
		
		<div class="col l3 m6 s12">
			<div class="card card-panel">
				<span class="card-title"><?php echo __('messages.courses'); ?></span>
				<p><?php echo count($courses); ?></p>
			</div>
		</div>
		
		<div class="col l3 m6 s12">
			<div class="card card-panel">
				<span class="card-title"><?php echo __('messages.pages'); ?></span>
				<p><?php echo count($pages); ?></p>
			</div>
		</div>
	</div>
</div>
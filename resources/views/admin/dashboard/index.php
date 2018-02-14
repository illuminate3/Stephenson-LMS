<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php echo __('messages.dashboard'); ?></h1>
  </div>
</div>

<div class="container">
	<h5><?php echo __('messages.statistcs'); ?></h5>
	<div class="row">
		<div class="col">
			<div class="card card-panel">
				<span class="card-title"><?php echo __('messages.users'); ?></span>
				<p><?php echo count($users); ?></p>
			</div>
		</div>
		
		<div class="col">
			<div class="card card-panel">
				<span class="card-title"><?php echo __('messages.tutorials'); ?></span>
				<p><?php echo count($tutorials); ?></p>
			</div>
		</div>
		
		<div class="col">
			<div class="card card-panel">
				<span class="card-title"><?php echo __('messages.courses'); ?></span>
				<p><?php echo count($courses); ?></p>
			</div>
		</div>
		
		<div class="col">
			<div class="card card-panel">
				<span class="card-title"><?php echo __('messages.pages'); ?></span>
				<p><?php echo count($pages); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php echo __('messages.dashboard'); ?></h1>
  </div>
</div>

<div class="container">
	<div class="row">
		<div class="col">
			<div class="card card-statistic">
				<div class="row">
					<div class="col-6 card-statistic-title">
						<i class="material-icons">people</i>
						<div><?php echo __('messages.users'); ?></div>
					</div>
					
					<div class="col-6"><p><?php echo count($users); ?></p></div>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="card card-statistic">
				<div class="row">
					<div class="col-6 card-statistic-title">
						<i class="material-icons">video_library</i>
						<div><?php echo __('messages.tutorials'); ?></div>
					</div>
					
					<div class="col-6"><p><?php echo count($tutorials); ?></p></div>
				</div>
			</div>
		</div>
		
		<div class="col">
			<div class="card card-statistic">
				<div class="row">
					<div class="col-6 card-statistic-title">
						<i class="material-icons">star</i>
						<div><?php echo __('messages.courses'); ?></div>
					</div>
					
					<div class="col-6"><p><?php echo count($courses); ?></p></div>
				</div>
			</div>
		</div>
		
		<div class="col">
			<div class="card card-statistic">
				<div class="row">
					<div class="col-6 card-statistic-title">
						<i class="material-icons">insert_drive_file</i>
						<div><?php echo __('messages.pages'); ?></div>
					</div>
					
					<div class="col-6"><p><?php echo count($pages); ?></p></div>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="container">
	<div class="page-title"><h2><?php echo __('messages.settings'); ?></h2></div>
	<h5>Temas</h5>
		<div class="row">
			<?php $themes = Theme::all(); foreach($themes as $theme){ ?>
			<div class="col s4">
			<div class="card">
				<div class="card-image">
              <img src="images/sample-1.jpg">
            </div>
				
				<div class="card-content">
              <span class="card-title"><?php echo $theme->name; ?></span>
				</div>
				
				<div class="card-action">
              <a href="#">Ativar</a>
            </div>
			</div>
			</div>
			<?php } ?>
		</div>
</div>

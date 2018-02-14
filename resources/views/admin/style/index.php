<nav aria-label="breadcrumb" id="page-nav">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item active" aria-current="page">Estilo</li>
		</ol>
	</div>	
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4"><?php echo __('messages.style'); ?></h1>
  </div>
</div>

<div class="container">
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

<div class="container">
	<div class="page-title"><h2><?php echo __('messages.settings'); ?></h2></div>
	<h5>Temas</h5>
	<form method="post" action="">
		<div class="row">
			<div class="input-field col s12">
				<select name="theme">
					<?php $themes = Theme::all(); foreach($themes as $theme){ ?>
					<option value="<?php echo $theme->name ?>" <?php echo (Theme::get() == $theme->name) ? "selected" : null; ?> ><?php echo $theme->name; ?></option>
					<?php } ?>
				</select>

				<label>Tema Atual:</label>
			</div>
		</div>

		<input type="submit" class="btn" value="Alterar Tema">
		<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

	</form>

</div>

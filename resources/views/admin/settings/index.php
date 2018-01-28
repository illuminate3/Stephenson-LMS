<div class="container">
	<h2>Configurações</h2>
	<form>
		<?php foreach($settings as $setting){?>
		<div class="row">
			<div class="col s12 input-field">
				<input type="text" name="<?php echo $setting->setting_name; ?>" id="<?php echo $setting->setting_name; ?>">
				<label for="<?php echo $setting->setting_name; ?>"><?php echo __("messages." . $setting->setting_name); ?></label>
			</div>
		<?php } ?>
			
		<div class="col s12 input-field">
			<button class="btn">Atualizar</button>
		</div>
			
			<!--
			<div class="col s12 input-field">
				<input type="text" name="footer_credits" id="site-footer-credits">
				<label for="site-footer-credits">Créditos no Rodapé</label>
			</div>
			
			<div class="col s12 input-field">
				<input type="text" name="email" id="site-email">
				<label for="site-email">E-mail do Site</label>
			</div>
			
			<div class="col s12 input-field">
				<button class="btn">Atualizar</button>
			</div>
		</div>-->
	</form>
</div>

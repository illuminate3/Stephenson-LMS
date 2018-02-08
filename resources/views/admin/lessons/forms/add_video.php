<form action="<?php echo URL::route('lesson.create_material', ['lesson' => $lesson, 'material' => $material]); ?>" method="post">
<div class="modal-content">
	<h4>Adicionar Vídeo</h4>
	<input type="text" placeholder="Título do Material" name="title">
	<input type="text" placeholder="Link do Vídeo" name="content">
</div>

<div class="modal-footer">
	<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
	<button class="btn" type="submit">Criar</button>
</div>
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</form>
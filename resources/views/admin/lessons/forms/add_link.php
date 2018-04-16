<form action="<?php echo URL::route('lesson.create_material', ['lesson' => $lesson, 'material' => $material]); ?>" method="post">
	<div class="modal-header">
		<h5 class="modal-title">Adicionar Link</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div class="modal-body">
		<div class="form-group">
			<label for="exampleFormControlInput1">Nome do Link</label>
			<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome do Material" name="title">
		</div>
		<div class="form-group">
			<label for="exampleFormControlTextarea1">Link</label>
			<input type="url" class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" placeholder="Link"></textarea>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn" type="submit">Criar</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	</div>

	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</form>

<form action="<?php echo URL::route('lesson.create_material', ['lesson' => $lesson, 'material' => $material]); ?>" method="post">
	<div class="modal-header">
		<h5 class="modal-title">Adicionar Imagem</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div class="modal-body">
		<div class="form-group">
			<label for="exampleFormControlInput1">Nome do Material</label>
			<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nome do Material" name="title">
		</div>
		<div class="input-group">
      <span class="input-group-btn">
        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary" style="color:white;">
          <i class="fa fa-image"></i> Carregar
        </a>
      </span>
      <input id="image" class="form-control" type="text" name="content">
    </div>
    <img id="holder" style="margin-top:15px;width:100%;">
	</div>

	<div class="modal-footer">
		<button class="btn" type="submit">Criar</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	</div>
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
</form>

<script>$('#lfm').filemanager('image');</script>

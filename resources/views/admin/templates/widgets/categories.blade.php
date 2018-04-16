<div class="card mt-3 widget">
  <h5 class="card-header">Categoria</h5>
  <div class="card-body">
    <div class="input-group">
      <select name="category_id">
        <option value="0" disabled selected>Sem categoria</option>
        @foreach ($categories as $category)
        <option value="{{ $category['id']}}">{{ $category['name']}}</option>
        @endforeach
      </select>
    </div>
  </div>
</div>

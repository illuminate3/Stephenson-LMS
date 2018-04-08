<div class="card mt-3">
  <h5 class="card-header">Categoria</h5>
  <div class="card-body">
    <select name="category_id">
      <option value="0" disabled selected>Sem categoria</option>
      @foreach ($categories as $category)
      <option value="{{ $category['id']}}">{{ $category['name']}}</option>
      @endforeach
    </select>
  </div>
</div>

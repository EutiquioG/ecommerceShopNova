@extends('layouts.app')

@section('content')

<div class="form-container">

<div class="form-card">

<h2>Agregar Producto</h2>

<form action="{{ route('products.store') }}" method="POST">
@csrf

<div class="form-group">
<label>Nombre del producto</label>
<input type="text" name="name" required>
</div>

<div class="form-group">
<label>Precio</label>
<input type="number" name="price" step="0.01" required>
</div>

<div class="form-group">
<label>Descripción</label>
<textarea name="description"></textarea>
</div>

<div class="form-group">
<label>Imagen (URL)</label>
<input type="text" name="image">
</div>

<button class="btn-save">
Guardar Producto
</button>

</form>

</div>

</div>

@endsection
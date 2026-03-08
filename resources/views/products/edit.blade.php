@extends('layouts.app')

@section('content')

<div class="form-container">

<div class="form-card">

<h2>Actualizar Producto</h2>

<form action="{{ route('products.update',$product->id) }}" method="POST">

@csrf
@method('PUT')

<div class="form-group">
<label>Nombre</label>
<input type="text" name="name" value="{{ $product->name }}">
</div>

<div class="form-group">
<label>Precio</label>
<input type="number" name="price" value="{{ $product->price }}">
</div>

<div class="form-group">
<label>Descripción</label>
<textarea name="description">{{ $product->description }}</textarea>
</div>

<div class="form-group">
<label>Imagen</label>
<input type="text" name="image" value="{{ $product->image }}">
</div>

<button class="btn-save">
Actualizar Producto
</button>

</form>

</div>

</div>

@endsection
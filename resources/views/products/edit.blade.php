@extends('layouts.app')

@section('content')

@auth
@if(auth()->user()->role === 'admin')

<div class="form-container">

    <div class="form-card">

        <h2>Actualizar Producto</h2>

        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input type="number" name="price" step="0.01" value="{{ $product->price }}" required>
            </div>

            <div class="form-group">
                <label>Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}" min="0" required>
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea name="description">{{ $product->description }}</textarea>
            </div>

            {{-- 📸 IMAGEN ACTUAL --}}
            @if($product->image)
                <div class="form-group">
                    <label>Imagen actual</label><br>
                    <img src="{{ asset('storage/' . $product->image) }}" width="120">
                </div>
            @endif

            {{-- 📸 NUEVA IMAGEN --}}
            <div class="form-group">
                <label>Cambiar imagen</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <button class="btn-save">
                Actualizar Producto
            </button>

        </form>

    </div>

</div>

@else
    <div style="text-align:center; margin-top:50px;">
        <h3>No tienes permisos para acceder aquí ❌</h3>
    </div>
@endif
@endauth

@endsection
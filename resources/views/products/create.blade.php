@extends('layouts.app')

@section('content')

@auth
    @if(auth()->user()->role === 'admin')

    <div class="form-container">

        <div class="form-card">

            <h2>Agregar Producto</h2>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label>Stock</label>
                    <input type="number" name="stock" min="0" required>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="description"></textarea>
                </div>

                <div class="form-group">
                    <label>Imagen del producto</label>
                    <input type="file" name="image" accept="image/*">
                </div>

                <button class="btn-save">Guardar Producto</button>

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
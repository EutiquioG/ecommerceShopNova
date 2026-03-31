@extends('layouts.app')

@section('content')

<style>

body{
    background:#f4f6f9;
}

/* CONTENEDOR */
.admin-container{
    width:90%;
    margin:40px auto;
}

/* HEADER */
.admin-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.admin-header h2{
    color:#333;
}

/* BOTONES */
.btn{
    padding:10px 15px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    text-decoration:none;
    font-size:14px;
}

.btn-primary{
    background:linear-gradient(45deg,#4CAF50,#2ecc71);
    color:white;
}

.btn-edit{
    background:#3498db;
    color:white;
}

.btn-delete{
    background:#e74c3c;
    color:white;
}

/* TARJETA */
.card{
    background:white;
    border-radius:12px;
    padding:20px;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
}

/* TABLA */
table{
    width:100%;
    border-collapse:collapse;
}

table th{
    text-align:left;
    padding:12px;
    background:#2c3e50;
    color:white;
}

table td{
    padding:12px;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f9f9f9;
}

/* IMAGEN */
.product-img{
    width:70px;
    height:70px;
    object-fit:cover;
    border-radius:10px;
}

/* STOCK */
.stock-ok{
    color:green;
    font-weight:bold;
}

.stock-out{
    color:red;
    font-weight:bold;
}

</style>

<div class="admin-container">

    <div class="admin-header">
        <h2>👑 Panel Administrador</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary">
            + Nuevo Producto
        </a>
    </div>

    @if(session('success'))
        <div style="background:#d4edda;padding:10px;border-radius:8px;margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <table>

            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach($products as $product)

                <tr>

                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="product-img">
                        @else
                            Sin imagen
                        @endif
                    </td>

                    <td>
                        <strong>{{ $product->name }}</strong><br>
                        <small>{{ $product->description }}</small>
                    </td>

                    <td>$ {{ number_format($product->price, 0, ',', '.') }}</td>

                    <td>
                        @if($product->stock > 0)
                            <span class="stock-ok">{{ $product->stock }} disponibles</span>
                        @else
                            <span class="stock-out">Agotado</span>
                        @endif
                    </td>

                    <td>

                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-edit">
                            ✏️
                        </a>

                        <form action="{{ route('products.destroy',$product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-delete" onclick="return confirmDelete()">
                                🗑️
                            </button>
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<script>
function confirmDelete(){
    return confirm("¿Seguro que deseas eliminar este producto?");
}
</script>

@endsection
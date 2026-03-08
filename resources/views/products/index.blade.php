<!DOCTYPE html>
<html>
<head>

<title>Productos</title>

<style>

body{
    font-family: Arial;
    background:#f4f6f9;
}

.container{
    width:90%;
    margin:auto;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.btn{
    padding:10px 18px;
    border:none;
    border-radius:6px;
    cursor:pointer;
}

.btn-primary{
    background:#4CAF50;
    color:white;
}

.btn-edit{
    background:#2196F3;
    color:white;
}

.btn-delete{
    background:#f44336;
    color:white;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    margin-top:20px;
}

table th{
    background:#111;
    color:white;
    padding:12px;
}

table td{
    padding:10px;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f1f1f1;
}

</style>

</head>

<body>

<div class="container">

<div class="header">

<h2>Administrar Productos</h2>

<a href="{{ route('products.create') }}" class="btn btn-primary">
Agregar Producto
</a>

</div>

@if(session('success'))
<div style="background:#d4edda;padding:10px;margin-top:10px">
{{ session('success') }}
</div>
@endif

<table>

<thead>

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Precio</th>
<th>Stock</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

@foreach($products as $product)

<tr>

<td>{{ $product->id }}</td>
<td>{{ $product->name }}</td>
<td>$ {{ $product->price }}</td>
<td>{{ $product->stock }}</td>

<td>

<a href="{{ route('products.edit',$product->id) }}"
class="btn btn-edit">
Editar
</a>

<form action="{{ route('products.destroy',$product->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-delete"
onclick="return confirmDelete()">
Eliminar
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<script>

function confirmDelete(){

return confirm("¿Seguro que deseas eliminar este producto?");

}

</script>

</body>
</html>
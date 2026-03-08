@extends('layouts.app')

@section('content')

<h1>Carrito de compras</h1>

<div class="grid">

@php $total = 0 @endphp

<h2>Carrito de compras</h2>

@foreach($cart as $id => $item)

<div class="cart-item">

<p>{{ $item['name'] }}</p>

<p>${{ $item['price'] }}</p>

<p>Cantidad: {{ $item['quantity'] }}</p>

</div>

@endforeach

<div class="cart-total">

<h3>Total: ${{ number_format($total,2) }}</h3>

<button class="btn-checkout">
Proceder al pago
</button>

</div>

</div>

<h2>Total: ${{ $total }}</h2>

@endsection
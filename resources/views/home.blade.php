@extends('layouts.app')

@section('content')

<div class="hero-banner">

    <div class="hero-text">
        <h1>Bienvenido a ShopNova</h1>
        <p>Descubre productos increíbles con los mejores precios online.</p>

        <a href="/products" class="btn-shop">
            Comprar ahora
        </a>
    </div>

</div>
<div class="categories">

<div class="category">
<img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9">
<h4>Electrónica</h4>
</div>

<div class="category">
<img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30">
<h4>Accesorios</h4>
</div>

<div class="category">
<img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f">
<h4>Moda</h4>
</div>

</div>
<div class="promo-banner">

<div class="promo-card">
<h3>🚚 Envío Gratis</h3>
<p>En compras mayores a $50</p>
</div>

<div class="promo-card">
<h3>💳 Pago Seguro</h3>
<p>Protección en todas tus compras</p>
</div>

<div class="promo-card">
<h3>🔥 Ofertas</h3>
<p>Descuentos hasta 40%</p>
</div>

</div>

<div class="grid">

@foreach($products as $product)

<div class="card">

<img src="{{ $product->image }}" alt="{{ $product->name }}">

<h3>{{ $product->name }}</h3>

<p class="price">$ {{ $product->price }}</p>
<p class="h1":>Descripción: {{ $product->description }}</p>

<form action="{{ route('cart.add',$product->id) }}" method="POST">
@csrf

<button class="btn-cart">
Agregar al carrito
</button>

</form>

@auth

@endauth

</div>

@endforeach

</div>

@endsection
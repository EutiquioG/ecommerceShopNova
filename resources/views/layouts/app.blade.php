<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Ecommerce</title>

<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>

<!-- NAVBAR -->

<nav class="navbar">

<a href="/">ShopNova</a>
<div>

@guest

<button onclick="openLogin()">Iniciar sesión</button>
<button onclick="openRegister()">Registrarse</button>

@endguest


@auth


<span>{{ auth()->user()->name }}</span>
<a href="#" onclick="openCart()">
🛒 Carrito

<span style="
background:red;
color:white;
padding:3px 8px;
border-radius:50%;
font-size:12px;
margin-left:5px;
">

{{ session('cart') ? count(session('cart')) : 0 }}

</span>

</a>

<form method="POST" action="{{ route('logout') }}" style="display:inline;">
@csrf
<button type="submit">
Cerrar sesión
</button>
</form>

@endauth

</div>

</nav>


<!-- CONTENIDO -->

<div class="container">

@yield('content')

</div>



<!-- MODAL LOGIN -->

<div id="loginModal" class="modal">

<div class="modal-content">

<span class="close" onclick="closeLogin()">&times;</span>

<h2>Iniciar sesión</h2>

<form method="POST" action="{{ route('login') }}">
@csrf

<input type="email" name="email" placeholder="Correo" required>

<input type="password" name="password" placeholder="Contraseña" required>

<button type="submit">
Entrar
</button>

</form>

</div>

</div>



<!-- MODAL REGISTER -->

<div id="registerModal" class="modal">

<div class="modal-content">

<span class="close" onclick="closeRegister()">&times;</span>

<h2>Registrarse</h2>

<form method="POST" action="{{ route('register') }}">
@csrf

<input type="text" name="name" placeholder="Nombre" required>

<input type="email" name="email" placeholder="Correo" required>

<input type="password" name="password" placeholder="Contraseña" required>

<input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>

<button type="submit">
Crear cuenta
</button>

</form>

</div>

</div>

<!-- CARRITO -->

<div id="cartModal" class="modal">

<div class="modal-content">

<span class="close" onclick="closeCart()">&times;</span>

<h2>Tu carrito</h2>

@if(session('cart'))

@php $total = 0 @endphp

@foreach(session('cart') as $id => $product)

<div style="margin-bottom:15px">

<strong>{{ $product['name'] }}</strong>

<p>Cantidad: {{ $product['quantity'] }}</p>

<p>$ {{ $product['price'] }}</p>

<form action="{{ route('cart.remove',$id) }}" method="POST">
@csrf

<button style="
background:#ff4757;
color:white;
border:none;
padding:5px 10px;
border-radius:5px;
cursor:pointer;
">

Eliminar

</button>

</form>

</div>

<hr>

@endforeach

<h3>Total: ${{ $total }}</h3>

@else

<p>No hay productos en el carrito</p>

@endif

</div>

</div>

<footer class="footer">

<div class="footer-grid">

<div>
<h3>ShopNova</h3>
<p>La mejor tienda online con productos modernos, envíos rápidos y precios increíbles.</p>
</div>

<div>
<h3>Compañía</h3>
<a href="#">Sobre nosotros</a>
<a href="#">Trabaja con nosotros</a>
<a href="#">Blog</a>
</div>

<div>
<h3>Ayuda</h3>
<a href="#">Centro de ayuda</a>
<a href="#">Devoluciones</a>
<a href="#">Envíos</a>
</div>

<div>
<h3>Legal</h3>
<a href="#">Privacidad</a>
<a href="#">Términos</a>
<a href="#">Cookies</a>
</div>

</div>

<div class="footer-bottom">
© 2025 ShopNova - Todos los derechos reservados
</div>

</footer>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
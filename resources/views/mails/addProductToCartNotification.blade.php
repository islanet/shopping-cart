<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se agregó un producto al Carrito de Compras</title>
</head>
<body>
<h1>{{ $data['user_name'] }}</h1>
<h2>Se agregó un producto a su Carrito de Compras  </h2>

<p>Producto: {{ $data['cart_item_product_name'] }}</p>
<p>Cantidad: {{ $data['cart_item_quantity'] }}</p>
<p>Precio: {{ $data['cart_item_price'] }}</p>
<p>Total: {{ $data['cart_item_price'] * $data['cart_item_quantity'] }}</p>
</body>
</html>

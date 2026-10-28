<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product Details</h1>

    <p>ID: {{ $product->id }}</p>
    <p>Name: {{ $product->name }}</p>
    <p>Description: {{ $product->description }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Stock: {{ $product->in_Stock }}</p>

    <a href="{{ route('products.index') }}">Back</a>
</body>
</html>
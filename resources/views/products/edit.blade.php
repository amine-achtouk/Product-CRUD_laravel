<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Product</h1>

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
    <br><br>

    <label>Description:</label>
    <textarea name="description">{{ old('description', $product->description) }}</textarea>
    <br><br>

    <label>Price:</label>
    <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0" required>
    <br><br>

    <label>Stock:</label>
    <input type="number" name="in_Stock" value="{{ old('in_Stock', $product->in_Stock) }}" min="0" required>
    <br><br>

    <button type="submit">Update Product</button>
</form>
</body>
</html>
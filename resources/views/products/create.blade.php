<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add New Product</h1>


    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif


    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <br><br>

        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea>
        <br><br>

        <label>Price:</label>
        <input type="number" name="price" min="0" value="{{ old('price') }}" required>
        <br><br>

        <label>Stock:</label>
        <input type="number" name="in_Stock" min="0" value="{{ old('in_Stock') }}" required>
        <br><br>

        <button type="submit">Add Product</button>
    </form>
    <a href="{{ route('products.index') }}">Back to Products</a>

</body>
</html>
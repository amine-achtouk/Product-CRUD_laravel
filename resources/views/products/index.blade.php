<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>

    <h1>Product List</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('products.create') }}">Add New Product</a>

    @if ($products->isEmpty())
        <p>No products found.</p>
    @else
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description ?? 'No description' }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->in_Stock }}</td>

                        <td>
                            <a href="{{ route('products.show', $product) }}">
                                Details
                            </a>

                            <a href="{{ route('products.edit', $product) }}">
                                Edit
                            </a>


                            <form action="{{ route('products.destroy', $product) }}"
                                  method="POST"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>

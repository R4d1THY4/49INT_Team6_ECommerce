<!DOCTYPE html>
<html>

<head>
    <title>Product Catalog</title>
    <link rel="stylesheet" href="{{ asset('ArmanStyleSheet.css') }}">
</head>

<body>

    <h1>Product Catalog</h1>

    <a href="{{ route('catalog.index') }}">Home</a>
    <a href="{{ route('catalog.products') }}">Products</a>
    <a href="{{ route('catalog.brands') }}">Brands</a>

    <h2>Welcome!</h2>

    <p>Find our products from different brands.</p>

</body>

</html>
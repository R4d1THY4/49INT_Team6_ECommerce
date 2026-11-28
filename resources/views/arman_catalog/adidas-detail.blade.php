<!DOCTYPE html>
<html>

<head>
    <title>Adidas Ultraboost</title>
    <link rel="stylesheet" href="{{ asset('ArmanStyleSheet.css') }}">
</head>

<body>
    @include('partials.navbar')

    <h1>Product Detail</h1>

    <a href="{{ route('catalog.index') }}">Home</a>
    <a href="{{ route('catalog.products') }}">Products</a>
    <a href="{{ route('catalog.brands') }}">Brands</a>

    <h2>Adidas Ultraboost</h2>

    <div class="product">
        <p>Brand: Adidas</p>
        <p>Price: $150</p>
        <p>Color: White</p>
        <p>Size: 40, 41, 42</p>
        <p>Weight: 750g</p>
        <p>Dimensions: 35 x 22 x 13 cm</p>
    </div>

</body>

</html>
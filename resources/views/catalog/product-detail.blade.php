<!DOCTYPE html>
<html>

<head>
    <title>Product Detail</title>
    <link rel="stylesheet" href="{{ asset('ArmanStyleSheet.css') }}">
</head>

<body>

    <h1>Product Detail</h1>

    <a href="{{ route('catalog.index') }}">Home</a>
    <a href="{{ route('catalog.products') }}">Products</a>
    <a href="{{ route('catalog.brands') }}">Brands</a>

    <h2>Nike Air Max</h2>

    <div class="product">
        <p>Brand: Nike</p>
        <p>Price: $120</p>
        <p>Color: Black</p>
        <p>Size: 40, 41, 42</p>
        <p>Weight: 800g</p>
        <p>Dimensions: 35 x 22 x 13 cm</p>
    </div>

</body>

</html>
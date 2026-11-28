<!DOCTYPE html>
<html>

<head>
    <title>Brands</title>
    <link rel="stylesheet" href="{{ asset('ArmanStyleSheet.css') }}">
</head>

<body>

    <h1>Brands</h1>

    <a href="{{ route('catalog.index') }}">Home</a>
    <a href="{{ route('catalog.products') }}">Products</a>
    <a href="{{ route('catalog.brands') }}">Brands</a>

    <h2>Our Brands</h2>

    <div class="product">
        <h3>Nike</h3>
        <p>Sportswear and footwear brand.</p>
    </div>

    <div class="product">
        <h3>Adidas</h3>
        <p>Sportswear and lifestyle brand.</p>
    </div>

    <div class="product">
        <h3>Puma</h3>
        <p>Sports and casual footwear brand.</p>
    </div>

</body>

</html>
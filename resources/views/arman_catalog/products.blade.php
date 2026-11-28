<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('ArmanStyleSheet.css') }}">
</head>

<body>
    @include('partials.navbar')

    <h1>Products</h1>

    <a href="{{ route('catalog.index') }}">Home</a>
    <a href="{{ route('catalog.products') }}">Products</a>
    <a href="{{ route('catalog.brands') }}">Brands</a>

    <h2>Our Products</h2>

    <div class="product">
        <h3>
            <a href="{{ route('catalog.nike') }}">Nike Air Max</a>
        </h3>
        <p>Brand: Nike</p>
        <p>Price: $120</p>
        <p>Color: Black</p>
        <p>Size: 40, 41, 42</p>
    </div>

    <div class="product">
        <h3>
            <a href="{{ route('catalog.adidas') }}">Adidas Ultraboost</a>
        </h3>
        <p>Brand: Adidas</p>
        <p>Price: $150</p>
        <p>Color: White</p>
        <p>Size: 40, 41, 42</p>
    </div>

</body>

</html>
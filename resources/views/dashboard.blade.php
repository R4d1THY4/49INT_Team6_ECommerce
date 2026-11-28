<!DOCTYPE html>
<html>
<head>
    <title>Team 6 E-Commerce Portal</title>
    <style>
        body {
            font-family: "Comic Sans MS", "Comic Sans", sans-serif;
            margin: 0;
            background: linear-gradient(to right, lightblue, lightpink);
            color: #333;
            text-align: center;
        }

        .dashboard-container {
            max-width: 960px;
            margin: 0 auto;
            padding: 10px 20px 40px;
        }

        .welcome-box {
            background: rgba(255, 255, 255, 0.85);
            border: 2px solid #ffffff;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        }

        .welcome-box h1 {
            color: #6baed6;
            margin: 0 0 8px;
        }

        .welcome-box p {
            color: #555;
            margin: 0;
        }

        .module-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 20px;
        }

        .module-card {
            display: block;
            text-decoration: none;
            background: rgba(255, 255, 255, 0.85);
            border: 2px solid #ffffff;
            border-radius: 12px;
            padding: 24px;
            text-align: left;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
            transition: transform 0.15s ease, background 0.15s ease;
        }

        .module-card:hover {
            background: #ffffff;
            transform: translateY(-2px);
        }

        .module-tag {
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            color: #d98bb3;
            letter-spacing: 0.5px;
        }

        .module-card h2 {
            color: #6baed6;
            margin: 6px 0 8px;
            font-size: 20px;
        }

        .module-card p {
            color: #555;
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>

    @include('partials.navbar')

    <div class="dashboard-container">
        <div class="welcome-box">
            <h1>Welcome back, {{ Auth::user()->name }}!</h1>
            <p>Select a module below to manage products, customers, vouchers, or shipments.</p>
        </div>

        <div class="module-grid">
            <a href="{{ route('catalog.index') }}" class="module-card">
                <div class="module-tag">Storefront Module (Arman)</div>
                <h2>Product Catalog & Brands</h2>
                <p>Browse featured footwear, specifications, and partner brands.</p>
            </a>

            <a href="{{ route('customers.index') }}" class="module-card">
                <div class="module-tag">Customer Module (Shaby)</div>
                <h2>Customers & Shipping Directory</h2>
                <p>Register customers, manage directory records, and view shipping addresses.</p>
            </a>

            <a href="{{ route('vouchers.index') }}" class="module-card">
                <div class="module-tag">Promotion Module (Radit)</div>
                <h2>Voucher Management</h2>
                <p>Create, update, and manage discount vouchers and promo codes.</p>
            </a>

            <a href="{{ route('shipments.index') }}" class="module-card">
                <div class="module-tag">Logistics Module (Intan)</div>
                <h2>Shipment Tracking</h2>
                <p>Log new deliveries, update courier services, and monitor package weights.</p>
            </a>
        </div>
    </div>

</body>
</html>
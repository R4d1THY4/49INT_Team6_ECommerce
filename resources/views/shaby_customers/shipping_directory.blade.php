<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Address Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('partials.navbar')
    <div class="container mt-5 mb-5">
        <h2 class="mb-4 text-center">Shipping Address Directory</h2>
        
        <div class="mb-4 text-center">
            <a href="{{ route('customers.index') }}" class="btn btn-outline-primary">Add Customer</a>
            <a href="{{ route('customers.directory') }}" class="btn btn-outline-primary">Customer Directory</a>
            <a href="{{ route('customers.shipping') }}" class="btn btn-primary">Shipping Address Directory</a>
        </div>

        <div class="card p-4 shadow-sm">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>City</th>
                        <th>Shipping Address</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $index => $c)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->city }}</td>
                        <td>{{ $c->address }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No shipping address data available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
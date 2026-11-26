<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Edit Data Customer</h2>

        <div class="card p-4 shadow-sm">
            <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <h4 class="mb-3">Data Customer</h4>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}" required>
                </div>

                <h4 class="mt-4 mb-3">Alamat Pengiriman</h4>
                <div class="mb-3">
                    <label class="form-label">Alamat Jalan</label>
                    <input type="text" name="address" class="form-control" value="{{ $customer->shippingAddress->address ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" name="city" class="form-control" value="{{ $customer->shippingAddress->city ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kode Pos</label>
                    <input type="text" name="postal_code" class="form-control" value="{{ $customer->shippingAddress->postal_code ?? '' }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('customers.directory') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer & Address Module</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5" style="max-width: 800px;">
        <h2 class="mb-4 text-center">Customer & Address Module</h2>
        
        <!-- Navigasi -->
        <div class="mb-4 text-center">
            <a href="{{ route('customers.index') }}" class="btn btn-primary">Add Customer</a>
            <a href="{{ route('customers.directory') }}" class="btn btn-outline-primary">Customer Directory</a>
            <a href="{{ route('customers.shipping') }}" class="btn btn-outline-primary">Shipping Address Directory</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card p-4 shadow-sm">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                <h4 class="mb-3 text-secondary">Add New Customer</h4>
                
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Phone Number:</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">City:</label>
                    <input type="text" name="city" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status:</label>
                    <select name="status" class="form-select">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Shipping Address:</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <button type="submit" class="btn btn-success px-4">Add Customer</button>
                        <button type="reset" class="btn btn-secondary px-4">Clear Form</button>
                    </div>
            </form>
            
                    <form action="{{ route('customers.reset') }}" method="POST" onsubmit="return confirm('Are you sure you want to clear all data?');">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reset All Data</button>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>
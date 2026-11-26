<!DOCTYPE html>
<html>
<head>
    <title>Customer & Address Module - Laravel</title>
    <style>
        body { font-family: "Comic Sans MS", Arial, sans-serif; background: linear-gradient(to right, lightblue, lightpink); margin: 30px; text-align: center; }
        h1, h2 { color: #242424; }
        table { width: 100%; max-width: 1200px; margin: 0 auto 30px auto; border-collapse: collapse; background: #fff; border: 1px solid black; }
        th, td { border: 1px solid black; padding: 15px; text-align: left; }
        th { background-color: #007BFF; color: white; }
        form.form-box { background: #fff; padding: 20px; border: 1px solid black; width: 50%; margin: 0 auto 30px auto; border-radius: 8px; text-align: left; font-size: 18px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; font-size: 15px; }
        button { padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px; font-size: 16px; width: 150px; height: 45px; }
        button:hover { background: #218838; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #c82333; }
        .success { color: green; font-weight: bold; margin-bottom: 15px; }
        label { font-weight: bold; }
    </style>
</head>
<body>

<h1>Customer & Address Module</h1>
<p>Management of buyer accounts, user profiles, and shipping address listing directory (Laravel Version).</p>

<hr style="margin: 30px 0;">

<h2>Add New Customer</h2>

@if(session('message'))
    <p class='success'>{{ session('message') }}</p>
@endif

<form method="POST" action="{{ route('customer.store') }}" class="form-box">
    @csrf
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Phone Number:</label><br>
    <input type="text" name="phone"><br><br>

    <label>City:</label><br>
    <input type="text" name="city"><br><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select><br><br>

    <label>Shipping Address:</label><br>
    <input type="text" name="address"><br><br>

    <button type="submit">Add Customer</button>
    <button type="reset" style="background: #6c757d;">Clear Form</button>
</form>

<div style="margin-bottom: 40px;">
    <form method="POST" action="{{ route('customer.reset') }}" style="display:inline;">
        @csrf
        <button type="submit" class="btn-danger" onclick="return confirm('Are you sure you want to clear all data?');">Reset All Data</button>
    </form>
</div>

<hr style="margin: 30px 0;">

<h2>Customer Directory</h2>
<table>
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>City</th>
        <th>Status</th>
    </tr>
    @forelse($customers as $index => $c)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $c['name'] }}</td>
        <td>{{ $c['email'] }}</td>
        <td>{{ $c['phone'] ?? '-' }}</td>
        <td>{{ $c['city'] ?? '-' }}</td>
        <td>{{ $c['status'] }}</td>
    </tr>
    @empty
    <tr><td colspan='6' style='text-align: center;'>No customer data available.</td></tr>
    @endforelse
</table>

<hr style="margin: 30px 0;">

<h2>Shipping Address Directory</h2>
<table>
    <tr>
        <th>Number</th>
        <th>Customer</th>
        <th>City</th>
        <th>Shipping Address</th>
    </tr>
    @forelse($customers as $index => $c)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $c['name'] }}</td>
        <td>{{ $c['city'] ?? '-' }}</td>
        <td>{{ $c['address'] ?? '-' }}</td>
    </tr>
    @empty
    <tr><td colspan='4' style='text-align: center;'>No shipping address data available.</td></tr>
    @endforelse
</table>

</body>
</html>
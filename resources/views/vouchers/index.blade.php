<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('StyleSheet.css') }}">
    <title>Voucher List</title>
</head>
<body>
    <h1>Added Vouchers</h1>
    <a href="{{ route('vouchers.create') }}">Add New Voucher</a>
    <br><br>
    <table border="1" cellpadding="8">
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Value</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
        @foreach ($vouchers as $voucher)
        <tr>
            <td>{{ $voucher->voucher_name }}</td>
            <td>{{ $voucher->voucher_code }}</td>
            <td>{{ $voucher->voucher_value }}</td>
            <td>{{ $voucher->voucher_type }}</td>
            <td>
                <a href="{{ route('vouchers.edit', $voucher->id) }}">Edit</a>
                <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
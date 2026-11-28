<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('StyleSheet.css') }}">
    <title>{{ isset($voucher) ? 'Edit Voucher' : 'Add Voucher' }}</title>
</head>
<body>
    @include('partials.navbar')
    <h1>{{ isset($voucher) ? 'Edit Voucher' : 'Add New Voucher' }}</h1>

    <form action="{{ isset($voucher) ? route('vouchers.update', $voucher->id) : route('vouchers.store') }}" method="POST">
        @csrf
        @if(isset($voucher))
            @method('PUT')
        @endif

        Voucher Name:<br>
        <input type="text" name="voucher_name" value="{{ $voucher->voucher_name ?? '' }}"><br><br>

        Voucher Code:<br>
        <input type="text" name="voucher_code" value="{{ $voucher->voucher_code ?? '' }}"><br><br>

        Discount Value:<br>
        <input type="text" name="voucher_value" value="{{ $voucher->voucher_value ?? '' }}"><br><br>

        Discount Type:<br>
        <select name="voucher_type">
            <option value="Percentage" {{ ($voucher->voucher_type ?? '') == 'Percentage' ? 'selected' : '' }}>Percentage</option>
            <option value="Nominal" {{ ($voucher->voucher_type ?? '') == 'Nominal' ? 'selected' : '' }}>Nominal</option>
        </select><br><br>

        <button type="submit">Save</button>
    </form>
    <br><br>
    <a href="{{ route('vouchers.index') }}">See Added Vouchers</a>
</body>
</html>
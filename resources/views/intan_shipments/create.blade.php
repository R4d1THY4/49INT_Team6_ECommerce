<!DOCTYPE html>
<html>
<head>
    <title>Input Shipment Data</title>
    <link rel="stylesheet" href="{{ asset('IntanStyleSheet.css') }}">
</head>
<body>
    @include('partials.navbar')

    <h1>Shipment Entry Form</h1>

    @if (session('error'))
        <p class="pesan">{{ session('error') }}</p>
    @endif

    <form action="{{ route('shipments.store') }}" method="POST">
        @csrf

        <label>Tracking Number:</label>
        <br>
        <input type="text" name="tracking_number" value="{{ old('tracking_number') }}" placeholder="e.g. EXP-1001" required>
        <br><br>

        <label>Sender Name:</label>
        <br>
        <input type="text" name="sender" value="{{ old('sender') }}" placeholder="Sender Full Name" required>
        <br><br>

        <label>Receiver Name:</label>
        <br>
        <input type="text" name="receiver" value="{{ old('receiver') }}" placeholder="Receiver Full Name" required>
        <br><br>

        <label>Shipping Service:</label>
        <br>
        <select name="service">
            <option value="Standard Ground" {{ old('service') === 'Standard Ground' ? 'selected' : '' }}>Standard Ground</option>
            <option value="Next-Day Express" {{ old('service') === 'Next-Day Express' ? 'selected' : '' }}>Next-Day Express</option>
            <option value="Cold Chain (Refrigerated)" {{ old('service') === 'Cold Chain (Refrigerated)' ? 'selected' : '' }}>Cold Chain (Refrigerated)</option>
        </select>
        <br><br>

        <label>Package Weight (kg):</label>
        <br>
        <input type="text" name="weight" value="{{ old('weight') }}" placeholder="e.g. 2.5" required>
        <br><br>

        <button type="submit">Add Shipment</button>
    </form>

    <p class="menu"><a href="{{ route('shipments.index') }}">Lihat Shipment List</a></p>

</body>
</html>
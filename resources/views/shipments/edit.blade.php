<!DOCTYPE html>
<html>
<head>
    <title>Edit Shipment Data</title>
    <link rel="stylesheet" href="{{ asset('IntanStyleSheet.css') }}">
</head>
<body>

    <h1>Edit Shipment</h1>

    @if (session('error'))
        <p class="pesan">{{ session('error') }}</p>
    @endif

    <form action="{{ route('shipments.update', $shipment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Tracking Number:</label>
        <br>
        <input type="text" name="tracking_number" value="{{ $shipment->tracking_number }}" required>
        <br><br>

        <label>Sender Name:</label>
        <br>
        <input type="text" name="sender" value="{{ $shipment->sender }}" required>
        <br><br>

        <label>Receiver Name:</label>
        <br>
        <input type="text" name="receiver" value="{{ $shipment->receiver }}" required>
        <br><br>

        <label>Shipping Service:</label>
        <br>
        <select name="service">
            @foreach ($layanan as $l)
                <option value="{{ $l }}" {{ $shipment->service === $l ? 'selected' : '' }}>{{ $l }}</option>
            @endforeach
        </select>
        <br><br>

        <label>Package Weight (kg):</label>
        <br>
        <input type="text" name="weight" value="{{ (float) $shipment->weight }}" required>
        <br><br>

        <button type="submit">Save Changes</button>
    </form>

    <p class="menu"><a href="{{ route('shipments.index') }}">Kembali ke Shipment List</a></p>

</body>
</html>
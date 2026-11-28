<!DOCTYPE html>
<html>
<head>
    <title>Shipment Directory</title>
    <link rel="stylesheet" href="{{ asset('IntanStyleSheet.css') }}">
</head>
<body>

    <h1>Shipment List</h1>

    <table>
        <thead>
            <tr>
                <th>Tracking #</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Service</th>
                <th>Weight</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($shipments->isEmpty())
            <tr>
                <td colspan="6">Belum ada data.</td>
            </tr>
            @else
                @foreach ($shipments as $row)
                <tr>
                    <td>{{ $row->tracking_number }}</td>
                    <td>{{ $row->sender }}</td>
                    <td>{{ $row->receiver }}</td>
                    <td>{{ $row->service }}</td>
                    <td>{{ (float) $row->weight }} kg</td>
                    <td>
                        <a href="{{ route('shipments.edit', $row->id) }}">Edit</a> |
                        <form action="{{ route('shipments.destroy', $row->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; padding:0; color:#6baed6; font-weight:bold; font-family:inherit; font-size:inherit; cursor:pointer; text-decoration:underline;">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <p class="menu"><a href="{{ route('shipments.create') }}">Tambah Shipment</a></p>

</body>
</html>
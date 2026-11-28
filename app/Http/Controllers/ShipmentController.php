<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function index()
    {
        $shipments = Shipment::orderBy('id', 'desc')->get();
        return view('shipments.index', compact('shipments'));
    }

    public function create()
    {
        return view('shipments.create');
    }

    public function store(Request $request)
    {
        $tracking = trim((string) $request->input('tracking_number'));
        $sender   = trim((string) $request->input('sender'));
        $receiver = trim((string) $request->input('receiver'));
        $service  = trim((string) $request->input('service'));
        $weight   = (float) str_replace(',', '.', (string) $request->input('weight'));

        if ($tracking === '' || $sender === '' || $receiver === '' || $service === '' || $weight <= 0) {
            return redirect()->route('shipments.create')
                ->withInput()
                ->with('error', 'Semua kolom wajib diisi, berat harus berupa angka.');
        }

        try {
            Shipment::create([
                'tracking_number' => $tracking,
                'sender' => $sender,
                'receiver' => $receiver,
                'service' => $service,
                'weight' => $weight,
            ]);

            return redirect()->route('shipments.index');
        } catch (QueryException $e) {
            $pesan = str_contains(strtolower($e->getMessage()), 'unique')
                ? 'Tracking number sudah terdaftar.'
                : 'Gagal menyimpan data.';

            return redirect()->route('shipments.create')
                ->withInput()
                ->with('error', $pesan);
        }
    }

    public function edit($id)
    {
        $shipment = Shipment::find($id);

        if (!$shipment) {
            return redirect()->route('shipments.index');
        }

        $layanan = ['Standard Ground', 'Next-Day Express', 'Cold Chain (Refrigerated)'];

        return view('shipments.edit', compact('shipment', 'layanan'));
    }

    public function update(Request $request, $id)
    {
        $shipment = Shipment::find($id);

        if (!$shipment) {
            return redirect()->route('shipments.index');
        }

        $tracking = trim((string) $request->input('tracking_number'));
        $sender   = trim((string) $request->input('sender'));
        $receiver = trim((string) $request->input('receiver'));
        $service  = trim((string) $request->input('service'));
        $weight   = (float) str_replace(',', '.', (string) $request->input('weight'));

        if ($tracking === '' || $sender === '' || $receiver === '' || $service === '' || $weight <= 0) {
            return redirect()->route('shipments.edit', $shipment->id)
                ->with('error', 'Semua kolom wajib diisi, berat harus berupa angka.');
        }

        try {
            $shipment->update([
                'tracking_number' => $tracking,
                'sender' => $sender,
                'receiver' => $receiver,
                'service' => $service,
                'weight' => $weight,
            ]);

            return redirect()->route('shipments.index');
        } catch (QueryException $e) {
            $pesan = str_contains(strtolower($e->getMessage()), 'unique')
                ? 'Tracking number sudah dipakai data lain.'
                : 'Gagal mengubah data.';

            return redirect()->route('shipments.edit', $shipment->id)
                ->with('error', $pesan);
        }
    }

    public function destroy($id)
    {
        $shipment = Shipment::find($id);

        if ($shipment) {
            $shipment->delete();
        }

        return redirect()->route('shipments.index');
    }
}
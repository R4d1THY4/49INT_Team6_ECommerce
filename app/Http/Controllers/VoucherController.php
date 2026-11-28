<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    // Replaces DataDisplay.php SELECT query
    public function index()
    {
        $vouchers = Voucher::all();
        return view('radit_vouchers.index', compact('vouchers'));
    }

    // Opens empty form for creating a new voucher
    public function create()
    {
        return view('radit_vouchers.form');
    }

    // Replaces InputData.php INSERT query
    public function store(Request $request)
    {
        Voucher::create($request->all());
        return redirect()->route('vouchers.index');
    }

    // Opens pre-filled form for editing an existing voucher
    public function edit(Voucher $voucher)
    {
        return view('radit_vouchers.form', compact('voucher'));
    }

    // Replaces InputData.php UPDATE query
    public function update(Request $request, Voucher $voucher)
    {
        $voucher->update($request->all());
        return redirect()->route('vouchers.index');
    }

    // Replaces DataDisplay.php DELETE action
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('vouchers.index');
    }
}
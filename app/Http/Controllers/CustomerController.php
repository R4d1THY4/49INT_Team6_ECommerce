<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('shaby_customers.index');
    }

    public function store(Request $request)
    {
        // Contoh Role Access Control: Batasi jika bukan admin (opsional jika sudah pakai auth)
        /*
        if (auth()->check() && auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        */

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'status' => $request->status,
            'address' => $request->address,
            'role' => $request->role ?? 'customer', // Menyimpan role, default ke 'customer'
        ]);

        return redirect()->route('customers.index')->with('success', 'Customer successfully added!');
    }

    public function directory()
    {
        $customers = Customer::all();
        return view('shaby_customers.customer_directory', compact('customers'));
    }

    public function shipping()
    {
        $customers = Customer::all();
        return view('shaby_customers.shipping_directory', compact('customers'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('shaby_customersedit_customer', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'status' => $request->status,
            'address' => $request->address,
            'role' => $request->role ?? $customer->role,
        ]);

        return redirect()->route('customers.directory')->with('success', 'Customer successfully updated!');
    }

    public function destroy($id)
    {
        // Role Access Control: Hanya Admin yang boleh menghapus data
        /*
        if (auth()->check() && auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak! Hanya admin yang dapat menghapus data.');
        }
        */

        Customer::findOrFail($id)->delete();
        return redirect()->route('customers.directory')->with('success', 'Customer successfully deleted!');
    }

    public function resetAll()
    {
        // Role Access Control: Hanya Admin yang boleh mereset semua data
        /*
        if (auth()->check() && auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak! Hanya admin yang dapat mereset data.');
        }
        */

        Customer::truncate();
        return redirect()->back()->with('success', 'All data successfully cleared!');
    }
}
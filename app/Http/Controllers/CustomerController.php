<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verify;
use App\Models\Order;

class CustomerController extends Controller
{
    // public function customerStatus(Request $request)
    // {
    //     $verifies = Order::where('id', auth()->id())
    //         ->when($request->bulan, function ($query) use ($request) {
    //             return $query->whereMonth('created_at', $request->bulan);
    //         })
    //         ->when($request->tahun, function ($query) use ($request) {
    //             return $query->whereYear('created_at', $request->tahun);
    //         })
    //         ->when($request->status, function ($query) use ($request) {
    //             return $query->where('status', $request->status);
    //         })
    //         ->latest()
    //         ->paginate(10);
    //     return view('customers.status', compact('verifies'));
    // }
    // Handle bagian status untuk user/customer
    public function status(Request $request)
    {
        $email = $request->email; 

        $verifies = \App\Models\Riwayat::where('email', auth()->user()->email)->latest()->get();
        return view('customers.status', compact('verifies'));
    }
}

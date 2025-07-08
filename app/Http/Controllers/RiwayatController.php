<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $query = Riwayat::query();

        // Filter bulan
        if ($request->has('bulan') && $request->bulan != '') {
            $query->whereMonth('created_at', $request->bulan);
        }

        // Filter tahun
        if ($request->has('tahun') && $request->tahun != '') {
            $query->whereYear('created_at', $request->tahun);
        }

        // Filter status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $histories = $query->latest()->paginate(10)->appends([
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'status' => $request->status
        ]);

        return view('admin.history', ['riwayats' => $histories]);
    }
    public function uploadInvoice(Request $request, $id)
    {
        $request->validate([
            'invoice_id' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        $riwayat = Riwayat::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('invoice')) {
            $path = $request->file('invoice')->store('invoices');
            $riwayat->invoice_path = $path;
        }

        // Save invoice details
        $riwayat->invoice_id = $request->invoice_id;
        $riwayat->total_price = $request->total_price;
        $riwayat->save();

        return redirect()->back()->with('success', 'Invoice berhasil disimpan');
        
    }
    // admin bisa komen.ngasih notes ke tabel status user
    public function updateNotes(Request $request, $id)
    {
        $request->validate([
            'admin_notes' => 'nullable|string', // Validasi untuk catatan admin
        ]);

        $riwayat = Riwayat::findOrFail($id);
        $riwayat->admin_notes = $request->admin_notes;
        $riwayat->save();

        return redirect()->back()->with('success', 'Catatan admin berhasil diperbarui.');
    }
}

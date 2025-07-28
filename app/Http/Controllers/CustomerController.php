<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verify;
use App\Models\Order;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class CustomerController extends Controller
{
    public function status(Request $request)
    {
        $verifies = Riwayat::where('email', auth()->user()->email)->latest()->get();
        return view('customers.status', compact('verifies'));
    }

    // Handle download invoice untuk customer
    public function downloadInvoice($id)
    {
        try {
            // Ambil data riwayat berdasarkan ID dan pastikan milik user yang login
            $riwayat = Riwayat::where('id', $id)
                ->where('email', auth()->user()->email)
                ->firstOrFail();

            // Pastikan file invoice ada
            if (!$riwayat->invoice_path) {
                return redirect()->back()->with('error', 'Invoice tidak tersedia');
            }

            // Karena admin menggunakan public storage, kita akses dari public
            $filePath = public_path('storage/' . $riwayat->invoice_path);
            
            // Cek apakah file ada
            if (!file_exists($filePath)) {
                return redirect()->back()->with('error', 'File invoice tidak ditemukan');
            }

            // Generate nama file untuk download
            $fileName = 'Invoice_' . $riwayat->verify_id . '_' . str_replace(' ', '_', $riwayat->nama_lengkap) . '.pdf';

            // Download file
            return Response::download($filePath, $fileName, [
                'Content-Type' => 'application/pdf',
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Invoice tidak ditemukan atau tidak memiliki akses');
        } catch (\Exception $e) {
            \Log::error('Error download invoice: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunduh invoice');
        }
    }

    // Method tambahan untuk view invoice (buka di tab baru)
    public function viewInvoice($id)
    {
        try {
            $riwayat = Riwayat::where('id', $id)
                ->where('email', auth()->user()->email)
                ->firstOrFail();

            if (!$riwayat->invoice_path) {
                return redirect()->back()->with('error', 'Invoice tidak tersedia');
            }

            $filePath = public_path('storage/' . $riwayat->invoice_path);
            
            if (!file_exists($filePath)) {
                return redirect()->back()->with('error', 'File invoice tidak ditemukan');
            }

            return Response::file($filePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error view invoice: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuka invoice');
        }
    }
}

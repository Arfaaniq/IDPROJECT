<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        try {
            // Validasi input
            $request->validate([
                'invoice_id' => 'required|string|max:100',
                'total_price' => 'required|numeric|min:0',
                'invoice_file' => 'nullable|file|mimes:pdf|max:5120' // Max 5MB
            ]);

            // Cari riwayat berdasarkan ID
            $riwayat = Riwayat::findOrFail($id);

            // Prepare data untuk update
            $updateData = [
                'invoice_id' => $request->invoice_id,
                'total_price' => $request->total_price
            ];

            // Handle file upload jika ada
            if ($request->hasFile('invoice_file')) {
                // Hapus file lama jika ada
                if ($riwayat->invoice_path && Storage::exists($riwayat->invoice_path)) {
                    Storage::delete($riwayat->invoice_path);
                }

                // Upload file baru
                $file = $request->file('invoice_file');
                $fileName = 'invoice_' . $riwayat->verify_id . '_' . time() . '.pdf';
                $filePath = $file->storeAs('invoices', $fileName, 'public'); // Menggunakan public storage

                $updateData['invoice_path'] = $filePath;
            }

            // Update data riwayat
            $riwayat->update($updateData);

            return redirect()->back()->with('success', 'Invoice berhasil ' .
                ($riwayat->wasRecentlyCreated ? 'dibuat' : 'diupdate') . '!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa kembali input Anda.');
        } catch (\Exception $e) {
            \Log::error('Error upload invoice: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupload invoice. Silakan coba lagi.');
        }
    }
    // admin bisa komen.ngasih notes ke tabel status user
    public function updateAdminNotes(Request $request, $id)
    {
        try {
            $request->validate([
                'admin_notes' => 'required|string|max:1000'
            ]);

            $riwayat = Riwayat::findOrFail($id);
            $riwayat->update([
                'admin_notes' => $request->admin_notes
            ]);

            return redirect()->back()->with('success', 'Catatan admin berhasil diupdate!');
        } catch (\Exception $e) {
            \Log::error('Error update admin notes: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate catatan.');
        }
    }
    public function deleteInvoice($id)
    {
        try {
            $riwayat = Riwayat::findOrFail($id);

            // Hapus file jika ada
            if ($riwayat->invoice_path && Storage::exists($riwayat->invoice_path)) {
                Storage::delete($riwayat->invoice_path);
            }

            // Reset invoice data
            $riwayat->update([
                'invoice_id' => null,
                'total_price' => null,
                'invoice_path' => null
            ]);

            return redirect()->back()->with('success', 'Invoice berhasil dihapus!');
        } catch (\Exception $e) {
            \Log::error('Error delete invoice: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus invoice.');
        }
    }
    public function downloadLaporanBulanIni(Request $request)
    {
        $bulan = $request->input('bulan', now()->format('Y-m'));

        $riwayats = \App\Models\Riwayat::whereYear('tanggal_temu', date('Y', strtotime($bulan)))
            ->whereMonth('tanggal_temu', date('m', strtotime($bulan)))
            ->orderBy('tanggal_temu', 'asc')
            ->get();

        $pdf = Pdf::loadView('laporan.bulanan', [
            'riwayats' => $riwayats,
            'bulan' => $bulan
        ])->setPaper('A4', 'landscape');

        $filename = 'laporan_konsultasi_' . date('F_Y', strtotime($bulan)) . '.pdf';

        return $pdf->download($filename); // akan langsung download
    }
}

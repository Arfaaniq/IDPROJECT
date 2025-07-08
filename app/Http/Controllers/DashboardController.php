<?php

namespace App\Http\Controllers;

use App\Models\Verify;
use App\Models\Riwayat;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $currentYear = $request->input('year', date('Y'));
        $currentMonth = $request->input('month', date('m'));

        $countMenunggu = Verify::where('status', 'Menunggu')->count();
        $countDiterima = Verify::where('status', 'Diterima')->count();
        $countDitolak = Verify::where('status', 'Ditolak')->count();
        $countOnProgress = Verify::where('status', 'On Progress')->count();

        // Query untuk Riwayat yang statusnya "Selesai"
        $querySelesai = Riwayat::where('status', 'Selesai');

        // Filter berdasarkan bulan dan tahun jika ada
        // Menggunakan 'created_at' sebagai tanggal invoice. Jika ada kolom 'invoice_date', gunakan itu.
        if ($currentMonth && $currentMonth != '') {
            $querySelesai->whereMonth('created_at', $currentMonth);
        }
        if ($currentYear && $currentYear != '') {
            $querySelesai->whereYear('created_at', $currentYear);
        }


        $countSelesai = $querySelesai->count();
        $totalInvoiceAmount = $querySelesai->sum('total_price'); // Menggunakan total_price

        // Untuk total semua janji temu (verifikasi + riwayat)
        $countTotal = Riwayat::count();

        $verify = Verify::latest()->take(5)->get(); // Atur untuk menapilkan di dashboard 5 data saja

        // Untuk daftar bulan/tahun di filter
        // Mengambil tahun dari created_at di tabel Riwayat
        $years = Riwayat::selectRaw('YEAR(created_at) as year')
                        ->groupBy('year')
                        ->orderBy('year', 'desc')
                        ->pluck('year')
                        ->toArray();
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $months[$i] = Carbon::createFromFormat('m', $i)->format('F');
        }

        return view('admin.dashboard', compact(
            'countMenunggu',
            'countDiterima',
            'countDitolak',
            'countOnProgress',
            'countSelesai',
            'countTotal',
            'totalInvoiceAmount',
            'verify',
            'years',
            'months',
            'currentYear',
            'currentMonth'
        ));
    }
    
    public function ShowKalender()
    {
        $currentMonth = Carbon::now()->format('F Y');
        $daysInMonth = Carbon::now()->daysInMonth;
        $firstDayOfMonth = Carbon::now()->startOfMonth()->dayOfWeek;
        
        return view('admin.dashboard', [
            'currentMonth' => $currentMonth,
            'daysInMonth' => $daysInMonth,
            'firstDayOfMonth' => $firstDayOfMonth,
            'today' => Carbon::now()->day
        ]);
    }
}
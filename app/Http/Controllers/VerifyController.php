<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Verify;
use App\Models\Riwayat;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\IdProject;


class VerifyController extends Controller
{
    // page nya, ngatur page nya sampai 10, kalau data nya lebih dari sepuluh akan ke halaman selanjutnya
    public function index(Request $request)
    {

        $filter = $request->query('filter');
        $search = $request->query('search');

        $verifies = Verify::query();
        if ($search) {
            $verifies->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('no_hp', 'like', '%' . $search . '%');
            });
        }
        if ($filter === 'id') {
            $verifies->orderBy('id', 'asc');
        } elseif ($filter === 'Diterima') {
            $verifies->where('status', 'Diterima');
        } elseif ($filter === 'On Progress') {
            // Perbaikan: orderBy('status', 'On Progress') tidak benar, harusnya where
            $verifies->where('status', 'On Progress');
        } elseif ($filter === 'Ditolak') {
            $verifies->where('status', 'Ditolak');
        } elseif ($filter === 'Menunggu') {
            $verifies->where('status', 'Menunggu');
        } else {
            $verifies->latest(); // Default: terbaru
        }

        $verifies = $verifies->paginate(10); // Lakukan paginasi

        return view('admin.verifikasi', compact('verifies'));
    }
    public function dashboard()
    {
        $verifies = Verify::where('status', 'Menunggu')->count();
        return view('admin.dashboard', compact('verifies'));
    }
    // Jika sudah di approve status akan 'diterima'
    public function approve($id)
    {
        $verifies = Verify::findOrFail($id);
        // Pindahkan data ke tabel riwayat sebelum diupdate

        $verifies->status = 'Diterima';
        $verifies->save();

        $this->moveToHistory($verifies, $verifies->status);
        $data = [
            'nama' => $verifies->nama_lengkap,
            'email' => $verifies->email,
            'no_hp' => $verifies->no_hp,
            'tanggal' => $verifies->tanggal_temu,
            'jam' => $verifies->jam_temu,
            'layanan' => $verifies->layanan,
            'status' => 'Diterima',

        ];
        // Mail::to($verifies->email)->send(new IdProject($data));

        return redirect()->back()->with('success', 'Pesanan disetujui dan email terkirim.');
    }
    // Jika direject status akan 'ditolak'
    public function reject($id)
    {
        $verifies = Verify::findOrFail($id);
        $verifies->status = 'Ditolak';
        $verifies->save();
        $this->moveToHistory($verifies, 'Ditolak'); // status sudah sesuai
        // $verifies->delete(); // langsung hapus
        $data = [
            'nama' => $verifies->nama_lengkap,
            'email' => $verifies->email,
            'no_hp' => $verifies->no_hp,
            'tanggal' => $verifies->tanggal_temu,
            'jam' => $verifies->jam_temu,
            'layanan' => $verifies->layanan,
            'status' => 'Ditolak', // Status ini digunakan untuk email/notifikasi
        ];
        // Mail::to($verifies->email)->send(new IdProject($data));

        return redirect()->back()->with('success', 'Pesanan ditolak dan telah dipindahkan ke riwayat.');
    }
    public function onProgress(Request $request, $id)
    {
        $verifies = Verify::findOrFail($id);
        $status = $request->status;

        if ($status === 'On Progress' && $verifies->status === 'Diterima') {
            $verifies->status = 'On Progress'; // ubah dulu status
            $verifies->save();                 // simpan perubahan
            $this->moveToHistory($verifies, $status); // kirim status baru
            $data = [
                'nama' => $verifies->nama_lengkap,
                'email' => $verifies->email,
                'no_hp' => $verifies->no_hp,
                'tanggal' => $verifies->tanggal_temu,
                'jam' => $verifies->jam_temu,
                'layanan' => $verifies->layanan,
                'status' => 'On Progress',
            ];
            // Mail::to($verifies->email)->send(new IdProject($data));

            return redirect()->back()->with('success', 'Pesanan anda sedang dikerjakan');
        } elseif ($status === 'Batal' && in_array($verifies->status, ['Diterima', 'On Progress'])) {
            // Pindahkan data ke tabel riwayat sebelum dibatalkan
            $this->moveToHistory($verifies, 'Batal');

            $verifies->status = 'Batal';
            $verifies->save();

            $data = [
                'nama' => $verifies->nama_lengkap,
                'email' => $verifies->email,
                'no_hp' => $verifies->no_hp,
                'tanggal' => $verifies->tanggal_temu,
                'jam' => $verifies->jam_temu,
                'layanan' => $verifies->layanan,
                'status' => 'Batal',
            ];
            // Mail::to($verifies->email)->send(new IdProject($data));

            return redirect()->back()->with('success', 'Pesanan telah dibatalkan');
        }

        return redirect()->back()->with('error', 'Status tidak valid.');
    }

    // Ini jika pesanan sudah selesai
    public function finish($id)
    {
        $verifies = Verify::findOrFail($id);
        $verifies->status = 'Selesai';
        $verifies->save();

        // Pindahkan data ke tabel riwayat sebelum diupdate
        $this->moveToHistory($verifies, 'Selesai');


        // $verifies->delete();

        $data = [
            'nama' => $verifies->nama_lengkap,
            'email' => $verifies->email,
            'no_hp' => $verifies->no_hp,
            'tanggal' => $verifies->tanggal_temu,
            'jam' => $verifies->jam_temu,
            'layanan' => $verifies->layanan,
            'status' => 'Selesai',
        ];

        // $data->delete();

        return redirect()->back()->with('success', 'Verifikasi diselesaikan');
    }

    public function cancel(Request $request, $id)
    {

        $verifies = Verify::findOrFail($id);
        $verifies->status = 'Batal';
        $verifies->save();

        // Pindahkan data ke tabel riwayat sebelum diupdate
        $this->moveToHistory($verifies, 'Batal');

        // $verifies->delete();

        $data = [
            'nama' => $verifies->nama_lengkap,
            'email' => $verifies->email,
            'no_hp' => $verifies->no_hp,
            'tanggal' => $verifies->tanggal_temu,
            'jam' => $verifies->jam_temu,
            'layanan' => $verifies->layanan,
            'status' => 'Batal',
        ];

        return redirect()->back()->with('success', 'Verifikasi dibatalkan');
    }


    // Fungsi untuk memindahkan data ke tabel riwayat
    private function moveToHistory($verify, $status)
    {
        // dd("ID Verify yang diterima moveToHistory():", $verify->id, "Status:", $status);
        // Cek apakah data sudah ada di riwayat
        $existingHistory = Riwayat::where('verify_id', $verify->id)->first();

        if (!$existingHistory) {
            Riwayat::create([
                'verify_id' => $verify->id,
                'nama_lengkap' => $verify->nama_lengkap,
                'email' => $verify->email,
                'no_hp' => $verify->no_hp,
                'catatan' => $verify->catatan,
                'tanggal_temu' => $verify->tanggal_temu,
                'jam_temu' => $verify->jam_temu,
                'layanan' => $verify->layanan,
                'gambar' => $verify->gambar,
                'status' => $status,
                'user_id' => $verify->user_id,
            ]);
        } else {
            // Update status jika data sudah ada
            $existingHistory->update(['status' => $status]);
        }
    }

    // Halaman riwayat
    public function history(Request $request)
    {
        $filter = $request->query('filter');

        if ($filter === 'id') {
            $histories = Riwayat::orderBy('id', 'asc')->paginate(10);
        } elseif ($filter === 'Diterima') {
            $histories = Riwayat::where('status', 'Diterima')->paginate(10);
        } elseif ($filter === 'On Progress') {
            $histories = Riwayat::where('status', 'On Progress')->paginate(10);
        } elseif ($filter === 'Ditolak') {
            $histories = Riwayat::where('status', 'Ditolak')->paginate(10);
        } elseif ($filter === 'Selesai') {
            $histories = Riwayat::where('status', 'Selesai')->paginate(10);
        } elseif ($filter === 'Batal') {
            $histories = Riwayat::where('status', 'Batal')->paginate(10);
        } else {
            $histories = Riwayat::latest()->paginate(10);
        }

        return view('admin.history', ['riwayats' => $histories]);
    }

    // Atur minimal pesanan layanan
    public function order(Request $request)
    {
        $messages = [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_hp.required' => 'Nomor HP/WA wajib diisi.',
            'gambar.*.image' => 'File harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar yang diperbolehkan: JPG, JPEG, PNG.',
            'gambar.*.max' => 'Ukuran setiap gambar maksimal 5MB.',
            'layanan.required' => 'Pilih setidaknya satu layanan.',
            'layanan.array' => 'Layanan harus dalam format array.',
            'layanan.max' => 'Anda hanya dapat memilih maksimal 3 layanan.',
            'captcha.required' => 'Anda harus mencentang "Saya bukan robot".',
            'captcha.accepted' => 'Anda harus mencentang "Saya bukan robot".',
        ];

        // Validasi input dari customer
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'tanggal_temu' => 'nullable|date', // Tambahkan nullable jika tidak wajib
            'jam_temu' => 'nullable|date_format:H:i', // Tambahkan nullable jika tidak wajib
            'layanan' => 'required|array|max:3', // Wajib dipilih, maksimal 3
            'layanan.*' => 'string', // Pastikan setiap item adalah string
            'gambar' => 'nullable|array', // Gambar tidak wajib, tapi jika ada harus array
            'gambar.*' => 'image|mimes:jpg,jpeg,png|max:5120', // Validasi untuk setiap gambar
            'catatan' => 'nullable|string',
            'captcha' => 'required|accepted', // Untuk checkbox "Saya bukan robot"
        ], $messages);

        // Atur gambar saat customer mengupload
        $gambarPaths = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $image) {
                $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/', '', $image->getClientOriginalName());
                // Pastikan direktori storage/app/public/images sudah ada dan dapat ditulis
                $path = $image->storeAs('public/images', $filename);
                $gambarPaths[] = str_replace('public/', '', $path);
            }
        }

        Verify::create([
            'user_id' => auth()->id(),
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'catatan' => $request->catatan,
            'tanggal_temu' => $request->tanggal_temu,
            'jam_temu' => $request->jam_temu,
            'layanan' => implode(', ', $request->layanan), // Pastikan layanan selalu array
            'gambar' => !empty($gambarPaths) ? implode(',', $gambarPaths) : null,
            'status' => 'Menunggu', // Pastikan status awal adalah Menunggu
        ]);

        return redirect()->back()->with('success', 'Permintaan berhasil dikirim!');
    }
    public function showOrderForm()
    {
        return view('orderservice'); // Ganti dengan nama file blade Anda
    }
}

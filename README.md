# IDPROJECT - Aplikasi Pemesanan dan Verifikasi Layanan

Aplikasi berbasis Laravel yang digunakan untuk pemesanan layanan oleh pelanggan, dengan sistem verifikasi oleh admin dan pelacakan status layanan hingga selesai.

## Fitur Utama

### Untuk Pelanggan
- Registrasi dan Login
- Melihat halaman About, Service, Portofolio, Blog
- Pemesanan layanan melalui form janji temu
- Konsultasi gratis
- Melihat status pemesanan
- Pilih bahasa (Indonesia & Inggris)
- Logout

### Untuk Admin
- Verifikasi pemesanan layanan (Approve / Reject)
- Kelola status (Diterima, On Progress, Selesai, Batal)
- Riwayat pesanan
- Unduh laporan (PDF) per bulan atau tahun
- Dashboard monitoring

### Untuk Pengunjung
- Menjelajahi halaman publik (About Us, Service, Portofolio, Blog, Instagram Embed)
- Melihat informasi kontak

## Teknologi yang Digunakan
- Laravel 10.x
- PHP 8.x
- MySQL
- Blade Template Engine
- Bootstrap 5
- Vite (untuk asset bundling)

## Instalasi

### 1. Clone Repositori
```bash
git clone https://github.com/Arfaaniq/IDPROJECT.git
cd IDPROJECT

Need to:
composer install
npm install && npm run dev
php artisan migrate --seed

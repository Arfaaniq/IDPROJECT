<h2>Halo {{ $d['nama'] }},</h2>

@if ($d['status'] === 'Diterima')
    <p>Pesanan janji temu Anda telah <strong>disetujui</strong>.</p>
@elseif ($d['status'] === 'Ditolak')
    <p>Maaf, pesanan janji temu Anda telah <strong>ditolak</strong>.</p>
@endif

<p><strong>Detail Pesanan:</strong></p>
<ul>
    <li>Email: {{ $d['email'] }}</li>
    <li>No HP: {{ $d['no_hp'] }}</li>
    <li>Layanan: {{ $d['layanan'] }}</li>
    <li>Tanggal: {{ $d['tanggal'] }}</li>
    <li>Jam: {{ $d['jam'] }}</li>
</ul>
<p>Terima kasih.</p>

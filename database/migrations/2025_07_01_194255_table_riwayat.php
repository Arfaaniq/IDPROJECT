<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('verify_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->text('catatan')->nullable();
            $table->date('tanggal_temu')->nullable();
            $table->time('jam_temu')->nullable();
            $table->string('layanan')->nullable();
            $table->text('gambar')->nullable();
            $table->string('invoice_id')->nullable();
            $table->decimal('total_price', 12, 2)->nullable();
            $table->enum('status', ['Menunggu', 'Diterima', 'On Progress', 'Selesai', 'Ditolak', 'Batal'])->default('Menunggu');
            $table->string('invoice_path')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->foreign('verify_id')->references('id')->on('verify')->onDelete('restrict');
            $table->foreign('user_id')->references('user_id')->on('verify')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat');
    }
};
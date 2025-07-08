<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('verify', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('no_hp', 20);
            $table->text('catatan')->nullable();
            $table->date('tanggal_temu')->nullable();
            $table->time('jam_temu')->nullable();
            $table->string('layanan')->nullable();
            $table->text('gambar')->nullable();
            $table->enum('status', ['Menunggu', 'Diterima', 'On Progress', 'Selesai', 'Ditolak', 'Batal'])->default('Menunggu');
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('verify');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('pengembalians', function (Blueprint $table) {
        $table->id();
        $table->string('nama_lengkap');
        $table->string('instansi')->nullable();
        $table->string('divisi')->nullable();
        $table->string('no_hp')->nullable();

        $table->string('nama_barang');
        $table->date('tanggal_pinjam');
        $table->date('tanggal_kembali');
        $table->string('kondisi_barang');
        $table->string('foto_pinjam')->nullable();
        $table->string('foto_kembali')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalians');
    }
};

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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_id')->nullable()->index('fk_barang_to_surat');
            $table->string('jenis_barang');
            $table->string('nama_barang');
            $table->text('uraian_masalah');
            $table->string('keterangan');
            $table->string('biaya')->nullable()->default('Pending');
            $table->string('status')->nullable()->default('Pending');
            $table->string('status_manager')->nullable()->default('Pending');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};

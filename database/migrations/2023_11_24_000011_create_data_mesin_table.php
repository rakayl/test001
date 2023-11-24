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
        Schema::create('data_mesins', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mesin')->nullable();
            $table->string('tahun_mesin')->nullable();
            $table->string('nama_kategori')->nullable();
            $table->string('nama_klasifikasi')->nullable();
            $table->string('klas_mesin')->nullable();
            $table->string('kode_jenis')->nullable();
            $table->string('type_mesin')->nullable();
            $table->string('merk_mesin')->nullable();
            $table->string('spek_min')->nullable();
            $table->string('spek_max')->nullable();
            $table->string('lok_ws')->nullable();
            $table->string('kapasitas')->nullable();
            $table->string('pabrik')->nullable();
            $table->string('gambar_mesin')->nullable();
            $table->tinyInteger('is_approved')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_mesins');
    }
};

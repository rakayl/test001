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
        Schema::create('klasmesins', function (Blueprint $table) {
            $table->id();
            $table->integer('kategorimesin_id')->unsigned();
            $table->string('kode_klasifikasi')->nullable();
            $table->string('nama_klasifikasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasmesins');
    }
};

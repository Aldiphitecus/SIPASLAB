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
        Schema::create('jenis_tes', function (Blueprint $table) {
            $table->id('id_tes');
            $table->string('nama_tes', '100');
            $table->text('deskripsi_tes');
            $table->integer('biaya');
            $table->integer('jasa_dokter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_tes');
    }
};

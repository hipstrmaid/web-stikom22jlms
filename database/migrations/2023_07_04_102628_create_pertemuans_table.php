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
        Schema::create('pertemuans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matkul_id');
            $table->foreign('matkul_id')->references('id')->on('matkuls');
            $table->string('judul_pertemuan');
            $table->text('deskripsi');
            $table->string('video_url')->nullable();
            $table->string('gambar');
            $table->string('instruksi');
            // $table->unsignedBigInteger('file_id');
            // $table->foreign('file_id')->references('id')->on('files');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertemuans');
    }
};

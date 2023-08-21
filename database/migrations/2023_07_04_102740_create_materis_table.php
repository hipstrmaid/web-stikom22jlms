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
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('pertemuan_id');
            // $table->string('instruksi');
            // $table->unsignedBigInteger('file_id')->nullable();
            // // $table->string('tugas_id')->nullable();
            // $table->foreign('pertemuan_id')->references('id')->on('pertemuans');
            // $table->foreign('file_id')->references('id')->on('files');
            // // $table->foreign('tugas_id')->references('id')->on('tugas');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};

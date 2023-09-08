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
        Schema::create('pengumpulan_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengumpulan_id');
            $table->foreign('pengumpulan_id')->references('id')->on('pengumpulans');
            $table->string('path_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulan_files');
    }
};

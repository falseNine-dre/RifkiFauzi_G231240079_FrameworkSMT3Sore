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
        Schema::create('progdis', function (Blueprint $table) {
            $table->increments('id_progdi');   // <-- perbaikan di sini
            $table->string('nm_fakultas');
            $table->string('nm_progdi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progdis');
    }
};

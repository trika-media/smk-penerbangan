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
        Schema::create('periode_pendaftarans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('tanggal_berlaku_awal');
            $table->date('tanggal_berlaku_akhir');
            $table->integer('gelombang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periode_pendaftarans');
    }
};

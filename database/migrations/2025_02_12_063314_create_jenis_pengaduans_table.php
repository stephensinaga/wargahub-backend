<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Jalankan migrasi.
     */
    public function up()
    {
        Schema::create('jenis_pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down()
    {
        Schema::dropIfExists('jenis_pengaduans');
    }
};

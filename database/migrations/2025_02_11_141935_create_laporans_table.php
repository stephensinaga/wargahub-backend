<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (!Schema::hasTable('laporans')) {
            Schema::create('laporans', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->string('category');
                $table->string('photo_1')->nullable();
                $table->string('photo_2')->nullable();
                $table->string('photo_3')->nullable();
                $table->text('description')->nullable();
                $table->decimal('latitude', 10, 7);
                $table->decimal('longitude', 10, 7);
                $table->string('address');
                $table->date('tanggal');
                $table->enum('status', ['proses', 'diterima', 'ditolak']);
                $table->timestamps();
            });
        }
    }
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
};

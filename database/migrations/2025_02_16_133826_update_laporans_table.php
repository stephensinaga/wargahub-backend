<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLaporansTable extends Migration
{
    /**
     * Jalankan migration untuk menambahkan kolom jika belum ada.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laporans', function (Blueprint $table) {
            if (!Schema::hasColumn('laporans', 'category')) {
                $table->string('category')->after('judul');
            }
            if (!Schema::hasColumn('laporans', 'photo_1')) {
                $table->string('photo_1')->nullable()->after('category');
            }
            if (!Schema::hasColumn('laporans', 'photo_2')) {
                $table->string('photo_2')->nullable();
            }
            if (!Schema::hasColumn('laporans', 'photo_3')) {
                $table->string('photo_3')->nullable();
            }
        });
    }

    /**
     * Rollback migration dengan menghapus kolom.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laporans', function (Blueprint $table) {
            if (Schema::hasColumn('laporans', 'category')) {
                $table->dropColumn('category');
            }
            if (Schema::hasColumn('laporans', 'photo_1')) {
                $table->dropColumn('photo_1');
            }
            if (Schema::hasColumn('laporans', 'photo_2')) {
                $table->dropColumn('photo_2');
            }
            if (Schema::hasColumn('laporans', 'photo_3')) {
                $table->dropColumn('photo_3');
            }
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('petugas')) {
            Schema::create('petugas', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('email');
                $table->string('password');
                $table->enum('level', ['admin', 'operator'])->default('operator');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}

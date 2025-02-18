<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('provinsis')) {
            Schema::create('provinsis', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('provinsis');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_gizi', function (Blueprint $table) {
            $table->increments('id_status_gizi');
            $table->string('bb_u');
            $table->string('pb_tb_u');
            $table->string('bb_pb_tb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_gizi');
    }
};

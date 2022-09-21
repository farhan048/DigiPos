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
        Schema::create('posyandu', function (Blueprint $table) {
            $table->id();
            $table->char('nama_posyandu',50); 
            $table->char('rt',5)->nullable(); 
            $table->char('rw',5); 
            $table->unsignedInteger('id_puskesmas');
            $table->foreign('id')->references('id')->on('puskesmas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posyandu');
    }
};

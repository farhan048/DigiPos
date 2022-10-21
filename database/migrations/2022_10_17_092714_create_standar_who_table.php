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
        Schema::create('standar_who', function (Blueprint $table) {
            $table->increments('id_standar_who');
            $table->float('parameter');
            $table->enum('jk',['Laki-Laki', 'Perempuan']);
            $table->string('kategori');
            $table->float('sd_min_tiga');
            $table->float('sd_min_dua');
            $table->float('sd_min_satu');
            $table->float('median');
            $table->float('sd_plus_tiga');
            $table->float('sd_plus_dua');
            $table->float('sd_plus_satu');
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
        Schema::dropIfExists('standar_who');
    }
};

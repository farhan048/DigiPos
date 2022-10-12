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
        Schema::create('gizi', function (Blueprint $table) {
            $table->string('no_pemeriksaan_gizi',14)->primary();
            $table->string('usia');
            $table->float('pb_tb');
            $table->float('bb');
            $table->date('tgl_periksa');
            $table->string('cara_ukur');
            $table->string('asi_eks');
            $table->string('vit_a');
            $table->string('validasi');
            $table->foreignId('id_status_gizi')->constrained('status_gizi');
            $table->foreignId('id_pasien')->constrained('pasien');
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
        Schema::dropIfExists('gizi');
    }
};

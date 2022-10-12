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
        Schema::create('imunisasi', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_imunisasi');
            $table->foreignId('id_jenis')->constrained('jenis_imunisasi');
            $table->foreignId('id_pasien')->constrained('pasien');
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
        Schema::dropIfExists('imunisasi');
    }
};

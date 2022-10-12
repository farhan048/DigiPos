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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->nullable();
            $table->string('nama_anak');
            $table->date('tgl_lahir');
            $table->enum('jk',['Laki-Laki', 'Perempuan']);
            $table->int('anak_ke',10);
            $table->double('bb_lahir',10);
            $table->double('pb_lahir',10);
            $table->string('kia');
            $table->string('imd');
            $table->foreignId('no_kk')->constrained('keluarga');
            $table->foreignId('id_posyandu')->constrained('posyandu');
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
        Schema::dropIfExists('pasien');
    }
};

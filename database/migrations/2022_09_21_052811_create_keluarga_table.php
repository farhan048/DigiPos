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
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id();
            $table->char('no_kk',16);
            $table->char('nik_ayah',16);
            $table->char('nik_ibu',16);
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->char('no_telp', 13);
            $table->enum('status_ekonomi', ['1', '2'])->nullable();
            $table->text('alamat');
            $table->foreignId('id_desa')->constrained('desa');
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
        Schema::dropIfExists('keluarga');
    }
};

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['Master', 'Bidan', 'Puskesmas', 'Kader','Pimpinan', 'UPTD'])->default('Master');
            $table->char('name',50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->char('phone',13)->nullable();
            $table->char('address',50)->nullable();
            $table->foreignId('id_puskesmas')->nullable()->constrained('puskesmas');
            $table->foreignId('id_posyandu')->nullable()->constrained('posyandu');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

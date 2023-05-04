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
        Schema::create('pelajar_pancasila', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun_ajaran',20);
            $table->string('kelas',5);
            $table->string('siswa',255);
            $table->string('b1c1',255);
            $table->string('b1c2',255);
            $table->string('b2c1',255);
            $table->string('b2c2',255);
            $table->string('b3c1',255);
            $table->string('b3c2',255);
            $table->string('b4c1',255);
            $table->string('b4c2',255);
            $table->string('b5c1',255);
            $table->string('b5c2',255);
            $table->string('b6c1',255);
            $table->string('b6c2',255);
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
        Schema::dropIfExists('pelajar_pancasila');
    }
};

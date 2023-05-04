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
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id');
            $table->string('nama_ayah', 255)->nullable()->default('-');
            $table->string('nama_ibu', 255)->nullable()->default('-');
            $table->string('pendidikan_ayah', 20);
            $table->string('pendidikan_ibu', 20);
            $table->string('pekerjaan_ayah', 255)->nullable()->default('-');
            $table->string('pekerjaan_ibu', 255)->nullable()->default('-');
            $table->string('nama_wali', 255)->nullable()->default('-');
            $table->string('hubungan_wali', 100)->nullable()->default('-');
            $table->string('pendidikan_wali', 20);
            $table->string('pekerjaan_wali', 255)->nullable()->default('-');
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
        Schema::dropIfExists('parents');
    }
};

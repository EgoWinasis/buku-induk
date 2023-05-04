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
        Schema::create('meninggalkan_sekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id');
            // 
            $table->string('thn_tamat', 50)->nullable();
            $table->string('no_ijazah', 255)->nullable();
            $table->string('lanjut_sekolah_tamat', 255)->nullable();
            //    
            $table->string('dari_tingkat', 5)->nullable();
            $table->string('ke_tingkat', 5)->nullable();
            $table->string('lanjut_sekolah_pindah', 255)->nullable();
            // 
            $table->string('tgl_keluar_sekolah', 50)->nullable();
            $table->string('alasan_keluar_sekolah', 255)->nullable();

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
        Schema::dropIfExists('meninggalkan_sekolah');
    }
};

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
        Schema::create('tanda_tangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun_ajaran',20);
            $table->string('kelas',5);
            $table->string('siswa',255);
            // 
            $table->string('kepsek',255)->nullable();
            $table->string('nip_kepsek',20)->nullable();
            $table->string('barcode_kepsek',100)->nullable();
            // 
            $table->string('wali_kelas',255)->nullable();
            $table->string('nip_wali_kelas',20)->nullable();
            $table->string('barcode_wali_kelas',100)->nullable();
            
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
        Schema::dropIfExists('tanda_tangan');
    }
};

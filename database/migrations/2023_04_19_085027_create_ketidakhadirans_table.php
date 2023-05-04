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
        Schema::create('ketidakhadiran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun_ajaran',20);
            $table->string('kelas',5);
            $table->string('siswa',255);
            // 
            $table->string('sakit',255)->nullable();
            $table->string('izin',255)->nullable();
            $table->string('tanpa_keterangan',255)->nullable();

            
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
        Schema::dropIfExists('ketidakhadiran');
    }
};

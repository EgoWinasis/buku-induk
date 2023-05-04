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
        Schema::create('progress_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id');
            $table->string('asal_sekolah', 100)->nullable()->default('-');
            $table->string('nama_tk', 100)->nullable()->default('-');
            $table->string('tgl_sttb', 50)->nullable()->default('0000-00-00');
            $table->string('no_sttb', 100)->nullable()->default('-');
            $table->string('asal_sekolah_pindah', 100)->nullable()->default('-');
            $table->string('tingkat_sekolah_pindah', 2);
            $table->string('tgl_diterima', 20)->nullable()->default('0000-00-00');
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
        Schema::dropIfExists('progress_students');
    }
};

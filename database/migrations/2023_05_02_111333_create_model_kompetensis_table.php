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
        Schema::create('kompetensi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_siswa',20);
            // 
            $table->string('mapel_1',255)->nullable();
            $table->string('ck_1_1',255)->nullable();
            $table->string('ck_1_2',255)->nullable();
            // 
            $table->string('mapel_2',255)->nullable();
            $table->string('ck_2_1',255)->nullable();
            $table->string('ck_2_2',255)->nullable();
            // 
            $table->string('mapel_3',255)->nullable();
            $table->string('ck_3_1',255)->nullable();
            $table->string('ck_3_2',255)->nullable();
            // 
            $table->string('mapel_4',255)->nullable();
            $table->string('ck_4_1',255)->nullable();
            $table->string('ck_4_2',255)->nullable();
            // 
            $table->string('mapel_5',255)->nullable();
            $table->string('ck_5_1',255)->nullable();
            $table->string('ck_5_2',255)->nullable();
            // 
            $table->string('mapel_6',255)->nullable();
            $table->string('ck_6_1',255)->nullable();
            $table->string('ck_6_2',255)->nullable();
            // 
            $table->string('mapel_7',255)->nullable();
            $table->string('kls',3)->nullable();
            $table->string('ck_7_1',255)->nullable();
            $table->string('ck_7_2',255)->nullable();
            
            // 
            $table->string('mapel_8',255)->nullable();
            $table->string('kls_2',3)->nullable();
            $table->string('ck_8_1',255)->nullable();
            $table->string('ck_8_2',255)->nullable();
            
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
        Schema::dropIfExists('kompetensi');
    }
};

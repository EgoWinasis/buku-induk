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
        Schema::create('kesehatan_jasmani', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('siswa_id');
            $table->string('jas_th_1', 20)->nullable();
            $table->string('jas_th_2', 20)->nullable();
            $table->string('jas_th_3', 20)->nullable();
            $table->string('jas_th_4', 20)->nullable();
            $table->string('jas_th_5', 20)->nullable();
            $table->string('jas_th_6', 20)->nullable();
            // 
            $table->string('jas_bb_1', 20)->nullable();
            $table->string('jas_bb_2', 20)->nullable();
            $table->string('jas_bb_3', 20)->nullable();
            $table->string('jas_bb_4', 20)->nullable();
            $table->string('jas_bb_5', 20)->nullable();
            $table->string('jas_bb_6', 20)->nullable();
            // 
            $table->string('jas_tb_1', 20)->nullable();
            $table->string('jas_tb_2', 20)->nullable();
            $table->string('jas_tb_3', 20)->nullable();
            $table->string('jas_tb_4', 20)->nullable();
            $table->string('jas_tb_5', 20)->nullable();
            $table->string('jas_tb_6', 20)->nullable();
            // 
            $table->string('jas_pt_1', 255)->nullable();
            $table->string('jas_pt_2', 255)->nullable();
            $table->string('jas_pt_3', 255)->nullable();
            $table->string('jas_pt_4', 255)->nullable();
            $table->string('jas_pt_5', 255)->nullable();
            $table->string('jas_pt_6', 255)->nullable();
            // 
            $table->string('jas_kj_1', 255)->nullable();
            $table->string('jas_kj_2', 255)->nullable();
            $table->string('jas_kj_3', 255)->nullable();
            $table->string('jas_kj_4', 255)->nullable();
            $table->string('jas_kj_5', 255)->nullable();
            $table->string('jas_kj_6', 255)->nullable();

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
        Schema::dropIfExists('kesehatan_jasmani');
    }
};

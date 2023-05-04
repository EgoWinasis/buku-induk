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
        Schema::create('kenaikan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun_ajaran',20);
            $table->string('kelas',5);
            $table->string('siswa',255);
            // 
            $table->string('status',50)->nullable();
            $table->string('status_kelas',5)->nullable();
            
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
        Schema::dropIfExists('kenaikan');
    }
};

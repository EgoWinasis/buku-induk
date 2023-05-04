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
        Schema::create('pengetahuan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tahun_ajaran',20);
            $table->string('kelas',5);
            $table->string('siswa',255);
            // 
            $table->string('b1c1',255);
            $table->string('b1c2',255);
            $table->string('b1c3',255);
            $table->string('b1c4',255);
            // 
            $table->string('b2c1',255);
            $table->string('b2c2',255);
            $table->string('b2c3',255);
            $table->string('b2c4',255);
            // 
            $table->string('b3c1',255);
            $table->string('b3c2',255);
            $table->string('b3c3',255);
            $table->string('b3c4',255);
            // 
            $table->string('b4c1',255);
            $table->string('b4c2',255);
            $table->string('b4c3',255);
            $table->string('b4c4',255);
            // 
            $table->string('b5c1',255);
            $table->string('b5c2',255);
            $table->string('b5c3',255);
            $table->string('b5c4',255);
            // 
            $table->string('b6c1',255);
            $table->string('b6c2',255);
            $table->string('b6c3',255);
            $table->string('b6c4',255);
            // 
            $table->string('b7c1',255);
            $table->string('b7c2',255);
            $table->string('b7c3',255);
            $table->string('b7c4',255);
            // 
            $table->string('b8c1',255);
            $table->string('b8c2',255);
            $table->string('b8c3',255);
            $table->string('b8c4',255);
            // 
            $table->string('b9c1',255);
            $table->string('b9c2',255);
            $table->string('b9c3',255);
            $table->string('b9c4',255);
            // 
            $table->string('b10c1',255);
            $table->string('b10c2',255);
            $table->string('b10c3',255);
            $table->string('b10c4',255);
            // 
            $table->string('b11c1',255);
            $table->string('b11c2',255);
            $table->string('b11c3',255);
            $table->string('b11c4',255);
            // 
            $table->string('b12c1',255);
            $table->string('b12c2',255);
            $table->string('b12c3',255);
            $table->string('b12c4',255);
            // 
            $table->string('b13c1',255);
            $table->string('b13c2',255);
            $table->string('b13c3',255);
            $table->string('b13c4',255);
            // 
           
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
        Schema::dropIfExists('pengetahuan');
    }
};

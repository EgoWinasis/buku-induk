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
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis', 10)->unique();
            $table->string('nisn', 20)->nullable()->default('-');
            $table->string('nik', 20)->nullable()->default('-');
            $table->string('no_kk', 20)->nullable()->default('-');
            $table->string('nama_lengkap', 255);
            $table->string('nama_panggilan', 255)->nullable()->default('-');
            $table->string('jen_kel', 50)->default('Laki-laki');
            $table->string('tempat_lahir', 100)->nullable()->default('-');
            $table->string('tgl_lahir', 20);
            $table->string('agama', 20);
            $table->string('kewarganegaraan', 100)->nullable()->default('-');
            $table->string('jml_saudara', 10);
            $table->string('bahasa', 100)->nullable()->default('-');
            $table->string('gol_darah', 5);
            $table->string('alamat', 255)->nullable()->default('-');
            $table->string('telepon', 20)->nullable()->default('-');
            $table->string('tempat_tinggal', 100)->nullable()->default('-');
            $table->string('jarak', 5)->nullable()->default('-');
            $table->string('foto_siswa', 255)->default('user_default_profil.png');
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
            // $table->json('orang_tua');
            // $table->json('perkembangan_siswa');
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
        Schema::dropIfExists('students');
    }
};

@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('title', 'Detail Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Detail Siswa : {{$student->nama_lengkap}}</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                {{-- Themes --}}
                <x-adminlte-card title="Foto Siswa" theme="dark" >
                    <img src="{{$student->foto_siswa == "user_default_profil.png" ? asset('storage/images/user_default_profil.png') : asset('storage/images/foto-siswa/'.$student->foto_siswa);}}" class=" img-thumbnail rounded mx-auto d-block">
                </x-adminlte-card>
            </div>
            <div class="col-md-8">
                {{-- Themes --}}
                <x-adminlte-card title="Biodata Siswa" theme="dark" >
                   <table width="100%" >
                       <tr>
                           <td width="30%">NIS</td>
                           <td width="3%">:</td>
                           <td>{{$student->nis}}</td>
                       </tr>
                       <tr>
                           <td width="30%">NISN</td>
                           <td width="3%">:</td>
                           <td>{{$student->nisn == null ? "-" : $student->nisn}}</td>
                       </tr>
                       <tr>
                           <td width="30%">NIK</td>
                           <td width="3%">:</td>
                           <td>{{$student->nik == null ? "-" : $student->nik}}</td>
                       </tr>
                       <tr>
                           <td width="30%">No. KK</td>
                           <td width="3%">:</td>
                           <td>{{$student->no_kk == null ? "-" : $student->no_kk}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nama Lengkap</td>
                           <td width="3%">:</td>
                           <td>{{$student->nama_lengkap}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nama Panggilan</td>
                           <td width="3%">:</td>
                           <td>{{$student->nama_panggilan == null ? "-" : $student->nama_panggilan}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Jenis Kelamin</td>
                           <td width="3%">:</td>
                           <td>{{$student->jen_kel}}</td>
                       </tr>
                       <tr>
                           <td width="30%">TTL</td>
                           <td width="3%">:</td>
                           <td>{{$student->tempat_lahir}}, {{$student->tgl_lahir}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Agama</td>
                           <td width="3%">:</td>
                           <td>{{$student->agama}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Kewarganegaraan</td>
                           <td width="3%">:</td>
                           <td>{{$student->kewarganegaraan == null ? "-" : $student->kewarganegaraan}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Jumlah Saudara Kandung</td>
                           <td width="3%">:</td>
                           <td>{{$student->jml_saudara}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Bahasa Sehari-hari</td>
                           <td width="3%">:</td>
                           <td>{{$student->bahasa == null ? "-" : $student->bahasa}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Golongan Darah</td>
                           <td width="3%">:</td>
                           <td>{{$student->gol_darah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Alamat</td>
                           <td width="3%">:</td>
                           <td>{{$student->alamat == null ? "-" : $student->alamat}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Telepon</td>
                           <td width="3%">:</td>
                           <td>{{$student->telepon == null ? "-" : $student->telepon}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Tempat Tinggal</td>
                           <td width="3%">:</td>
                           <td>{{$student->tempat_tinggal == null ? "-" : $student->tempat_tinggal}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Jarak</td>
                           <td width="3%">:</td>
                           <td>{{$student->jarak == null ? "-" : $student->jarak}} Kilometer</td>
                       </tr>
                   </table>
                </x-adminlte-card>
                {{-- orang tua / wali murid --}}
                <x-adminlte-card title="Orang Tua / Wali Murid" theme="dark" collapsible="collapsed">
                   <table width="100%" >
                       <tr>
                           <td width="30%">Nama Ayah</td>
                           <td width="3%">:</td>
                           <td>{{$orangTua->nama_ayah == null ? "-" : $orangTua->nama_ayah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nama Ibu</td>
                           <td width="3%">:</td>
                           <td>{{$orangTua->nama_ibu == null ? "-" : $orangTua->nama_ibu}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pendidikan Ayah</td>
                           <td width="3%">:</td>
                           <td>{{($orangTua->pendidikan_ayah == "Tidak Sekolah" && $orangTua->nama_ayah == null) ? "-" : $orangTua->pendidikan_ayah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pendidikan Ibu</td>
                           <td width="3%">:</td>
                           <td>{{($orangTua->pendidikan_ibu == "Tidak Sekolah" && $orangTua->nama_ibu == null) ? "-" : $orangTua->pendidikan_ibu}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pekerjaan Ayah</td>
                           <td width="3%">:</td>
                           <td>{{$orangTua->pekerjaan_ayah == null ? "-" : $orangTua->pekerjaan_ayah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pekerjaan Ibu</td>
                           <td width="3%">:</td>
                           <td>{{$orangTua->pekerjaan_ibu == null ? "-" : $orangTua->pekerjaan_ibu}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nama Wali</td>
                           <td width="3%">:</td>
                           <td>{{$orangTua->nama_wali == null ? "-" : $orangTua->nama_wali}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Hubungan Wali</td>
                           <td width="3%">:</td>
                           <td>{{$orangTua->hubungan_wali == null ? "-" : $orangTua->hubungan_wali}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pendidikan Wali</td>
                           <td width="3%">:</td>
                           <td>{{($orangTua->pendidikan_wali == "Tidak Sekolah" && $orangTua->nama_wali == null) ? "-" : $orangTua->pendidikan_wali}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pekerjaan Wali</td>
                           <td width="3%">:</td>
                           <td>{{$orangTua->pekerjaan_wali == null ? "-" : $orangTua->pekerjaan_wali}}</td>
                       </tr>
                      
                   </table>
                </x-adminlte-card>
                {{-- end --}}
                {{-- Perkembangan siswa --}}
                <x-adminlte-card title="Perkembangan Siswa" theme="dark" collapsible="collapsed">
                   <table width="100%" >
                       <tr>
                           <td width="30%">Asal Sekolah</td>
                           <td width="3%">:</td>
                           <td>{{$progresSiswa->asal_sekolah == null ? "-" : $progresSiswa->asal_sekolah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nama TK</td>
                           <td width="3%">:</td>
                           <td>{{$progresSiswa->nama_tk == null ? "-" : $progresSiswa->nama_tk}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Tanggal STTB</td>
                           <td width="3%">:</td>
                           <td>{{$progresSiswa->tgl_sttb == null ? "-" : $progresSiswa->tgl_sttb}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nomor STTB</td>
                           <td width="3%">:</td>
                           <td>{{$progresSiswa->no_sttb == null ? "-" : $progresSiswa->no_sttb}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Asal Sekolah (Pindah)</td>
                           <td width="3%">:</td>
                           <td>{{$progresSiswa->asal_sekolah_pindah == null ? "-" : $progresSiswa->asal_sekolah_pindah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Tingkat Sekolah (Pindah)</td>
                           <td width="3%">:</td>
                           <td>{{($progresSiswa->asal_sekolah_pindah == null && $progresSiswa->tingkat_sekolah_pindah == "1") ? "-" : $progresSiswa->tingkat_sekolah_pindah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Tanggal Diterima</td>
                           <td width="3%">:</td>
                           <td>{{$progresSiswa->tgl_diterima == null ? "-" : $progresSiswa->tgl_diterima}}</td>
                       </tr>
                      
                   </table>
                </x-adminlte-card>
                {{--  --}}
                {{-- Kesehatan siswa --}}
                <x-adminlte-card title="Kesehatan Jasmani" theme="dark" collapsible="collapsed">
                    <div class="table-responsive">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Tahun</th>
                                    <td>{{$kesehatanJasmani->jas_th_1}}</td>
                                    <td>{{$kesehatanJasmani->jas_th_2}}</td>
                                    <td>{{$kesehatanJasmani->jas_th_3}}</td>
                                    <td>{{$kesehatanJasmani->jas_th_4}}</td>
                                    <td>{{$kesehatanJasmani->jas_th_5}}</td>
                                    <td>{{$kesehatanJasmani->jas_th_6}}</td>
                                </tr>
                                <tr>
                                    <th>Berat Badan</th>
                                    <td>{{$kesehatanJasmani->jas_bb_1}} kg</td>
                                    <td>{{$kesehatanJasmani->jas_bb_2}} kg</td>
                                    <td>{{$kesehatanJasmani->jas_bb_3}} kg</td>
                                    <td>{{$kesehatanJasmani->jas_bb_4}} kg</td>
                                    <td>{{$kesehatanJasmani->jas_bb_5}} kg</td>
                                    <td>{{$kesehatanJasmani->jas_bb_6}} kg</td>
                                </tr>
                                <tr>
                                    <th>Tinggi Badan</th>
                                    <td>{{$kesehatanJasmani->jas_tb_1}} cm</td>
                                    <td>{{$kesehatanJasmani->jas_tb_2}} cm</td>
                                    <td>{{$kesehatanJasmani->jas_tb_3}} cm</td>
                                    <td>{{$kesehatanJasmani->jas_tb_4}} cm</td>
                                    <td>{{$kesehatanJasmani->jas_tb_5}} cm</td>
                                    <td>{{$kesehatanJasmani->jas_tb_6}} cm</td>
                                </tr>
                                <tr>
                                    <th>Penyakit</th>
                                    <td>{{$kesehatanJasmani->jas_pt_1}}</td>
                                    <td>{{$kesehatanJasmani->jas_pt_2}}</td>
                                    <td>{{$kesehatanJasmani->jas_pt_3}}</td>
                                    <td>{{$kesehatanJasmani->jas_pt_4}}</td>
                                    <td>{{$kesehatanJasmani->jas_pt_5}}</td>
                                    <td>{{$kesehatanJasmani->jas_pt_6}}</td>
                                </tr>
                                <tr>
                                    <th>Keahlian Jasmani</th>
                                    <td>{{$kesehatanJasmani->jas_kj_1}}</td>
                                    <td>{{$kesehatanJasmani->jas_kj_2}}</td>
                                    <td>{{$kesehatanJasmani->jas_kj_3}}</td>
                                    <td>{{$kesehatanJasmani->jas_kj_4}}</td>
                                    <td>{{$kesehatanJasmani->jas_kj_5}}</td>
                                    <td>{{$kesehatanJasmani->jas_kj_6}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </x-adminlte-card>
                {{--  --}}
                 {{-- Beasiswa siswa --}}
                 <x-adminlte-card title="Beasiswa" theme="dark" collapsible="collapsed">
                    <table width="100%" >
                        <tr>
                            <td width="30%">Jenis Beasiswa</td>
                            <td width="3%">:</td>
                            <td>{{$beasiswa->beasiswa == null? '-' : $beasiswa->beasiswa}}</td>
                        </tr>
                    </table>
                 </x-adminlte-card>
                 {{--  --}}

                  {{-- Perkembangan siswa --}}
                <x-adminlte-card title="Meninggalkan Sekolah" theme="dark" collapsible="collapsed">
                    <table width="100%" >
                        <tr>
                            <th>
                                <h6 class="font-weight-bold">A. Tamat Belajar</h6>
                            </th>
                        </tr>
                        <tr>
                            <td width="30%">Tahun Tamat</td>
                            <td width="3%">:</td>
                            <td>{{$meninggalkanSekolah->thn_tamat == null? '-' : $meninggalkanSekolah->thn_tamat}}</td>
                        </tr>
                        <tr>
                            <td width="30%">Nomor Ijazah / STTB</td>
                            <td width="3%">:</td>
                            <td>{{$meninggalkanSekolah->no_ijazah == null? '-' : $meninggalkanSekolah->no_ijazah}}</td>
                        </tr>
                        <tr>
                            <td width="30%">Melanjutkan Ke Sekolah</td>
                            <td width="3%">:</td>
                            <td>{{$meninggalkanSekolah->lanjut_sekolah_tamat == null? '-' : $meninggalkanSekolah->lanjut_sekolah_tamat}}</td>
                        </tr>
                        <tr >
                            <th class="pt-4">
                                <h6 class="font-weight-bold">B. Pindah Sekolah</h6>
                            </th>
                        </tr>
                        <tr>
                            <td width="30%">Dari Tingkat</td>
                            <td width="3%">:</td>
                            <td>{{($meninggalkanSekolah->lanjut_sekolah_pindah == null && $meninggalkanSekolah->dari_tingkat == "1") ? "-" : $meninggalkanSekolah->dari_tingkat}}</td>
                        </tr>
                        <tr>
                            <td width="30%">Ke Tingkat</td>
                            <td width="3%">:</td>
                            <td>{{ ($meninggalkanSekolah->lanjut_sekolah_pindah == null && $meninggalkanSekolah->ke_tingkat == "1") ? "-" : $meninggalkanSekolah->ke_tingkat}}</td>
                        </tr>
                        <tr>
                            <td width="30%">Ke Sekolah</td>
                            <td width="3%">:</td>
                            <td>{{$meninggalkanSekolah->lanjut_sekolah_pindah == null? '-' : $meninggalkanSekolah->lanjut_sekolah_pindah}}</td>
                        </tr>
                        <tr>
                            <th class="pt-4">
                                <h6 class="font-weight-bold">C. Keluar Sekolah</h6>
                            </th>
                        </tr>
                        <tr>
                            <td width="30%">Tanggal Keluar</td>
                            <td width="3%">:</td>
                            <td>{{$meninggalkanSekolah->tgl_keluar_sekolah == null? '-' : $meninggalkanSekolah->tgl_keluar_sekolah}}</td>
                        </tr>
                        <tr>
                            <td width="30%">Alasan Keluar</td>
                            <td width="3%">:</td>
                            <td>{{$meninggalkanSekolah->alasan_keluar_sekolah == null? '-' : $meninggalkanSekolah->alasan_keluar_sekolah}}</td>
                        </tr>
                       
                    </table>
                 </x-adminlte-card>
                 {{--  --}}
                  {{-- Lain-lain  --}}
                  <x-adminlte-card title="Lain-lain" theme="dark" collapsible="collapsed">
                    <table width="100%" >
                        <tr>
                            <td width="30%">Lain-lain</td>
                            <td width="3%">:</td>
                            <td>{{$lain->lain_lain == null? '-' : $lain->lain_lain}}</td>
                        </tr>
                    </table>
                 </x-adminlte-card>
                 {{--  --}}
            </div>

            <x-adminlte-button class="btn-flat text-light col-md-2 mb-3" onclick="return back();" label="Kembali" theme="primary"
            icon="fas fa-lg fa-arrow-left" />
            <br>

        </div>
        {{-- .row --}}

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop
@section('footer')
<div id="mycredit"><strong> Copyright &copy; <?php echo date('Y');?> Sistem Informasi Buku Induk Siswa - Kampus Mengajar
        Angkatan 5 </div>
@stop

@section('js')
<script type="text/javascript">
    function back() {
        window.location = "{{url('/siswa')}}";
    }
    

</script>
@stop
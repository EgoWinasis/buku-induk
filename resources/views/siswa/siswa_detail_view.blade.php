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
                           <td>{{$student->nama_ayah == null ? "-" : $student->nama_ayah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nama Ibu</td>
                           <td width="3%">:</td>
                           <td>{{$student->nama_ibu == null ? "-" : $student->nama_ibu}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pendidikan Ayah</td>
                           <td width="3%">:</td>
                           <td>{{($student->pendidikan_ayah == "Tidak Sekolah" && $student->nama_ayah == null) ? "-" : $student->pendidikan_ayah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pendidikan Ibu</td>
                           <td width="3%">:</td>
                           <td>{{($student->pendidikan_ibu == "Tidak Sekolah" && $student->nama_ibu == null) ? "-" : $student->pendidikan_ibu}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pekerjaan Ayah</td>
                           <td width="3%">:</td>
                           <td>{{$student->pekerjaan_ayah == null ? "-" : $student->pekerjaan_ayah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pekerjaan Ibu</td>
                           <td width="3%">:</td>
                           <td>{{$student->pekerjaan_ibu == null ? "-" : $student->pekerjaan_ibu}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nama Wali</td>
                           <td width="3%">:</td>
                           <td>{{$student->nama_wali == null ? "-" : $student->nama_wali}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Hubungan Wali</td>
                           <td width="3%">:</td>
                           <td>{{$student->hubungan_wali == null ? "-" : $student->hubungan_wali}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pendidikan Wali</td>
                           <td width="3%">:</td>
                           <td>{{($student->pendidikan_wali == "Tidak Sekolah" && $student->nama_wali == null) ? "-" : $student->pendidikan_wali}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Pekerjaan Wali</td>
                           <td width="3%">:</td>
                           <td>{{$student->pekerjaan_wali == null ? "-" : $student->pekerjaan_wali}}</td>
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
                           <td>{{$student->asal_sekolah == null ? "-" : $student->asal_sekolah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nama TK</td>
                           <td width="3%">:</td>
                           <td>{{$student->nama_tk == null ? "-" : $student->nama_tk}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Tanggal STTB</td>
                           <td width="3%">:</td>
                           <td>{{$student->tgl_sttb == null ? "-" : $student->tgl_sttb}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Nomor STTB</td>
                           <td width="3%">:</td>
                           <td>{{$student->no_sttb == null ? "-" : $student->no_sttb}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Asal Sekolah (Pindah)</td>
                           <td width="3%">:</td>
                           <td>{{$student->asal_sekolah_pindah == null ? "-" : $student->asal_sekolah_pindah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Tingkat Sekolah (Pindah)</td>
                           <td width="3%">:</td>
                           <td>{{($student->asal_sekolah_pindah == null && $student->tingkat_sekolah_pindah == "1") ? "-" : $student->tingkat_sekolah_pindah}}</td>
                       </tr>
                       <tr>
                           <td width="30%">Tanggal Diterima</td>
                           <td width="3%">:</td>
                           <td>{{$student->tgl_diterima == null ? "-" : $student->tgl_diterima}}</td>
                       </tr>
                      
                   </table>
                </x-adminlte-card>
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
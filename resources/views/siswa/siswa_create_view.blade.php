@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('plugins.TempusDominusBs4', true)
@section('title', 'Tambah Data Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Tambah Siswa</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
        <form method="POST" action="/profile">
            @csrf

            <div class="row">


                <!-- Data siswa Collapse -->
                <x-adminlte-card title="Keterangan Siswa" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form siswa --}}
                        {{-- NIS --}}
                        <x-adminlte-input name="nis" label="NIS" placeholder="Nomor Induk Siswa" type="number"
                            fgroup-class="col-md-6" min=1 max=10>
                        </x-adminlte-input>
                        {{-- NISN --}}
                        <x-adminlte-input name="nisn" label="NISN" placeholder="Nomor Induk Siswa Nasional"
                            type="number" fgroup-class="col-md-6" min=1 max=10>
                        </x-adminlte-input>
                        {{-- NIK --}}
                        <x-adminlte-input name="nik" label="NIK" placeholder="Nomor Induk Kependudukan" type="number"
                            fgroup-class="col-md-6" min=1 max=10>
                        </x-adminlte-input>
                        {{-- No. KK --}}
                        <x-adminlte-input name="no_kk" label="No. KK" placeholder="Nomor Kartu Keluarga" type="number"
                            fgroup-class="col-md-6" min=1 max=10>
                        </x-adminlte-input>
                        {{-- nama lengkap --}}
                        <x-adminlte-input name="nama_lengkap" label="Nama Lengkap" placeholder="Nama Lengkap"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- nama panggilan --}}
                        <x-adminlte-input name="nama_panggilan" label="Nama Panggilan" placeholder="Nama Panggilan"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- jenis kelamin --}}
                        <x-adminlte-select name="jenis_kelamin" label="Jenis Kelamin" fgroup-class="col-md-6">
                            <x-adminlte-options :options="['Laki-laki', 'Perempuan']" />
                        </x-adminlte-select>
                        {{-- tempat lahir --}}
                        <x-adminlte-input name="tempat_lahir" label="Tempat Lahir" placeholder="Tempat Lahir"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- tanggal lahir--}}
                        @php
                        $config = ['format' => 'L'];
                        @endphp
                        <x-adminlte-input-date label="Tanggal Lahir" name="tanggal_lahir" :config="$config"
                            placeholder="Tanggal Lahir" fgroup-class="col-md-6">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        {{-- Agama --}}
                        <x-adminlte-select name="agama" label="Agama" fgroup-class="col-md-6">
                            <x-adminlte-options :options="['Islam', 'Kristen','Katolik','Hindu','Budha','Konghucu']" />
                        </x-adminlte-select>
                        {{-- kewarganegaraan --}}
                        <x-adminlte-input name="kewarganegaraan" label="Kewarganegaraan" placeholder="Kewarganegaraan"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- Jumlah Saudara --}}
                        <x-adminlte-select name="jumlah_saudara" label="Jumlah Saudara" fgroup-class="col-md-6">
                            <x-adminlte-options
                                :options="['0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15']" />
                        </x-adminlte-select>
                        {{-- Bahasa Sehari hari --}}
                        <x-adminlte-input name="bahasa_sehari" label="Bahasa Sehari-hari Di Rumah"
                            placeholder="Bahasa Sehari-hari Di rumah" fgroup-class="col-md-6" disable-feedback />
                        {{-- Golongan Darah --}}
                        <x-adminlte-select name="golongan_darah" label="Golongan Darah" fgroup-class="col-md-6">
                            <x-adminlte-options :options="['A','B','AB','O']" />
                        </x-adminlte-select>
                        {{-- Alamat --}}
                        <x-adminlte-input name="alamat" label="Alamat" placeholder="Alamat" fgroup-class="col-md-6"
                            disable-feedback />
                        {{-- Nomor telepon --}}
                        <x-adminlte-input name="telepon" label="Nomor Telepon" placeholder="08934215464" type="number"
                            fgroup-class="col-md-6" min=1 max=10>
                        </x-adminlte-input>
                        {{-- Tempat tinggal --}}
                        <x-adminlte-input name="tempat_tinggal" label="Tempat Tinggal" placeholder="Tempat Tinggal"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- Jarak --}}
                        <x-adminlte-input name="jarak" label="Jarak" placeholder="Kilometer" type="number"
                            fgroup-class="col-md-6" min=1 max=10>
                        </x-adminlte-input>
                        {{-- end input form siswa --}}
                    </div>
                </x-adminlte-card>
                {{--end siswa collapse --}}


                <!-- Data Ortu Collapse -->
                <x-adminlte-card title="Keterangan Orang Tua / Wali Murid" class="col-md-12" theme-mode="full"
                    collapsible="collapsed">
                    <div class="row">
                        {{-- input form orang tua --}}
                        {{-- nama ayah --}}
                        <x-adminlte-input name="nama_ayah" label="Nama Ayah" placeholder="Nama Ayah"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- nama ibu --}}
                        <x-adminlte-input name="nama_ibu" label="Nama Ibu" placeholder="Nama Ibu"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- Pendidikan Ayah --}}
                        <x-adminlte-select name="pendidikan_ayah" label="Pendidikan Ayah" fgroup-class="col-md-6">
                            <x-adminlte-options
                                :options="['Tidak Sekolah','SD/MI','SMP/MTS','SMA/SMK','D1','D2','D3','S1','S2','S3']" />
                        </x-adminlte-select>
                        {{-- Pendidikan Ibu --}}
                        <x-adminlte-select name="pendidikan_ibu" label="Pendidikan Ibu" fgroup-class="col-md-6">
                            <x-adminlte-options
                                :options="['Tidak Sekolah','SD/MI','SMP/MTS','SMA/SMK','D1','D2','D3','S1','S2','S3']" />
                        </x-adminlte-select>

                        {{-- pekerjaan ayah --}}
                        <x-adminlte-input name="pekerjaan_ayah" label="Pekerjaan Ayah" placeholder="Pekerjaan Ayah"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- Pekerjaan Ibu --}}
                        <x-adminlte-input name="pekerjaan_ibu" label="Pekerjaan Ibu" placeholder="Pekerjaan Ibu"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- nama wali --}}
                        <x-adminlte-input name="nama_wali" label="Nama Wali" placeholder="Nama Wali"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- Hubungan wali --}}
                        <x-adminlte-input name="hubungan_wali" label="Hubungan Wali" placeholder="Hubungan Wali"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- Pendidikan Wali --}}
                        <x-adminlte-select name="pendidikan_wali" label="Pendidikan Wali" fgroup-class="col-md-6">
                            <x-adminlte-options
                                :options="['Tidak Sekolah','SD/MI','SMP/MTS','SMA/SMK','D1','D2','D3','S1','S2','S3']" />
                        </x-adminlte-select>
                        {{-- pekerjaan Wali --}}
                        <x-adminlte-input name="pekerjaan_wali" label="Pekerjaan Wali" placeholder="Pekerjaan Wali"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- end input form orang tua --}}
                    </div>
                </x-adminlte-card>
                {{--end data orang tua collapse --}}

                <!-- Data Perkembangan Siswa Collapse -->
                <x-adminlte-card title="Perkembangan Siswa" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form perkembangan siswa --}}

                        <label class="h6 col-md-12">A. Masuk Menjadi Siswa Baru</label>
                        {{-- Asal Sekolah TK--}}
                        <x-adminlte-input name="asal_tk" label="Asal Sekolah" placeholder="Asal Sekolah"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- Nama Taman Kanak-kanak --}}
                        <x-adminlte-input name="nama_tk" label="Nama Taman Kanak-kanak"
                            placeholder="Nama Taman Kanak-kanak" fgroup-class="col-md-6" disable-feedback />
                        {{-- tanggal sttb--}}
                        @php
                        $config = ['format' => 'L'];
                        @endphp
                        <x-adminlte-input-date label="Tanggal STTB" name="tanggal_sttb" :config="$config"
                            placeholder="Tanggal STTB" fgroup-class="col-md-6">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        {{-- Tanggal dan Nomor STTB --}}
                        <x-adminlte-input name="nomor_sttb" label="Nomor STTB" placeholder="Nomor STTB"
                            fgroup-class="col-md-6" disable-feedback />
                        {{--  --}}
                        <label class="h6 col-md-12">B. Pindah Dari Sekolah Lain</label>
                        {{-- Asal Sekolah Pindah--}}
                        <x-adminlte-input name="asal_pindah" label="Asal Sekolah" placeholder="Asal Sekolah"
                            fgroup-class="col-md-6" disable-feedback />
                        {{-- tingkat sekolah pindah --}}
                        <x-adminlte-select name="tingkat_pindah" label="Dari Tingkat" fgroup-class="col-md-6">
                            <x-adminlte-options :options="['1','2','3','4','5','6']" />
                        </x-adminlte-select>
                        {{-- tanggal diterima pindah--}}
                        @php
                        $config = ['format' => 'L'];
                        @endphp
                        <x-adminlte-input-date label="Tanggal Diterima" name="diterima_pindah" :config="$config"
                            placeholder="Tanggal Diterima" fgroup-class="col-md-12">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        {{-- end input form perkembangan siswa --}}
                    </div>
                </x-adminlte-card>
                {{--End Data Perkembangan Siswa Collapse --}}

                {{-- uploud --}}
                <div class="col-md-3"></div>
                <div class="col-md-2">
                    <img src="{{asset('storage/images/user_default_profil.png')}}" class="rounded  float-start"
                        alt="Pas Foto">
                </div>
                <div class="col-md-1"></div>
                <x-adminlte-input-file name="pasfoto_siswa" label="Upload Foto" fgroup-class="col-md-6"
                    placeholder="Choose a file..." disable-feedback />
                <div class="col-md-10"></div>
                <x-adminlte-button class="btn-flat col-md-2" type="submit" label="Submit" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>
        </form>


    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop

{{-- footer --}}
@section('footer')
<div class="mt-2" id="mycredit"><strong> Copyright &copy; <?php echo date('Y');?> Sistem Informasi Buku Induk Siswa -
        Kampus Mengajar
        Angkatan 5 </div>
@stop

@section('js')
<script type="text/javascript">
    function add() {
        window.location = "{{url('/siswa/add')}}";
    }
</script>
@stop
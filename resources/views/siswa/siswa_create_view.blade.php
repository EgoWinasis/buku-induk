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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">



                <!-- Data siswa Collapse -->
                <x-adminlte-card title="Keterangan Siswa" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form siswa --}}
                        {{-- NIS --}}
                        <div class="col-md-6">
                            <label for="nis">NIS <span class="text-danger font-italic">*wajib diisi</span></label>
                            <x-adminlte-input  name="nis" value="{{old('nis')}}" placeholder="Nomor Induk Siswa"
                                type="number">
                            </x-adminlte-input>
                        </div>
                        {{-- NISN --}}
                        <div class="col-md-6">
                            <label for="nisn">NISN <span class="text-danger font-italic">*wajib diisi</span></label>
                            <x-adminlte-input name="nisn" value="{{old('nisn')}}"
                                placeholder="Nomor Induk Siswa Nasional" type="number">
                            </x-adminlte-input>
                        </div>
                        {{-- NIK --}}
                        <x-adminlte-input name="nik" label="NIK" value="{{old('nik')}}"
                            placeholder="Nomor Induk Kependudukan" type="number" fgroup-class="col-md-6">
                        </x-adminlte-input>
                        {{-- No. KK --}}
                        <x-adminlte-input name="no_kk" label="No. KK" value="{{old('no_kk')}}"
                            placeholder="Nomor Kartu Keluarga" type="number" fgroup-class="col-md-6">
                        </x-adminlte-input>
                        {{-- nama lengkap --}}
                        <div class="col-md-6">
                            <label for="nama_lengkap">Nama Lengkap <span class="text-danger font-italic">*wajib
                                    diisi</span></label>
                            <x-adminlte-input name="nama_lengkap" value="{{old('nama_lengkap')}}"
                                placeholder="Nama Lengkap" />
                        </div>
                        {{-- nama panggilan --}}
                        <div class="col-md-6">
                            <x-adminlte-input name="nama_panggilan" value="{{old('nama_panggilan')}}"
                                label="Nama Panggilan" placeholder="Nama Panggilan" />
                        </div>
                        {{-- jenis kelamin --}}
                        @php
                        $options = ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'];
                        if (!empty(old('jen_kel'))) {
                        $selected = [old('jen_kel')];
                        }else{
                        $selected = ['Laki-laki'];
                        }
                        @endphp
                        <x-adminlte-select name="jen_kel" label="Jenis Kelamin" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- tempat lahir --}}
                        <div class="col-md-6">
                            <label for="tempat_lahir">Tempat Lahir <span class="text-danger font-italic">*wajib
                                    diisi</span></label>
                            <x-adminlte-input name="tempat_lahir" value="{{old('tempat_lahir')}}"
                                placeholder="Tempat Lahir" />
                        </div>
                        {{-- tanggal lahir--}}
                        @php
                        $config = ['format' => 'DD-MM-YYYY'];
                        @endphp
                        <div class="col-md-6">
                            <label for="tgl_lahir">Tanggal Lahir <span class="text-danger font-italic">*wajib
                                    diisi</span></label>
                            <x-adminlte-input-date value="{{old('tgl_lahir')}}" name="tgl_lahir" :config="$config"
                                placeholder="Tanggal Lahir">
                                <x-slot name="appendSlot">
                                    <div class="input-group-text bg-gradient-danger">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input-date>
                        </div>
                        {{-- Agama --}}
                        @php
                        $options = ['Islam' => 'Islam', 'Kristen' => 'Kristen','Katolik' => 'Katolik','Hindu' =>
                        'Hindu','Buddha' => 'Buddha','Konghucu' => 'Konghucu'];
                        if (!empty(old('agama'))) {
                        $selected = [old('agama')];
                        }else{
                        $selected = ['Islam'];
                        }

                        @endphp
                        <x-adminlte-select name="agama" label="Agama" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- kewarganegaraan --}}
                        <x-adminlte-input name="kewarganegaraan" value="{{old('kewarganegaraan')}}"
                            label="Kewarganegaraan" placeholder="Kewarganegaraan" fgroup-class="col-md-6" />
                        {{-- Jumlah Saudara --}}
                        @php
                        $options = ['0' => '0','1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7'
                        => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' =>
                        '14','15' => '15'];
                        if (!empty(old('jml_saudara'))) {
                        $selected = [old('jml_saudara')];
                        }else{
                        $selected = ['0'];
                        }
                        @endphp
                        <x-adminlte-select name="jml_saudara" label="Jumlah Saudara" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- Bahasa Sehari hari --}}
                        <x-adminlte-input name="bahasa" value="{{old('bahasa')}}" label="Bahasa Sehari-hari Di Rumah"
                            placeholder="Bahasa Sehari-hari Di rumah" fgroup-class="col-md-6" />
                        {{-- Golongan Darah --}}
                        @php
                        $options = ['A' => 'A','B' => 'B','AB' => 'AB','O' => 'O'];
                        if (!empty(old('gol_darah'))) {
                        $selected = [old('gol_darah')];
                        }else{
                        $selected = ['A'];
                        }
                        @endphp
                        <x-adminlte-select name="gol_darah" label="Golongan Darah" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- Alamat --}}
                        <x-adminlte-input name="alamat" value="{{old('alamat')}}" label="Alamat" placeholder="Alamat"
                            fgroup-class="col-md-6" />
                        {{-- Nomor telepon --}}
                        <x-adminlte-input name="telepon" value="{{old('telepon')}}" label="Nomor Telepon"
                            placeholder="08934215464" type="number" fgroup-class="col-md-6">
                        </x-adminlte-input>
                        {{-- Tempat tinggal --}}
                        <x-adminlte-input name="tempat_tinggal" value="{{old('tempat_tinggal')}}" label="Tempat Tinggal"
                            placeholder="Tempat Tinggal" fgroup-class="col-md-6" />
                        {{-- Jarak --}}
                        <x-adminlte-input name="jarak" value="{{old('jarak')}}" min="1" label="Jarak"
                            placeholder="Kilometer" type="number" fgroup-class="col-md-6">
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
                        <x-adminlte-input name="nama_ayah" value="{{old('nama_ayah')}}" label="Nama Ayah"
                            placeholder="Nama Ayah" fgroup-class="col-md-6" />
                        {{-- nama ibu --}}
                        <x-adminlte-input name="nama_ibu" value="{{old('nama_ibu')}}" label="Nama Ibu"
                            placeholder="Nama Ibu" fgroup-class="col-md-6" />
                        {{-- Pendidikan Ayah --}}
                        @php
                        $options = ['Tidak Sekolah' => 'Tidak Sekolah','SD/MI' => 'SD/MI','SMP/MTS' =>
                        'SMP/MTS','SMA/SMK' => 'SMA/SMK','D1' => 'D1','D2' => 'D2','D3' => 'D3','S1'=> 'S1','S2' =>
                        'S2','S3' => 'S3'];
                        if (!empty(old('pendidikan_ayah'))) {
                        $selected = [old('pendidikan_ayah')];
                        }else{
                        $selected = ['Tidak Sekolah'];
                        }
                        @endphp
                        <x-adminlte-select name="pendidikan_ayah" label="Pendidikan Ayah" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- Pendidikan Ibu --}}
                        @php
                        $options = ['Tidak Sekolah' => 'Tidak Sekolah','SD/MI' => 'SD/MI','SMP/MTS' =>
                        'SMP/MTS','SMA/SMK' => 'SMA/SMK','D1' => 'D1','D2' => 'D2','D3' => 'D3','S1'=> 'S1','S2' =>
                        'S2','S3' => 'S3'];
                        if (!empty(old('pendidikan_ibu'))) {
                        $selected = [old('pendidikan_ibu')];
                        }else{
                        $selected = ['Tidak Sekolah'];
                        }
                        @endphp
                        <x-adminlte-select name="pendidikan_ibu" label="Pendidikan Ibu" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>

                        {{-- pekerjaan ayah --}}
                        <x-adminlte-input name="pekerjaan_ayah" value="{{old('pekerjaan_ayah')}}" label="Pekerjaan Ayah"
                            placeholder="Pekerjaan Ayah" fgroup-class="col-md-6" />
                        {{-- Pekerjaan Ibu --}}
                        <x-adminlte-input name="pekerjaan_ibu" value="{{old('pekerjaan_ibu')}}" label="Pekerjaan Ibu"
                            placeholder="Pekerjaan Ibu" fgroup-class="col-md-6" />
                        {{-- nama wali --}}
                        <x-adminlte-input name="nama_wali" value="{{old('nama_wali')}}" label="Nama Wali"
                            placeholder="Nama Wali" fgroup-class="col-md-6" />
                        {{-- Hubungan wali --}}
                        <x-adminlte-input name="hubungan_wali" value="{{old('hubungan_wali')}}" label="Hubungan Wali"
                            placeholder="Hubungan Wali" fgroup-class="col-md-6" />
                        {{-- Pendidikan Wali --}}
                        @php
                        $options = ['Tidak Sekolah' => 'Tidak Sekolah','SD/MI' => 'SD/MI','SMP/MTS' =>
                        'SMP/MTS','SMA/SMK' => 'SMA/SMK','D1' => 'D1','D2' => 'D2','D3' => 'D3','S1'=> 'S1','S2' =>
                        'S2','S3' => 'S3'];
                        if (!empty(old('pendidikan_wali'))) {
                        $selected = [old('pendidikan_wali')];
                        }else{
                        $selected = ['Tidak Sekolah'];
                        }
                        @endphp
                        <x-adminlte-select name="pendidikan_wali" label="Pendidikan Wali" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- pekerjaan Wali --}}
                        <x-adminlte-input name="pekerjaan_wali" value="{{old('pekerjaan_wali')}}" label="Pekerjaan Wali"
                            placeholder="Pekerjaan Wali" fgroup-class="col-md-6" />
                        {{-- end input form orang tua --}}
                    </div>
                </x-adminlte-card>
                {{--end data orang tua collapse --}}

                <!-- Data Perkembangan Siswa Collapse -->
                <x-adminlte-card title="Perkembangan Siswa" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form perkembangan siswa --}}

                        <label class="h6 col-md-12 text-success">A. Masuk Menjadi Siswa Baru</label>
                        {{-- Asal Sekolah TK--}}
                        <x-adminlte-input name="asal_sekolah" value="{{old('asal_sekolah')}}" label="Asal Sekolah"
                            placeholder="Asal Sekolah" fgroup-class="col-md-6" />
                        {{-- Nama Taman Kanak-kanak --}}
                        <x-adminlte-input name="nama_tk" value="{{old('nama_tk')}}" label="Nama Taman Kanak-kanak"
                            placeholder="Nama Taman Kanak-kanak" fgroup-class="col-md-6" />
                        {{-- tanggal sttb--}}
                        @php
                        $config = ['format' => 'DD-MM-YYYY'];
                        @endphp
                        <x-adminlte-input-date label="Tanggal STTB" name="tgl_sttb" :config="$config"
                            placeholder="Tanggal STTB" fgroup-class="col-md-6">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        {{-- Tanggal dan Nomor STTB --}}
                        <x-adminlte-input name="no_sttb" value="{{old('no_sttb')}}" label="Nomor STTB"
                            placeholder="Nomor STTB" fgroup-class="col-md-6" />
                        {{--  --}}
                        <label class="h6 col-md-12 text-success">B. Pindah Dari Sekolah Lain</label>
                        {{-- Asal Sekolah Pindah--}}
                        <x-adminlte-input name="asal_sekolah_pindah" value="{{old('asal_sekolah_pindah')}}"
                            label="Asal Sekolah" placeholder="Asal Sekolah" fgroup-class="col-md-6" />
                        {{-- tingkat sekolah pindah --}}
                        @php
                        $options = ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6'];
                        if (!empty(old('tingkat_sekolah_pindah'))) {
                        $selected = [old('tingkat_sekolah_pindah')];
                        }else{
                        $selected = ['1'];
                        }
                        @endphp
                        <x-adminlte-select name="tingkat_sekolah_pindah" value="{{old('tingkat_sekolah_pindah')}}"
                            label="Dari Tingkat" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- tanggal diterima pindah--}}
                        @php
                        $config = ['format' => 'DD-MM-YYYY'];
                        @endphp
                        <x-adminlte-input-date label="Tanggal Diterima" name="tgl_diterima" :config="$config"
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

                <!-- Data Jasmani Collapse -->
                <x-adminlte-card title="Keadaan Jasmani" class="col-md-12" theme-mode="full"
                    collapsible="collapsed">
                    <div class="row">
                        {{-- input form Jasmani --}}
                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Tahun</th>
                                            <td><input type="number" min="2000" name="jas_th_1" value="{{old('jas_th_1')}}" ></td>
                                            <td><input type="number" min="2000" name="jas_th_2" value="{{old('jas_th_2')}}" ></td>
                                            <td><input type="number" min="2000" name="jas_th_3" value="{{old('jas_th_3')}}" ></td>
                                            <td><input type="number" min="2000" name="jas_th_4" value="{{old('jas_th_4')}}" ></td>
                                            <td><input type="number" min="2000" name="jas_th_5" value="{{old('jas_th_5')}}" ></td>
                                            <td><input type="number" min="2000" name="jas_th_6" value="{{old('jas_th_6')}}" ></td>
                                        </tr>
                                        <tr>
                                            <th>Berat Badan</th>
                                            <td><input type="number" min="1" name="jas_bb_1" value="{{old('jas_bb_1')}}"  placeholder="kg"></td>
                                            <td><input type="number" min="1" name="jas_bb_2" value="{{old('jas_bb_2')}}"  placeholder="kg"></td>
                                            <td><input type="number" min="1" name="jas_bb_3" value="{{old('jas_bb_3')}}"  placeholder="kg"></td>
                                            <td><input type="number" min="1" name="jas_bb_4" value="{{old('jas_bb_4')}}"  placeholder="kg"></td>
                                            <td><input type="number" min="1" name="jas_bb_5" value="{{old('jas_bb_5')}}"  placeholder="kg"></td>
                                            <td><input type="number" min="1" name="jas_bb_6" value="{{old('jas_bb_6')}}"  placeholder="kg"></td>
                                        </tr>
                                        <tr>
                                            <th>Tinggi Badan</th>
                                            <td><input type="number" min="1" name="jas_tb_1" value="{{old('jas_tb_1')}}"  placeholder="cm"></td>
                                            <td><input type="number" min="1" name="jas_tb_2" value="{{old('jas_tb_2')}}"  placeholder="cm"></td>
                                            <td><input type="number" min="1" name="jas_tb_3" value="{{old('jas_tb_3')}}"  placeholder="cm"></td>
                                            <td><input type="number" min="1" name="jas_tb_4" value="{{old('jas_tb_4')}}"  placeholder="cm"></td>
                                            <td><input type="number" min="1" name="jas_tb_5" value="{{old('jas_tb_5')}}"  placeholder="cm"></td>
                                            <td><input type="number" min="1" name="jas_tb_6" value="{{old('jas_tb_6')}}"  placeholder="cm"></td>
                                        </tr>
                                        <tr>
                                            <th>Penyakit</th>
                                            <td><input name="jas_pt_1" value="{{old('jas_pt_1')}}" type="text"></td>
                                            <td><input name="jas_pt_2" value="{{old('jas_pt_2')}}" type="text"></td>
                                            <td><input name="jas_pt_3" value="{{old('jas_pt_3')}}" type="text"></td>
                                            <td><input name="jas_pt_4" value="{{old('jas_pt_4')}}" type="text"></td>
                                            <td><input name="jas_pt_5" value="{{old('jas_pt_5')}}" type="text"></td>
                                            <td><input name="jas_pt_6" value="{{old('jas_pt_6')}}" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th>Keahlian Jasmani</th>
                                            <td><input name="jas_kj_1" value="{{old('jas_kj_1')}}" type="text"></td>
                                            <td><input name="jas_kj_2" value="{{old('jas_kj_2')}}" type="text"></td>
                                            <td><input name="jas_kj_3" value="{{old('jas_kj_3')}}" type="text"></td>
                                            <td><input name="jas_kj_4" value="{{old('jas_kj_4')}}" type="text"></td>
                                            <td><input name="jas_kj_5" value="{{old('jas_kj_5')}}" type="text"></td>
                                            <td><input name="jas_kj_6" value="{{old('jas_kj_6')}}" type="text"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        {{-- end input form Jasmani --}}
                    </div>
                </x-adminlte-card>
                {{--End Data Jasmani Collapse --}}

                <!-- Data Beasiswa Collapse -->
                <x-adminlte-card title=" Beasiswa" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form Beasiswa --}}
                        <div class="col-md-12">
                            <x-adminlte-input name="beasiswa" value="{{old('beasiswa')}}" label="Jenis Beasiswa"
                                placeholder="Jenis Beasiswa" fgroup-class="col-md-12" />
                        </div>

                        {{-- end input form Beasiswa --}}
                    </div>
                </x-adminlte-card>
                {{--End Data Beasiswa Collapse --}}

                <!-- Data Meninggalkan Sekolah Collapse -->
                <x-adminlte-card title="Meninggalkan Sekolah" class="col-md-12" theme-mode="full"
                    collapsible="collapsed">
                    <div class="row">
                        {{-- input form Meninggalkan Sekolah --}}
                        <label class="h6 col-md-12 text-success">A. Tamat Belajar</label>
                        {{-- tahun tamat--}}
                        @php
                        $config = ['format' => 'YYYY'];
                        @endphp
                        <x-adminlte-input-date label="Tahun Tamat" name="thn_tamat" :config="$config"
                            placeholder="Tahun Tamat" fgroup-class="col-md-6"  value="{{old('thn_tamat')}}">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        {{-- Nomor Ijazah / STTB --}}
                        <x-adminlte-input name="no_ijazah" value="{{old('no_ijazah')}}" label="Nomor Ijazah / STTB"
                            placeholder="Nomor Ijazah / STTB" fgroup-class="col-md-6" />
                        {{-- Melanjutkan Ke Sekolah --}}
                        <x-adminlte-input name="lanjut_sekolah_tamat" value="{{old('lanjut_sekolah_tamat')}}"
                            label="Melanjutkan Ke Sekolah" placeholder="Melanjutkan Ke Sekolah"
                            fgroup-class="col-md-12" />
                        {{-- \ --}}
                        <label class="h6 col-md-12 text-success">B. Pindah Sekolah</label>
                        {{-- Pindah Sekolah--}}
                        {{-- tingkat sekolah pindah --}}
                        @php
                        $options = ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6'];
                        if (!empty(old('dari_tingkat'))) {
                        $selected = [old('dari_tingkat')];
                        }else{
                        $selected = ['1'];
                        }
                        @endphp
                        <x-adminlte-select name="dari_tingkat" value="{{old('dari_tingkat')}}"
                            label="Dari Tingkat" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- tingkat sekolah pindah --}}
                        @php
                        $options = ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6'];
                        if (!empty(old('ke_tingkat'))) {
                        $selected = [old('ke_tingkat')];
                        }else{
                        $selected = ['1'];
                        }
                        @endphp
                        <x-adminlte-select name="ke_tingkat" value="{{old('ke_tingkat')}}"
                            label="Ke Tingkat" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- Melanjutkan Ke Sekolah --}}
                        <x-adminlte-input name="lanjut_sekolah_pindah" value="{{old('lanjut_sekolah_pindah')}}" label="Ke Sekolah"
                            placeholder="Ke Sekolah" fgroup-class="col-md-12" />
                        {{-- \ --}}
                        <label class="h6 col-md-12 text-success">C. Keluar Sekolah</label>
                        {{-- Tanggal Keluar--}}
                        @php
                        $config = ['format' => 'DD-MM-YYYY'];
                        @endphp
                        <x-adminlte-input-date label="Tanggal" name="tgl_keluar_sekolah" :config="$config"
                            placeholder="Tanggal" fgroup-class="col-md-6" value="{{old('tgl_keluar_sekolah')}}">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        {{-- Alasan Keluar --}}
                        <x-adminlte-input name="alasan_keluar_sekolah" value="{{old('alasan_keluar_sekolah')}}"
                            label="Alasan" placeholder="Alasan" fgroup-class="col-md-6" />

                        {{-- end input form Meninggalkan Sekolah --}}
                    </div>
                </x-adminlte-card>
                {{--End Data Meninggalkan Sekolah Collapse --}}

                <!-- Data Lain-lain Collapse -->
                <x-adminlte-card title="Lain-lain" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form Lain-lain --}}

                        <div class="col-md-12">
                            <x-adminlte-textarea name="lain_lain" placeholder="Insert description...">
                                {{old('lain_lain')}}
                            </x-adminlte-textarea>
                        </div>

                        {{-- end input form Lain-lain --}}
                    </div>
                </x-adminlte-card>
                {{--End Data Lain-lain Collapse --}}

                {{-- uploud --}}
                <div class="col-md-3"></div>
                <div class="col-md-2">
                    <img src="{{asset('storage/images/user_default_profil.png')}}" id="foto_siswa"
                        class="rounded  float-start" alt="Pas Foto">
                </div>
                <div class="col-md-1"></div>
                <x-adminlte-input-file id="imgInp" value="{{old('foto_siswa')}}" name="foto_siswa" label="Upload Foto"
                    fgroup-class="col-md-6" placeholder="Choose a file..." />
                <div class="col-md-10"></div>
                <x-adminlte-button class="btn-flat col-md-2" type="submit" label="Submit" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>
        </form>

        <br>

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

    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    foto_siswa.src = URL.createObjectURL(file)
  }
}
</script>
@stop
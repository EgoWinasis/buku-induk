@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop
@section('plugins.TempusDominusBs4', true)
@section('title', 'Edit Data Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Edit Siswa : {{$student->nama_lengkap}}</h1>
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
        <form method="POST" action="{{ route('siswa.update', $student->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">



                <!-- Data siswa Collapse -->
                <x-adminlte-card title="Keterangan Siswa" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form siswa --}}
                        {{-- NIS --}}
                        <x-adminlte-input name="nis" label="NIS" value="{{old('nis') ? old('nis') : $student->nis}}"
                            placeholder="Nomor Induk Siswa" type="number" fgroup-class="col-md-6">
                        </x-adminlte-input>
                        {{-- NISN --}}
                        <x-adminlte-input name="nisn" label="NISN" value="{{old('nisn')? old('nisn') : $student->nisn}}"
                            placeholder="Nomor Induk Siswa Nasional" type="number" fgroup-class="col-md-6">
                        </x-adminlte-input>
                        {{-- NIK --}}
                        <x-adminlte-input name="nik" label="NIK" value="{{old('nik') ? old('nik') : $student->nik}}"
                            placeholder="Nomor Induk Kependudukan" type="number" fgroup-class="col-md-6">
                        </x-adminlte-input>
                        {{-- No. KK --}}
                        <x-adminlte-input name="no_kk" label="No. KK"
                            value="{{old('no_kk')? old('no_kk') : $student->no_kk}}" placeholder="Nomor Kartu Keluarga"
                            type="number" fgroup-class="col-md-6">
                        </x-adminlte-input>
                        {{-- nama lengkap --}}
                        <x-adminlte-input name="nama_lengkap"
                            value="{{old('nama_lengkap') ? old('nama_lengkap') : $student->nama_lengkap}}"
                            label="Nama Lengkap" placeholder="Nama Lengkap" fgroup-class="col-md-6" />
                        {{-- nama panggilan --}}
                        <x-adminlte-input name="nama_panggilan"
                            value="{{old('nama_panggilan') ? old('nama_panggilan') : $student->nama_panggilan}}"
                            label="Nama Panggilan" placeholder="Nama Panggilan" fgroup-class="col-md-6" />
                        {{-- jenis kelamin --}}
                        @php
                        $options = ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'];
                        if (!empty(old('jen_kel'))) {
                        $selected = [old('jen_kel')];
                        }else{
                        $selected = [$student->jen_kel];
                        }
                        @endphp
                        <x-adminlte-select name="jen_kel" label="Jenis Kelamin" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- tempat lahir --}}
                        <x-adminlte-input name="tempat_lahir"
                            value="{{old('tempat_lahir') ? old('tempat_lahir') : $student->tempat_lahir}}"
                            label="Tempat Lahir" placeholder="Tempat Lahir" fgroup-class="col-md-6" />
                        {{-- tanggal lahir--}}
                        @php
                        $config = ['format' => 'DD-MM-YYYY'];
                        @endphp
                        <x-adminlte-input-date value="{{old('tgl_lahir') ? old('tgl_lahir') : $student->tgl_lahir}}"
                            label="Tanggal Lahir" name="tgl_lahir" :config="$config" placeholder="Tanggal Lahir"
                            fgroup-class="col-md-6">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        {{-- Agama --}}
                        @php
                        $options = ['Islam' => 'Islam', 'Kristen' => 'Kristen','Katolik' => 'Katolik','Hindu' =>
                        'Hindu','Buddha' => 'Buddha','Konghucu' => 'Konghucu'];
                        if (!empty(old('agama'))) {
                        $selected = [old('agama')];
                        }else{
                        $selected = [$student->agama];
                        }

                        @endphp
                        <x-adminlte-select name="agama" label="Agama" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- kewarganegaraan --}}
                        <x-adminlte-input name="kewarganegaraan"
                            value="{{old('kewarganegaraan') ? old('kewarganegaraan') : $student->kewarganegaraan}}"
                            label="Kewarganegaraan" placeholder="Kewarganegaraan" fgroup-class="col-md-6" />
                        {{-- Jumlah Saudara --}}
                        @php
                        $options = ['0' => '0','1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' =>
                        '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15'
                        => '15'];
                        if (!empty(old('jml_saudara'))) {
                        $selected = [old('jml_saudara')];
                        }else{
                        $selected = [$student->jml_saudara];
                        }
                        @endphp
                        <x-adminlte-select name="jml_saudara" label="Jumlah Saudara" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- Bahasa Sehari hari --}}
                        <x-adminlte-input name="bahasa" value="{{old('bahasa')? old('bahasa') : $student->bahasa}}"
                            label="Bahasa Sehari-hari Di Rumah" placeholder="Bahasa Sehari-hari Di rumah"
                            fgroup-class="col-md-6" />
                        {{-- Golongan Darah --}}
                        @php
                        $options = ['A' => 'A','B' => 'B','AB' => 'AB','O' => 'O'];
                        if (!empty(old('gol_darah'))) {
                        $selected = [old('gol_darah')];
                        }else{
                        $selected = [$student->gol_darah];
                        }
                        @endphp
                        <x-adminlte-select name="gol_darah" label="Golongan Darah" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- Alamat --}}
                        <x-adminlte-input name="alamat" value="{{old('alamat') ? old('alamat') : $student->alamat}}"
                            label="Alamat" placeholder="Alamat" fgroup-class="col-md-6" />
                        {{-- Nomor telepon --}}
                        <x-adminlte-input name="telepon" value="{{old('telepon')? old('telepon') : $student->telepon}}"
                            label="Nomor Telepon" placeholder="08934215464" type="number" fgroup-class="col-md-6">
                        </x-adminlte-input>
                        {{-- Tempat tinggal --}}
                        <x-adminlte-input name="tempat_tinggal"
                            value="{{old('tempat_tinggal') ? old('tempat_tinggal') : $student->tempat_tinggal}}"
                            label="Tempat Tinggal" placeholder="Tempat Tinggal" fgroup-class="col-md-6" />
                        {{-- Jarak --}}
                        <x-adminlte-input name="jarak" value="{{old('jarak') ? old('jarak') : $student->jarak}}" min="1"
                            label="Jarak" placeholder="Kilometer" type="number" fgroup-class="col-md-6">
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
                        <x-adminlte-input name="nama_ayah"
                            value="{{old('nama_ayah')? old('nama_ayah') : $student->nama_ayah}}" label="Nama Ayah"
                            placeholder="Nama Ayah" fgroup-class="col-md-6" />
                        {{-- nama ibu --}}
                        <x-adminlte-input name="nama_ibu"
                            value="{{old('nama_ibu') ? old('nama_ibu') : $student->nama_ibu}}" label="Nama Ibu"
                            placeholder="Nama Ibu" fgroup-class="col-md-6" />
                        {{-- Pendidikan Ayah --}}
                        @php
                        $options = ['Tidak Sekolah' => 'Tidak Sekolah','SD/MI' => 'SD/MI','SMP/MTS' =>
                        'SMP/MTS','SMA/SMK' => 'SMA/SMK','D1' => 'D1','D2' => 'D2','D3' => 'D3','S1'=> 'S1','S2' =>
                        'S2','S3' => 'S3'];
                        if (!empty(old('pendidikan_ayah'))) {
                        $selected = [old('pendidikan_ayah')];
                        }else{
                        $selected = [$student->pendidikan_ayah];
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
                        $selected = [$student->pendidikan_ibu];
                        }
                        @endphp
                        <x-adminlte-select name="pendidikan_ibu" label="Pendidikan Ibu" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>

                        {{-- pekerjaan ayah --}}
                        <x-adminlte-input name="pekerjaan_ayah"
                            value="{{old('pekerjaan_ayah')? old('pekerjaan_ayah') : $student->pekerjaan_ayah}}"
                            label="Pekerjaan Ayah" placeholder="Pekerjaan Ayah" fgroup-class="col-md-6" />
                        {{-- Pekerjaan Ibu --}}
                        <x-adminlte-input name="pekerjaan_ibu"
                            value="{{old('pekerjaan_ibu')? old('pekerjaan_ibu') : $student->pekerjaan_ibu}}"
                            label="Pekerjaan Ibu" placeholder="Pekerjaan Ibu" fgroup-class="col-md-6" />
                        {{-- nama wali --}}
                        <x-adminlte-input name="nama_wali"
                            value="{{old('nama_wali')? old('nama_wali') : $student->nama_wali}}" label="Nama Wali"
                            placeholder="Nama Wali" fgroup-class="col-md-6" />
                        {{-- Hubungan wali --}}
                        <x-adminlte-input name="hubungan_wali"
                            value="{{old('hubungan_wali')? old('hubungan_wali') : $student->hubungan_wali}}"
                            label="Hubungan Wali" placeholder="Hubungan Wali" fgroup-class="col-md-6" />
                        {{-- Pendidikan Wali --}}
                        @php
                        $options = ['Tidak Sekolah' => 'Tidak Sekolah','SD/MI' => 'SD/MI','SMP/MTS' =>
                        'SMP/MTS','SMA/SMK' => 'SMA/SMK','D1' => 'D1','D2' => 'D2','D3' => 'D3','S1'=> 'S1','S2' =>
                        'S2','S3' => 'S3'];
                        if (!empty(old('pendidikan_wali'))) {
                        $selected = [old('pendidikan_wali')];
                        }else{
                        $selected = [$student->pendidikan_wali];
                        }
                        @endphp
                        <x-adminlte-select name="pendidikan_wali" label="Pendidikan Wali" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- pekerjaan Wali --}}
                        <x-adminlte-input name="pekerjaan_wali"
                            value="{{old('pekerjaan_wali')? old('pekerjaan_wali') : $student->pekerjaan_wali}}"
                            label="Pekerjaan Wali" placeholder="Pekerjaan Wali" fgroup-class="col-md-6" />
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
                        <x-adminlte-input name="asal_sekolah"
                            value="{{old('asal_sekolah')? old('asal_sekolah') : $student->asal_sekolah}}"
                            label="Asal Sekolah" placeholder="Asal Sekolah" fgroup-class="col-md-6" />
                        {{-- Nama Taman Kanak-kanak --}}
                        <x-adminlte-input name="nama_tk" value="{{old('nama_tk')? old('nama_tk') : $student->nama_tk}}"
                            label="Nama Taman Kanak-kanak" placeholder="Nama Taman Kanak-kanak"
                            fgroup-class="col-md-6" />
                        {{-- tanggal sttb--}}
                        @php
                        $config = ['format' => 'DD-MM-YYYY'];
                        @endphp
                        <x-adminlte-input-date label="Tanggal STTB"
                            value="{{old('tgl_sttb') ? old('tgl_sttb') : $student->tgl_sttb}}" name="tgl_sttb"
                            :config="$config" placeholder="Tanggal STTB" fgroup-class="col-md-6">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-gradient-danger">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input-date>
                        {{-- Tanggal dan Nomor STTB --}}
                        <x-adminlte-input name="no_sttb" value="{{old('no_sttb')? old('no_sttb') : $student->no_sttb}}"
                            label="Nomor STTB" placeholder="Nomor STTB" fgroup-class="col-md-6" />
                        {{--  --}}
                        <label class="h6 col-md-12">B. Pindah Dari Sekolah Lain</label>
                        {{-- Asal Sekolah Pindah--}}
                        <x-adminlte-input name="asal_sekolah_pindah"
                            value="{{old('asal_sekolah_pindah')? old('asal_sekolah_pindah') : $student->asal_sekolah_pindah}}"
                            label="Asal Sekolah" placeholder="Asal Sekolah" fgroup-class="col-md-6" />
                        {{-- tingkat sekolah pindah --}}
                        @php
                        $options = ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6'];
                        if (!empty(old('tingkat_sekolah_pindah'))) {
                        $selected = [old('tingkat_sekolah_pindah')];
                        }else{
                        $selected = [$student->tingkat_sekolah_pindah];
                        }
                        @endphp
                        <x-adminlte-select name="tingkat_sekolah_pindah" label="Dari Tingkat" fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{-- tanggal diterima pindah--}}
                        @php
                        $config = ['format' => 'DD-MM-YYYY'];
                        @endphp
                        <x-adminlte-input-date label="Tanggal Diterima" name="tgl_diterima"
                            value="{{old('tgl_diterima') ? old('tgl_diterima') : $student->tgl_diterima}}"
                            :config="$config" placeholder="Tanggal Diterima" fgroup-class="col-md-12">
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
                    <img src="{{$student->foto_siswa == "user_default_profil.png" ? asset('storage/images/user_default_profil.png') : asset('storage/images/foto-siswa/'.$student->foto_siswa)}}"
                        id="foto_siswa" class="rounded  float-start" alt="Pas Foto">
                </div>
                <div class="col-md-1"></div>
                <x-adminlte-input-file id="imgInp" value="{{old('foto_siswa')}}" name="foto_siswa" label="Upload Foto"
                    fgroup-class="col-md-6" placeholder="Choose a file..." />
                <div class="col-md-7"></div>
                <x-adminlte-button class="btn-flat text-light col-md-2 " onclick="return back();" label="Kembali"
                theme="primary" icon="fas fa-lg fa-arrow-left" />
                <div class="col-md-1"></div>
                <x-adminlte-button class="btn-flat col-md-2" type="submit" label="Simpan" theme="success"
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
    function back() {
        window.location = "{{url('/siswa')}}";
    }

    imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    foto_siswa.src = URL.createObjectURL(file)
  }
}
</script>
@stop
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
        <form action="">

            <div class="row">
                {{-- <h4>1. Keterangan Siswa</h4> --}}
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
                <x-adminlte-input name="bahasa_sehari_hari" label="Bahasa Sehari-hari Di Rumah"
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
                    fgroup-class="col-md-6" min=1 max=10 maxlength="12">
                </x-adminlte-input>
            </div>
        </form>


    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@stop

{{-- footer --}}
@section('footer')
<div id="mycredit"><strong> Copyright &copy; <?php echo date('Y');?> Sistem Informasi Buku Induk Siswa - Kampus Mengajar
        Angkatan 5 </div>
@stop

@section('js')
<script type="text/javascript">
    function add() {
        window.location = "{{url('/siswa/add')}}";
    }
</script>
@stop
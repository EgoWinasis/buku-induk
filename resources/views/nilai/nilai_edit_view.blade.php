@extends('adminlte::page')


@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('title', 'Edit Nilai Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Edit Nilai Siswa</h1>
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
        <form method="POST" action="{{ route('nilai.update', $ketidakhadiran->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">



                <!-- Data Siswa Collapse -->
                {{-- a1 --}}
                <x-adminlte-card title="Data Siswa" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        <div class="col-md-4">

                            <label for="">Tahun Ajaran</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="tahun_ajaran" value="{{old('tahun_ajaran') ? old('tahun_ajaran') : $ketidakhadiran->tahun_ajaran}}">
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Kelas</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" style="margin-top: 10px" name="kelas" id="kelas">
                                <option selected value="{{$ketidakhadiran->kelas}}">{{$ketidakhadiran->kelas}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Siswa</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" style="margin-top: 10px" name="siswa" id="siswa">
                                <option selected value="{{$ketidakhadiran->siswa}}">{{$ketidakhadiran->siswa}}</option>
                            </select>
                        </div>
                        {{-- end input data siswa --}}
                    </div>
                </x-adminlte-card>
                {{--end data siswa collapse --}}
                <x-adminlte-card title="Profil Pelajar Pancasila" class="col-md-12" theme-mode="full"
                    collapsible="collapsed">
                    <div class="row">
                        {{-- input P5 siswa --}}
                        {{-- NIS --}}
                        <table width="100%" border="1px solid">
                            <thead class="text-center">
                                <th width="5%">NO.</th>
                                <th width="45%">DIMENSI</th>
                                <th width="25%">ELEMEN</th>
                                <th width="25%">SUB ELEMEN</th>
                            </thead>
                            <tbody>
                                {{-- b1 --}}
                                <tr>
                                    <td class="text-center">1.</td>
                                    <td>Beriman, bertakawa kepada Tuhan yang maha esa dan berakhlak mulia</td>
                                    {{-- c1 --}}
                                    <td>
                                        <x-adminlte-input name="a1b1c1"
                                            value="{{old('a1b1c1') ? old('a1b1c1') : $pelajarPancasila->b1c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    {{-- c2 --}}
                                    <td>
                                        <x-adminlte-input name="a1b1c2"
                                            value="{{old('a1b1c2') ? old('a1b1c2') : $pelajarPancasila->b1c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>Berkebhinekaan Global</td>
                                    <td>
                                        <x-adminlte-input name="a1b2c1"
                                            value="{{old('a1b2c1') ? old('a1b2c1') : $pelajarPancasila->b2c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a1b2c2"
                                            value="{{old('a1b2c2') ? old('a1b2c2') : $pelajarPancasila->b2c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3.</td>
                                    <td>Bergotong Royong</td>
                                    <td>
                                        <x-adminlte-input name="a1b3c1"
                                            value="{{old('a1b3c1') ? old('a1b3c1') : $pelajarPancasila->b3c1}} ">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a1b3c2"
                                            value="{{old('a1b3c2') ? old('a1b3c2') : $pelajarPancasila->b3c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4.</td>
                                    <td>Mandiri</td>
                                    <td>
                                        <x-adminlte-input name="a1b4c1"
                                            value="{{old('a1b4c1') ? old('a1b4c1') : $pelajarPancasila->b4c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a1b4c2"
                                            value="{{old('a1b4c2')? old('a1b4c2') : $pelajarPancasila->b4c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5.</td>
                                    <td>Berfikir Kritis</td>
                                    <td>
                                        <x-adminlte-input name="a1b5c1"
                                            value="{{old('a1b5c1') ? old('a1b5c1') : $pelajarPancasila->b5c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a1b5c2"
                                            value="{{old('a1b5c2') ? old('a1b5c2') : $pelajarPancasila->b5c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">6.</td>
                                    <td>Kreatif dan Inovatif</td>
                                    <td>
                                        <x-adminlte-input name="a1b6c1"
                                            value="{{old('a1b6c1') ? old('a1b6c1') : $pelajarPancasila->b6c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a1b6c2"
                                            value="{{old('a1b6c2') ? old('a1b6c2') : $pelajarPancasila->b6c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        {{-- end input P5 siswa --}}
                    </div>
                </x-adminlte-card>
                {{--end P5 collapse --}}


                <!-- Data Pengetahuan Collapse -->
                <x-adminlte-card title="Pengetahuan dan Keterampilan" class="col-md-12" theme-mode="full"
                    collapsible="collapsed">
                    <div class="row">
                        {{-- input form Pengetahuan --}}

                        <table width="100%" border="1px solid">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" width="5%">No</th>
                                    <th rowspan="2" class="text-center" width="25%">Mata Pelajaran</th>
                                    <th colspan="2" class="text-center" width="35%">Semester 1</th>
                                    <th colspan="2" class="text-center" width="35%">Semester 2</th>
                                </tr>
                                <tr class="text-center">
                                    <th width="10%">Nilai Akhir</th>
                                    <th>Capaian Kompetensi (Deskripsi)</th>
                                    <th width="10%">Nilai Akhir</th>
                                    <th>Capaian Kompetensi (Deskripsi)</th>

                                </tr>

                            </thead>

                            <tbody>
                                <tr>
                                    <td class="text-center">1.</td>
                                    <td>Pendidikan Agama dan Budi Pekerti</td>
                                    <td>
                                        <x-adminlte-input name="a2b1c1"
                                            value="{{old('a2b1c1') ? old('a2b1c1') : $pengetahuan->b1c1}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b1c2"
                                            value="{{old('a2b1c2')  ? old('a2b1c2') : $pengetahuan->b1c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b1c3"
                                            value="{{old('a2b1c3')  ? old('a2b1c3') : $pengetahuan->b1c3}}"
                                            type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b1c4"
                                            value="{{old('a2b1c4') ? old('a2b1c4') : $pengetahuan->b1c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>PPKn / PMP</td>
                                    <td>
                                        <x-adminlte-input name="a2b2c1"
                                            value="{{old('a2b2c1')? old('a2b2c1') : $pengetahuan->b2c1}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b2c2"
                                            value="{{old('a2b2c2') ? old('a2b2c2') : $pengetahuan->b2c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b2c3"
                                            value="{{old('a2b2c3') ? old('a2b2c3') : $pengetahuan->b2c3}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b2c4"
                                            value="{{old('a2b2c4') ? old('a2b2c4') : $pengetahuan->b2c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3.</td>
                                    <td>Bahasa Indonesia</td>
                                    <td>
                                        <x-adminlte-input name="a2b3c1"
                                            value="{{old('a2b3c1') ? old('a2b3c1') : $pengetahuan->b3c1}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b3c2"
                                            value="{{old('a2b3c2') ? old('a2b3c2') : $pengetahuan->b3c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b3c3"
                                            value="{{old('a2b3c3') ? old('a2b3c3') : $pengetahuan->b3c3}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b3c4"
                                            value="{{old('a2b3c4') ? old('a2b3c4') : $pengetahuan->b3c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4.</td>
                                    <td>Matematika</td>
                                    <td>
                                        <x-adminlte-input name="a2b4c1"
                                            value="{{old('a2b4c1') ? old('a2b4c1') : $pengetahuan->b4c1}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b4c2"
                                            value="{{old('a2b4c2') ? old('a2b4c2') : $pengetahuan->b4c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b4c3"
                                            value="{{old('a2b4c3') ? old('a2b4c3') : $pengetahuan->b4c3}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b4c4"
                                            value="{{old('a2b4c4') ? old('a2b4c4') : $pengetahuan->b4c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5.</td>
                                    <td>IPA & IPS (IPAS)</td>
                                    <td>
                                        <x-adminlte-input name="a2b5c1"
                                            value="{{old('a2b5c1') ? old('a2b5c1') : $pengetahuan->b5c1}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b5c2"
                                            value="{{old('a2b5c2') ? old('a2b5c2') : $pengetahuan->b5c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b5c3"
                                            value="{{old('a2b5c3') ? old('a2b5c3') : $pengetahuan->b5c3}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b5c4"
                                            value="{{old('a2b5c4') ? old('a2b5c4') : $pengetahuan->b5c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">6.</td>
                                    <td>Bahasa Inggris</td>
                                    <td>
                                        <x-adminlte-input name="a2b6c1"
                                            value="{{old('a2b6c1') ? old('a2b6c1') : $pengetahuan->b6c1}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b6c2"
                                            value="{{old('a2b6c2') ? old('a2b6c2') : $pengetahuan->b6c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b6c3"
                                            value="{{old('a2b6c3') ? old('a2b6c3') : $pengetahuan->b6c3}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b6c4"
                                            value="{{old('a2b6c4') ? old('a2b6c4') : $pengetahuan->b6c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">7.</td>
                                    <td>PJOK</td>
                                    <td>
                                        <x-adminlte-input name="a2b7c1"
                                            value="{{old('a2b7c1') ? old('a2b7c1') : $pengetahuan->b7c1}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b7c2"
                                            value="{{old('a2b7c2') ? old('a2b7c2') : $pengetahuan->b7c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b7c3"
                                            value="{{old('a2b7c3') ? old('a2b7c3') : $pengetahuan->b7c3}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b7c4"
                                            value="{{old('a2b7c4') ? old('a2b7c4') : $pengetahuan->b7c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">8.</td>
                                    <td>Teknologi Informasi dan Komunikasi</td>
                                    <td>
                                        <x-adminlte-input name="a2b8c1"
                                            value="{{old('a2b8c1') ? old('a2b8c1') : $pengetahuan->b8c1}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b8c2"
                                            value="{{old('a2b8c2') ? old('a2b8c2') : $pengetahuan->b8c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b8c3"
                                            value="{{old('a2b8c3') ? old('a2b8c3') : $pengetahuan->b8c3}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b8c4"
                                            value="{{old('a2b8c4') ? old('a2b8c4') : $pengetahuan->b8c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">9.</td>
                                    <td>Seni & Budaya</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>a.Seni Rupa</td>
                                    <td>
                                        <x-adminlte-input name="a2b9c1"
                                            value="{{old('a2b9c1') ? old('a2b9c1') : $pengetahuan->b9c1}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b9c2"
                                            value="{{old('a2b9c2') ? old('a2b9c2') : $pengetahuan->b9c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b9c3"
                                            value="{{old('a2b9c3') ? old('a2b9c3') : $pengetahuan->b9c3}}" type="number"
                                            min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b9c4"
                                            value="{{old('a2b9c4') ? old('a2b9c4') : $pengetahuan->b9c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>b.Seni Musik</td>
                                    <td>
                                        <x-adminlte-input name="a2b10c1"
                                            value="{{old('a2b10c1')  ? old('a2b10c1') : $pengetahuan->b10c1}}"
                                            type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b10c2"
                                            value="{{old('a2b10c2')  ? old('a2b10c2') : $pengetahuan->b10c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b10c3"
                                            value="{{old('a2b10c3')  ? old('a2b10c3') : $pengetahuan->b10c3}}"
                                            type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b10c4"
                                            value="{{old('a2b10c4')  ? old('a2b10c4') : $pengetahuan->b10c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>c.Seni Tari</td>
                                    <td>
                                        <x-adminlte-input name="a2b11c1"
                                            value="{{old('a2b11c1')  ? old('a2b11c1') : $pengetahuan->b11c1}}"
                                            type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b11c2"
                                            value="{{old('a2b11c2')  ? old('a2b11c2') : $pengetahuan->b11c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b11c3"
                                            value="{{old('a2b11c3')  ? old('a2b11c3') : $pengetahuan->b11c3}}"
                                            type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b11c4"
                                            value="{{old('a2b11c4')  ? old('a2b11c4') : $pengetahuan->b11c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">10.</td>
                                    <td>Bimbingan dan Konseling</td>
                                    <td>
                                        <x-adminlte-input name="a2b12c1"
                                            value="{{old('a2b12c1')  ? old('a2b12c1') : $pengetahuan->b12c1}}"
                                            type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b12c2"
                                            value="{{old('a2b12c2')  ? old('a2b12c2') : $pengetahuan->b12c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b12c3"
                                            value="{{old('a2b12c3')  ? old('a2b12c3') : $pengetahuan->b12c3}}"
                                            type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b12c4"
                                            value="{{old('a2b12c4')  ? old('a2b12c4') : $pengetahuan->b12c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">11.</td>
                                    <td>Mulok</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="text-center"></td>
                                    <td>a. Bahasa Jawa</td>
                                    <td>
                                        <x-adminlte-input name="a2b13c1"
                                            value="{{old('a2b13c1')  ? old('a2b13c1') : $pengetahuan->b13c1}}"
                                            type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b13c2"
                                            value="{{old('a2b13c2')  ? old('a2b13c2') : $pengetahuan->b13c2}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b13c3"
                                            value="{{old('a2b13c3')  ? old('a2b13c3') : $pengetahuan->b13c3}}"
                                            type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a2b13c4"
                                            value="{{old('a2b13c4')  ? old('a2b13c4') : $pengetahuan->b13c4}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- end input form Pengetahuan --}}
                    </div>
                </x-adminlte-card>
                {{--end data Pengetahuan collapse --}}

                <!-- Data ekskul Siswa Collapse -->
                <x-adminlte-card title="Ektrakulikuler" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form ekskul siswa --}}
                        <table width="100%" border="1px solid">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th class="text-center" width="25%">Ekstrakulikuler</th>
                                    <th class="text-center" width="10%">Nilai</th>
                                    <th class="text-center" width="60%">Keterangan</th>
                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">1.</td>
                                    <td>Praja Muda Karana</td>
                                    <td>
                                        <x-adminlte-input name="a3b1c1"
                                            value="{{old('a3b1c1') ? old('a3b1c1') : $ekstra->b1c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a3b1c2"
                                            value="{{old('a3b1c2') ? old('a3b1c2') : $ekstra->b1c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>Komputer</td>
                                    <td>
                                        <x-adminlte-input name="a3b2c1"
                                            value="{{old('a3b2c1') ? old('a3b2c1') : $ekstra->b2c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a3b2c2"
                                            value="{{old('a3b2c2') ? old('a3b2c2') : $ekstra->b2c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                            </tbody>
                            {{-- end input form ekskul siswa --}}
                        </table>
                    </div>
                </x-adminlte-card>
                {{--End Data ekskul Siswa Collapse --}}

                <x-adminlte-card title="Prestasi" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form prestasi siswa --}}
                        <table width="100%" border="1px solid">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th class="text-center" width="35%">Jenis Prestasi</th>
                                    <th class="text-center" width="60%">Keterangan</th>
                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">1.</td>
                                    <td>
                                        <x-adminlte-input name="a4b1c1"
                                            value="{{old('a4b1c1') ? old('a4b1c1') : $prestasi->b1c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a4b1c2"
                                            value="{{old('a4b1c2') ? old('a4b1c2') : $prestasi->b1c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>
                                        <x-adminlte-input name="a4b2c1"
                                            value="{{old('a4b2c1') ? old('a4b2c1') : $prestasi->b2c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a4b2c2"
                                            value="{{old('a4b2c2') ? old('a4b2c2') : $prestasi->b2c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3.</td>
                                    <td>
                                        <x-adminlte-input name="a4b3c1"
                                            value="{{old('a4b3c1') ? old('a4b3c1') : $prestasi->b3c1}}">
                                        </x-adminlte-input>
                                    </td>
                                    <td>
                                        <x-adminlte-input name="a4b3c2"
                                            value="{{old('a4b3c2') ? old('a4b3c2') : $prestasi->b3c2}}">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                            </tbody>
                            {{-- end input form prestasi siswa --}}
                        </table>
                    </div>
                </x-adminlte-card>
                {{--End Data prestasi Siswa Collapse --}}

                <x-adminlte-card title="Ketidakhadiran" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- input form kehadiran siswa --}}
                        <table width="100%" border="1px solid">
                            <thead>
                                <tr>
                                    <th class="text-center" width="5%">No</th>
                                    <th class="text-center" width="35%">Ketidakhadiran</th>
                                    <th class="text-center" width="60%">Keterangan</th>
                                </tr>

                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">1.</td>
                                    <td>Sakit</td>
                                    <td>
                                        <x-adminlte-input name="sakit"
                                            value="{{old('sakit') ? old('sakit') : $ketidakhadiran->sakit}}"
                                            placeholder="hari" type="number" min="1">
                                        </x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>Izin</td>
                                    <td>
                                        <x-adminlte-input name="izin"
                                            value="{{old('izin') ? old('izin') : $ketidakhadiran->izin}}"
                                            placeholder="hari" type="number" min="1"></x-adminlte-input>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3.</td>
                                    <td>Tanpa Keterangan</td>
                                    <td>
                                        <x-adminlte-input name="tanpa_keterangan"
                                            value="{{old('tanpa_keterangan') ? old('tanpa_keterangan') : $ketidakhadiran->tanpa_keterangan}}"
                                            placeholder="hari" type="number" min="1"></x-adminlte-input>
                                    </td>
                                </tr>

                            </tbody>
                            {{-- end input form kehadiran siswa --}}
                        </table>
                    </div>
                </x-adminlte-card>
                {{--End Data kehadiran Siswa Collapse --}}

                {{-- kenaikan --}}
                <x-adminlte-card title="Kenaikan" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- tingkat sekolah pindah --}}
                        @php
                        $options = ['Naik' => 'Naik','Tinggal' => 'Tinggal','Lulus' => 'Lulus'];
                        if (!empty(old('status'))) {
                        $selected = [old('status')];
                        }else{
                        $selected = ["$kenaikan->status"];
                        }
                        @endphp
                        <x-adminlte-select name="status" value="{{old('status')}}" label="Status"
                            fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                        {{--  --}}
                        {{-- kelas naik --}}
                        @php
                        $options = ['1' => '1','2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','Lulus' => 'Lulus'];
                        if (!empty(old('status_kelas'))) {
                        $selected = [old('status_kelas')];
                        }else{
                        $selected = ["$kenaikan->status_kelas"];
                        }
                        @endphp
                        <x-adminlte-select name="status_kelas" value="{{old('status_kelas')}}" label="Kelas"
                            fgroup-class="col-md-6">
                            <x-adminlte-options :options="$options" :selected="$selected" />
                        </x-adminlte-select>
                    </div>
                </x-adminlte-card>
                {{-- end kenaikan --}}

                {{-- ttd --}}
                <x-adminlte-card title="Tanda Tangan" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        {{-- kepala sekolah--}}
                        <x-adminlte-input name="kepsek" value="{!! old('kepsek') ? old('kepsek') : $ttd->kepsek !!}"
                            label="Kepala Sekolah" placeholder="Kepala Sekolah" fgroup-class="col-md-6" />
                        {{-- NIP kepala sekolah--}}
                        <x-adminlte-input name="nip_kepsek"
                            value="{{old('nip_kepsek') ? old('nip_kepsek') : $ttd->nip_kepsek}}" label="NIP"
                            placeholder="NIP" fgroup-class="col-md-6" type="number" min="1" />
                        {{-- uploud barcode --}}
                        <x-adminlte-input-file name="barcode_kepsek" value="{{old('barcode_kepsek')}}"
                            label="Uploud QR Code" fgroup-class="col-md-12" placeholder="Choose a file..." />
                        <label class="col-md-12 text-success">File : {{$ttd->barcode_kepsek}}</label>
                        {{-- Guru--}}
                        <x-adminlte-input name="wali_kelas"
                            value="{!! old('wali_kelas') ? old('wali_kelas') : $ttd->wali_kelas !!}" label="Wali Kelas"
                            placeholder="Wali Kelas" fgroup-class="col-md-6" />
                        {{-- NIP Wali KElas--}}
                        <x-adminlte-input name="nip_wali_kelas"
                            value="{{old('nip_wali_kelas') ? old('nip_wali_kelas') : $ttd->nip_wali_kelas}}" label="NIP"
                            placeholder="NIP" fgroup-class="col-md-6" type="number" min="1" />
                        {{-- uploud --}}
                        <x-adminlte-input-file name="barcode_wali_kelas" value="{{old('barcode_wali_kelas')}}"
                            label="Uploud QR Code" fgroup-class="col-md-12" placeholder="Choose a file..." />
                        <label class="col-md-12 text-success">File : {{$ttd->barcode_wali_kelas}}</label>

                    </div>
                </x-adminlte-card>
                <div class="d-flex justify-content-between col-md-12">

                    <x-adminlte-button class="btn-flat col-sm-1 " onclick="return back();" theme="danger"
                        icon="fas fa-lg fa-arrow-left" />

                    <x-adminlte-button class="btn-flat col-sm-1 " type="submit" theme="success"
                        icon="fas fa-lg fa-save" />

                </div>

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
        window.location = "{{ route('nilai.index') }}";
    }
</script>
@stop
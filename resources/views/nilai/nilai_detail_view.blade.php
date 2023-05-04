@extends('adminlte::page')


@section('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('title', 'Detail Nilai Siswa')

@section('content_header')
<h1 class="m-0 text-dark">Detail Nilai Siswa</h1>
@stop

@section('content')

<section class="content">
    <div class="container-fluid">
       

            <div class="row">



                <!-- Data Siswa Collapse -->
                {{-- a1 --}}
                <x-adminlte-card title="Data Siswa" class="col-md-12" theme-mode="full" collapsible="collapsed">
                    <div class="row">
                        
                        <table width="100%" border="1px solid">
                            <thead class="text-center">
                                <th>Siswa</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                            </thead>
                            <tbody class="text-center">
                                <td>{{$ketidakhadiran->siswa}}</td>
                                <td>{{$ketidakhadiran->kelas}}</td>
                                <td>{{$ketidakhadiran->tahun_ajaran}}</td>
                            </tbody>
                        </table>
                       
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
                                        {{$pelajarPancasila->b1c1}}
                                    </td>
                                    {{-- c2 --}}
                                    <td>
                                        {{$pelajarPancasila->b1c2}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>Berkebhinekaan Global</td>
                                    <td>
                                        {{$pelajarPancasila->b2c1}}
                                    </td>
                                    {{-- c2 --}}
                                    <td>
                                        {{$pelajarPancasila->b2c2}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3.</td>
                                    <td>Bergotong Royong</td>
                                    <td>
                                        {{$pelajarPancasila->b3c1}}
                                    </td>
                                    {{-- c2 --}}
                                    <td>
                                        {{$pelajarPancasila->b3c2}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4.</td>
                                    <td>Mandiri</td>
                                    <td>
                                        {{$pelajarPancasila->b4c1}}
                                    </td>
                                    {{-- c2 --}}
                                    <td>
                                        {{$pelajarPancasila->b4c2}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5.</td>
                                    <td>Berfikir Kritis</td>
                                    <td>
                                        {{$pelajarPancasila->b5c1}}
                                    </td>
                                    {{-- c2 --}}
                                    <td>
                                        {{$pelajarPancasila->b5c2}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">6.</td>
                                    <td>Kreatif dan Inovatif</td>
                                    <td>
                                        {{$pelajarPancasila->b6c1}}
                                    </td>
                                    {{-- c2 --}}
                                    <td>
                                        {{$pelajarPancasila->b6c2}}
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
                                        {{$pengetahuan->b1c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b1c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b1c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b1c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>PPKn / PMP</td>
                                    <td>
                                        {{$pengetahuan->b2c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b2c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b2c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b2c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3.</td>
                                    <td>Bahasa Indonesia</td>
                                    <td>
                                        {{$pengetahuan->b3c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b3c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b3c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b3c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">4.</td>
                                    <td>Matematika</td>
                                    <td>
                                        {{$pengetahuan->b4c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b4c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b4c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b4c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">5.</td>
                                    <td>IPA & IPS (IPAS)</td>
                                    <td>
                                        {{$pengetahuan->b5c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b5c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b5c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b5c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">6.</td>
                                    <td>Bahasa Inggris</td>
                                    <td>
                                        {{$pengetahuan->b6c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b6c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b6c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b6c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">7.</td>
                                    <td>PJOK</td>
                                    <td>
                                        {{$pengetahuan->b7c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b7c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b7c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b7c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">8.</td>
                                    <td>Teknologi Informasi dan Komunikasi</td>
                                    <td>
                                        {{$pengetahuan->b8c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b8c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b8c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b8c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">9.</td>
                                    <td>Seni & Budaya</td>
                                    <td>
                                        {{$pengetahuan->b9c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b9c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b9c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b9c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>a.Seni Musik</td>
                                    <td>
                                        {{$pengetahuan->b10c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b10c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b10c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b10c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>b.Seni Tari</td>
                                    <td>
                                        {{$pengetahuan->b11c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b11c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b11c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b11c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">10.</td>
                                    <td>Bimbingan dan Konseling</td>
                                    <td>
                                        {{$pengetahuan->b12c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b12c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b12c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b12c4}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">11.</td>
                                    <td>Mulok</td>
                                    <td>
                                        {{$pengetahuan->b13c1}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b13c2}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b13c3}}
                                    </td>
                                    <td>
                                        {{$pengetahuan->b13c4}}
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
                                        {{$ekstra->b1c1}}
                                    </td>
                                    <td>
                                        {{$ekstra->b1c2}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>Usaha Kesehatan Sekolah</td>
                                    <td>
                                        {{$ekstra->b2c1}}
                                    </td>
                                    <td>
                                        {{$ekstra->b2c2}}
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
                                        {{$prestasi->b1c1 == null ? "-" : $prestasi->b1c1}}
                                    </td>
                                    <td>
                                        {{$prestasi->b1c2 == null ? "-" : $prestasi->b1c2}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>
                                        {{$prestasi->b2c1 == null ? "-" : $prestasi->b2c1 }}
                                    </td>
                                    <td>
                                        {{$prestasi->b2c2 == null ? "-" : $prestasi->b2c2}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3.</td>
                                    <td>
                                        {{$prestasi->b3c1 == null ? "-" : $prestasi->b3c1}}
                                    </td>
                                    <td>
                                        {{$prestasi->b3c2 == null ? "-" : $prestasi->b3c2}}
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
                                        {{$ketidakhadiran->sakit == null ? "-" : $ketidakhadiran->sakit}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>Izin</td>
                                    <td>
                                        {{$ketidakhadiran->izin == null ? "-" : $ketidakhadiran->izin}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">3.</td>
                                    <td>Tanpa Keterangan</td>
                                    <td>
                                        {{$ketidakhadiran->tanpa_keterangan == null ? "-" : $ketidakhadiran->tanpa_keterangan}}
                                    </td>
                                </tr>

                            </tbody>
                            {{-- end input form kehadiran siswa --}}
                        </table>
                    </div>
                </x-adminlte-card>
                {{--End Data kehadiran Siswa Collapse --}}

                {{-- uploud --}}

                <div class="d-flex justify-content-between col-md-12">

                    <x-adminlte-button class="btn-flat col-sm-1 " onclick="return back();" theme="danger"
                        icon="fas fa-lg fa-arrow-left" />

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

    $('#tahun_ajaran').change(function () {
        let tahun_ajaran = $('#tahun_ajaran').val();
        $.ajax({
           type:'GET',
           url:"{{ route('getKelas') }}",
           data:{tahun_ajaran:tahun_ajaran},
           success:function(data){

                if (data.length > 0) {
                    
                    $('#kelas').empty();

                    data.forEach(d => {
                        
                        $('#kelas').append(`
                            <option value="${d.kelas}">${d.kelas}</option>
                        `);
                    });

                   
                }else{
                    $('#kelas').empty();
                    $('#kelas').append(`
                        <option >Data tidak ada</option>
                    `);
                }
           }
        });

   
    });

    $('#kelas').focusout(function () {
        let kelas = $('#kelas').val();
        $.ajax({
           type:'GET',
           url:"{{ route('getSiswa') }}",
           data:{kelas:kelas},
           success:function(data){
                if (data.length > 0) {
                    
                    $('#siswa').empty();

                    data.forEach(d => {
                        
                        $('#siswa').append(`
                            <option value="${d[0].nama_lengkap}">${d[0].nama_lengkap}</option>
                        `);
                    });

                   
                }else{
                    $('#siswa').empty();
                    $('#siswa').append(`
                        <option >Data tidak ada</option>
                    `);
                }
           }
        });

   
    });

    $('#kelas').click(function(){
        $('#pilih_kelas').remove();
    });
    $('#siswa').click(function(){
        $('#pilih_siswa').remove();
    });
</script>
@stop
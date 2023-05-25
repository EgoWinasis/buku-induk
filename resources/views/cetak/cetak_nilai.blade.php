<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Nilai Siswa</title>
    <link rel="stylesheet" href="{{ asset('cetak.css') }}">
    <link rel="stylesheet" href="{{ asset('paper.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/images/cirlce.png') }}" type="image/x-icon">
</head>

<body>
    <h1 class='text-left my-20' style="text-align: center;font-size:25px">DATA NILAI SISWA / SISWI SD KURIKULUM MERDEKA</h1>


    <table width='100%' style = 'border-bottom:1px solid' >
        <tbody>
            <tr>
                <th width='18%' style='text-align: left;'>NAMA SISWA</th>
                <td width='2%'>:</td>
                <td width='45%' style='text-align: left;'>{{$ketidakhadiran->siswa}}</td>
                <th width='15%' style='text-align: left;'>KELAS</th>
                <td width='2%'>:</td>
                <td width='18%' style='text-align: left;'>{{$ketidakhadiran->kelas}}</td>
            </tr>
            <tr>
                <th width='18%' style='text-align: left;'>NISN</th>
                <td width='2%'>:</td>
                <td width='30%' style='text-align: left;'>{{$siswa->nisn}}</td>
                <th width='28%' style='text-align: left;'>TAHUN PELAJARAN</th>
                <td width='2%'>:</td>
                <td width='20%' style='text-align: left;'>{{$ketidakhadiran->tahun_ajaran}}</td>
            </tr>
        </tbody>
    </table>

    <h5 class='text-left my-20'>A. PROFIL PELAJAR PANCASILA</h5>
            <table width='100%' class='table-border' style="table-layout: fixed;">
                <tbody >
                    <tr>
                        <th width='40%' class='table-border'>DIMENSI</th>
                        <th width='30%' class='table-border'>ELEMEN</th>
                        <th width='30%' class='table-border'>SUB ELEMEN</th>
                    </tr>
                    <tr>
                        <td class='table-border' style="word-wrap: break-word">1. Beriman, bertakwa kepada Tuhan yang Maha Esa dan berakhlak mulia</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b1c1}}</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b1c2}}</td>
                    </tr>
                    <tr>
                        <td class='table-border'>2. Berkebhinekaan Global</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b2c1}}</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b2c2}}</td>
                    </tr>
                    <tr>
                        <td class='table-border'>3. Bergotong Royong</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b3c1}}</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b3c2}}</td>
                    </tr>
                    <tr>
                        <td class='table-border'>4. Mandiri</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b4c1}}</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b4c2}}</td>
                    </tr>
                    <tr>
                        <td class='table-border'>5. Berfikiri Kritis</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b5c1}}</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b5c2}}</td>
                    </tr>
                    <tr>
                        <td class='table-border'>6. Kreatif & Inovatif</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b6c1}}</td>
                        <td class='table-border' style="word-wrap: break-word">{{$pelajarPancasila->b6c2}}</td>
                    </tr>
                </tbody>
            </table>

            <h5 class='text-left my-20'>B. PENGETAHUAN DAN KETERAMPILAN</h5>
            <table width='100%' class='table-border' style = "table-layout: fixed;">
                <tbody >
                    <tr>
                        <th rowspan='2' class='text-center table-border' width='5%'>No</th>
                        <th rowspan='2' class='text-center table-border' width='25%'>Mata Pelajaran</th>
                        <th colspan='2' class='text-center table-border' width='35%'>Semester 1</th>
                        <th colspan='2' class='text-center table-border' width='35%'>Semester 2</th>
                    </tr>
                    <tr class='text-center'>
                        <th width='10%' class='table-border' style="word-wrap: break-word">Nilai Akhir</th>
                        <th class='table-border' width="25%">Capaian Kompetensi (Deskripsi)</th>
                        <th width='10%' class='table-border' style="word-wrap: break-word">Nilai Akhir</th>
                        <th class='table-border' width="25%">Capaian Kompetensi (Deskripsi)</th>

                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>1.</td>
                        <td class='table-border'>Pendidikan Agama dan Budi Pekerti</td>
                        <td class='table-border text-center' style="word-wrap: break-word">
                            {{$pengetahuan->b1c1}}
                        </td>
                        <td class='table-border' style="word-wrap: break-word">
                            {{$pengetahuan->b1c2}}
                        </td>
                        <td class='table-border text-center' style="word-wrap: break-word">
                            {{$pengetahuan->b1c3}}
                        </td>
                        <td class='table-border' style="word-wrap: break-word">
                            {{$pengetahuan->b1c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>2.</td>
                        <td class='table-border'>PPKn / PMP</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b2c1}}
                        </td>
                        <td class='table-border' style="word-wrap: break-word">
                            {{$pengetahuan->b2c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b2c3}}
                        </td>
                        <td class='table-border' style="word-wrap: break-word">
                            {{$pengetahuan->b2c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>3.</td>
                        <td class='table-border'>Bahasa Indonesia</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b3c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b3c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b3c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b3c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>4.</td>
                        <td class='table-border'>Matematika</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b4c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b4c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b4c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b4c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>5.</td>
                        <td class='table-border'>IPA & IPS (IPAS)</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b5c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b5c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b5c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b5c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>6.</td>
                        <td class='table-border'>Bahasa Inggris</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b6c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b6c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b6c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b6c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>7.</td>
                        <td class='table-border'>PJOK</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b7c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b7c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b7c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b7c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>8.</td>
                        <td class='table-border'>Teknologi Informasi dan Komunikasi</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b8c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b8c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b8c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b8c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>9.</td>
                        <td class='table-border'>Seni & Budaya</td>
                        <td class='table-border text-center'>
                           
                        </td>
                        <td class='table-border'>
                           
                        </td>
                        <td class='table-border text-center'>
                          
                        </td>
                        <td class='table-border'>
                           
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'></td>
                        <td class='table-border'>a. Seni Rupa</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b9c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b9c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b9c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b9c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border'></td>
                        <td class='table-border'>b.Seni Musik</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b10c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b10c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b10c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b10c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border'></td>
                        <td class='table-border'>c.Seni Tari</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b11c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b11c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b11c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b11c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>10.</td>
                        <td class='table-border'>Bimbingan dan Konseling</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b12c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b12c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b12c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b12c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'>11.</td>
                        <td class='table-border'>Mulok</td>
                        <td class='table-border text-center'>
                           
                        </td>
                        <td class='table-border'>
                           
                        </td>
                        <td class='table-border text-center'>
                           
                        </td>
                        <td class='table-border'>
                           
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;'></td>
                        <td class='table-border'>a. Bahasa Jawa</td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b13c1}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b13c2}}
                        </td>
                        <td class='table-border text-center'>
                            {{$pengetahuan->b13c3}}
                        </td>
                        <td class='table-border'>
                            {{$pengetahuan->b13c4}}
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;' colspan='2'>Jumlah Nilai</td>
                        <td class='table-border text-center'>
                            {{$total1}}
                        </td>
                        <td class='table-border'>
                           
                        </td>
                        <td class='table-border text-center'>
                        {{$total2}}
                        </td>
                        <td class='table-border'>
                          
                        </td>
                    </tr>
                    <tr>
                        <td class='table-border' style='text-align:center;' colspan='2'>Rata-rata</td>
                        <td class='table-border text-center'>
                            {{$rata_rata1}}
                        </td>
                        <td class='table-border'>
                            
                        </td>
                        <td class='table-border text-center'>
                             {{$rata_rata2}}
                        </td>
                        <td class='table-border'>
                           
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="pagebreak"> </div>
  

            <table width='100%' class='table-border my-20' style="table-layout: fixed;">
                <tbody>
                    <tr>
                        <th class='text-center table-border' width='5%'>No</th>
                        <th class='text-center table-border' width='25%'>Ekstrakulikuler</th>
                        <th class='text-center table-border' width='10%'>Nilai</th>
                        <th class='text-center table-border' width='60%'>Keterangan</th>
                    </tr>
                    <tr>
                        <td class='text-center table-border'>1.</td>
                        <td class='table-border'>Praja Muda Karana</td>
                        <td class='table-border text-center'>
                            {{$ekstra->b1c1}}
                        </td>
                        <td class='table-border' style="word-wrap: break-word">
                            {{$ekstra->b1c2}}
                        </td>
                    </tr>
                    <tr>
                        <td class='text-center table-border'>2.</td>
                        <td class='table-border'>Komputer</td>
                        <td class='table-border text-center'>
                            {{$ekstra->b2c1}}
                        </td>
                        <td class='table-border' style="word-wrap: break-word">
                            {{$ekstra->b2c2}}
                        </td>
                    </tr>
                </tbody>
             </table>

             <br>
             <table width='100%' class='table-border' style="table-layout: fixed;">
                <tbody>
                    <tr>
                        <th class='text-center table-border' width='5%'>No</th>
                        <th class='text-center table-border' width='35%'>Jenis Prestasi</th>
                        <th class='text-center table-border' width='60%'>Keterangan</th>
                    </tr>
                    <tr>
                        <td class='text-center table-border'>1.</td>
                        <td class='table-border'>
                            {{$prestasi->b1c1}}
                        </td>
                        <td class='table-border' style="word-wrap: break-word">
                            {{$prestasi->b1c2}}
                        </td>
                    </tr>
                    <tr>
                        <td class='text-center table-border'>2.</td>
                        <td class='table-border'>
                            {{$prestasi->b2c1}}
                        </td>
                        <td class='table-border' style="word-wrap: break-word">
                            {{$prestasi->b2c2}}
                        </td>
                    </tr>
                    <tr>
                        <td class='text-center table-border'>3.</td>
                        <td class='table-border'>
                            {{$prestasi->b3c1}}
                        </td>
                        <td class='table-border' style="word-wrap: break-word">
                            {{$prestasi->b3c2}}
                        </td>
                    </tr>
                </tbody>
             </table>

             <br>
             <table width='100%' class='table-border'>
                <tbody>
                    <tr>
                         <th class='text-center table-border' width='5%'>No</th>
                        <th class='text-center table-border' width='40%' colspan='3'>Ketidakhadiran</th>
                        <th class='text-center table-border' width='55%' colspan='3'>KENAIKAN</th>
                    </tr>
                    <tr>
                        <td class='text-center table-border'>1.</td>
                        <td class='border-bottom'>
                            Sakit
                        </td>
                        <td class='border-bottom'>:</td>
                        <td class='border-right border-bottom padding-right'>{{$ketidakhadiran->sakit}} hari</td>
                        <td class='padding-left'  width="100px">Berdasarkan pencapaian kompetensi pada semester ke-1 dan ke-2, siswa ditetapkan :</td>
                    </tr>
                    <tr>
                        <td class='text-center table-border'>2.</td>
                        <td class='border-bottom'>
                           Izin
                        </td>
                        <td class='border-bottom'>:</td>
                        <td class='border-right border-bottom padding-right'>{{$ketidakhadiran->izin}} hari</td>
                        <td rowspan='2' class='padding-left'>{{$statusKenaikan}}</td>
                    </tr>
                    <tr>
                        <td class='text-center table-border'>3.</td>
                        <td  class='border-bottom'>
                            Tanpa Keterangan
                        </td>
                        <td  class='border-bottom'>:</td>
                        <td class='border-right border-bottom padding-right' >{{$ketidakhadiran->tanpa_keterangan}} hari</td>
                        <td></td>
                    </tr>
                </tbody>
             </table>

             <br>
             <table width='100%' class='table-border'>
                <tbody>
                    <tr>
                        <td width='5%'></td>
                        <td width='30%' class='text-left pl-20'>
                            <p>Mengetahui,</p>
                        </td>
                        <td width='15%'></td>
                        <td width='15%'></td>
                        <td width='30%' class='text-left pl-20'>
                            <p>Tegal, {{$date}}</p>
                        </td>
                        <td width='5%'></td>

                    </tr>
                    <tr class='highlight'>
                        <td ></td>
                        <td class='text-left pl-20'>
                            <p>Kepala Sekolah</p> 
                        </td>
                        <td></td>
                        <td></td>
                        <td class='text-left  pl-20'>
                            <p>Wali Kelas</p>
                        </td>
                        <td></td>
                    </tr>

                    
                    <tr>
                        <td ></td>
                        @if (!empty($ttd->barcode_kepsek))
                            <td class="barcode">
                                <img width="50%" src="{{asset('storage/images/barcode/' .$ttd->barcode_kepsek)  }}"> 
                            </td>
                        @else
                        <td class="ttd"></td>
                        @endif



                        <td ></td>
                        <td ></td>
                        @if (!empty($ttd->barcode_wali_kelas))
                            <td class="barcode">
                                <img width="50%" src="{{asset('storage/images/barcode/' .$ttd->barcode_wali_kelas)  }}"> 
                            </td>
                        @else
                        <td class="ttd"></td>
                        @endif
                        <td></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td class='text-left  pl-20'>( {{$ttd->kepsek}} )</td>
                        <td></td>
                        <td></td>
                        <td class='text-left  pl-20' >( {{$ttd->wali_kelas}} )</td>
                        <td></td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <td class='text-left  pl-20'>NIP. {{$ttd->nip_kepsek}}</td>
                        <td></td>
                        <td></td>
                        <td class='text-left  pl-20'>NIP. {{$ttd->nip_wali_kelas}}</td>
                        <td></td>

                    </tr>
                </tbody>
             </table>


    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>

</html>
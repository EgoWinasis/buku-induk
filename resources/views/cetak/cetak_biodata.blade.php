<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Biodata</title>
    <link rel="stylesheet" href="{{ asset('cetak.css') }}">
    <link rel="stylesheet" href="{{ asset('paper.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/images/cirlce.png') }}" type="image/x-icon">
</head>

<body>
    <h4 class='text-center'>II. LEMBAR BUKU INDUK SISWA</h4>

    <table width='100%' class="siswa-induk">
        <tbody>
            <tr>
                <td width='35%'>Nomor Induk Siswa</td>
                <td width='3%'>:</td>
                <td width='25%'>{{$siswa->nis}}</td>
                <td width='10%'>NIK</td>
                <td width='3%'>:</td>
                <td width='24%'>{{$siswa->nik}}</td>
            </tr>
            <tr>
                <td width='35%'>Nomor Induk Siswa Nasional</td>
                <td width='3%'>:</td>
                <td width='25%'>{{$siswa->nisn}}</td>
                <td width='10%'>No. KK</td>
                <td width='3%'>:</td>
                <td width='24%'>{{$siswa->no_kk}}</td>
            </tr>
        </tbody>
    </table>

    <h5 class='text-left my-20'>A. KETERANGAN SISWA</h5>
    

    <table width='100%' >
        <tbody>
            <tr>
                <td  width='5%'></td>
                <td  width='5%'>1</td>
                <td  width='30%'>Nama Siswa</td>
                <td  width='3%'></td>
                <td  width='39%'></td>
                <td  width='3%'></td>
                <td rowspan='4' class=' text-right' width='15%' >
                <img src='{{asset($imageUrl)}}' width='100px'>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a. Lengkap</td>
                <td>:</td>
                <td>{{$siswa->nama_lengkap}}</td>
                <td></td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a. Panggilan</td>
                <td>:</td>
                <td>{{$siswa->nama_panggilan}}</td>
                <td></td>
                
            </tr>
            <tr>
                <td></td>
                <td>2</td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{$siswa->jen_kel}}</td>
                <td></td>
                
            </tr>
            <tr>
                <td></td>
                <td>3</td>
                <td>Kelahiran</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a. Tanggal</td>
                <td>:</td>
                <td>{{$siswa->tgl_lahir}}</td>
                <td></td>
                <td rowspan="3" style='font-size:11px' class='text-center'>Cap Tiga jari tengah Tangan Kiri diatas pas photo bagian bawah waktu diterima di sekolah</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>b. Tempat</td>
                <td>:</td>
                <td>{{$siswa->tempat_lahir}}</td>
                <td></td>
               
            </tr>
            <tr>
                <td></td>
                <td>4</td>
                <td>Agama</td>
                <td>:</td>
                <td>{{$siswa->agama}}</td>
                <td></td>
                
            </tr>
            <tr>
                <td></td>
                <td>5</td>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>{{$siswa->kewarganegaraan}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>6</td>
                <td>Jumlah Saudara</td>
                <td>:</td>
                <td>{{$saudara}}</td>
                <td></td>
                <td style='font-size:11px' class='text-center'>tanda tangan siswa</td>
            </tr>
            <tr>
                <td></td>
                <td>7</td>
                <td>Bahasa Sehari-hari dirumah</td>
                <td>:</td>
                <td>{{$siswa->bahasa}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>8</td>
                <td>Golongan Darah</td>
                <td>:</td>
                <td>{{$siswa->gol_darah}}</td>
                <td></td>
                <td width='15%' style='font-size:11px' class='text-center'>(............................)</td>

            </tr>
            <tr>
                <td></td>
                <td>9</td>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$siswa->alamat}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>10</td>
                <td>Nomor Telepon</td>
                <td>:</td>
                <td>{{$siswa->telepon}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>11</td>
                <td>Bertempat Tinggal Pada</td>
                <td>:</td>
                <td>{{$siswa->tempat_tinggal}}</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>12</td>
                <td>Jarak Sekolah</td>
                <td>:</td>
                <td>{{$jarak}}</td>
                <td></td>
                <td></td>

            </tr>
        </tbody>
    </table>


    <h5 class='text-left my-20'>B. KETERANGAN ORANG TUA / WALI SISWA</h5>


    <table width='100%' >
        <tbody>
            <tr>
                <td width='5%'></td>
                <td width='5%'>13</td>
                <td width='30%'>Nama Orang Tua Kandung</td>
                <td width='3%'></td>
                <td width='39%'></td>
                <td width='3%'></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a. Ayah</td>
                <td>:</td>
                <td>{{$ortu->nama_ayah}}</td>
                <td></td>
                <td rowspan='4' class=' text-right' width='15%' >
                    <img src='{{asset($imageUrl)}}' width='100px'>
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a. Ibu</td>
                <td>:</td>
                <td>{{$ortu->nama_ibu}}</td>
                <td></td>
                
            </tr>
           
            <tr>
                <td></td>
                <td>14</td>
                <td>Pendidikan Tertinggi</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a. Ayah</td>
                <td>:</td>
                <td>{{$pendidikanAyah}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>b. Ibu</td>
                <td>:</td>
                <td>{{$pendidikanIbu}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>15</td>
                <td>Pekerjaan</td>
                <td></td>
                <td></td>
                <td></td>
                <td rowspan="3" style='font-size:11px' class='text-center'>Cap Tiga jari tengah Tangan Kiri diatas pas photo bagian bawah waktu diterima di sekolah</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a. Ayah</td>
                <td>:</td>
                <td>{{$ortu->pekerjaan_ayah}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>b. Ibu</td>
                <td>:</td>
                <td>{{$ortu->pekerjaan_ibu}}</td>
                <td></td>
                <td></td>
            </tr>
            
            <tr>
                <td></td>
                <td>16</td>
                <td>Wali Murid</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>a. Nama</td>
                <td>:</td>
                <td>{{$ortu->nama_wali}}</td>
                <td></td>
                <td style='font-size:11px' class='text-center'>tanda tangan siswa</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>b. Hubungan Keluarga</td>
                <td>:</td>
                <td>{{$ortu->hubungan_wali}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>c. Pendidikan Terakhir</td>
                <td>:</td>
                <td>{{$pendidikanWali}}</td>
                <td></td>
                <td width='15%' style='font-size:11px' class='text-center'>(............................)</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>d. Pekerjaan</td>
                <td>:</td>
                <td>{{$ortu->pekerjaan_wali}}</td>
                <td></td>
                <td></td>
            </tr>
           
        </tbody>
    </table>

    <div class="pagebreak"> </div>
    
    <h5 class='text-left my-20'>C. PERKEMBANGAN SISWA</h5>
    
    <table width='100%' >
        <tbody>
            <tr>
                <td  width='5%'></td>
                <td  width='5%'>17</td>
                <td  width='30%'>Pendidikan Sebelumnya</td>
                <td  width='3%'></td>
                <td  width='39%'></td>
                <td  width='3%'></td>
                <td width='15%'></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td colspan='3' >a. Masuk menjadi siswa baru tingkat I</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style='padding-left:10px;'>1. Asal Sekolah</td>
                <td>:</td>
                <td>{{$perkembangan->asal_sekolah}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style='padding-left:10px;'>2. Nama TK</td>
                <td>:</td>
                <td>{{$perkembangan->nama_tk}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style='padding-left:10px;'>3. Tanggal STTB</td>
                <td>:</td>
                <td>{{$perkembangan->tgl_sttb}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style='padding-left:10px;'>4. Nomor STTB</td>
                <td>:</td>
                <td>{{$perkembangan->no_sttb}}</td>
                <td></td>
                <td></td>
                
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td>b. Pindah dari sekolah lain</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style='padding-left:10px;'>1. Asal Sekolah</td>
                <td>:</td>
                <td>{{$perkembangan->asal_sekolah_pindah}}</td>
                <td></td>
                <td></td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style='padding-left:10px;'>2. Dari Tingkat</td>
                <td>:</td>
                <td>{{$tingkatSekolahPindah}}</td>
                <td></td>
                <td></td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td style='padding-left:10px;'>3. Diterima Tanggal</td>
                <td>:</td>
                <td>{{$perkembangan->tgl_diterima}}</td>
                <td></td>
                <td></td>
                
            </tr>
            
        </tbody>
    </table>

    <table width='100%' class='table-border2 my-20'>
        <tbody>
            <tr>
                <td width='5%'></td>
                <td colspan='7'>18. Kesehatan Jasmani</td>
            <tr>
                <td  width='5%'></td>
                <td class='border text-center' width='5%'>a</td>
                <td class='border ' width='20%'>Tahun</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_th_1}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_th_2}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_th_3}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_th_4}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_th_5}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_th_6}}</td>
            </tr>
            <tr>
                <td  width='5%'></td>
                <td class='border text-center' width='5%'>b</td>
                <td class='border ' width='20%'>Berat Badan</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_bb_1}} kg</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_bb_2}} kg</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_bb_3}} kg</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_bb_4}} kg</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_bb_5}} kg</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_bb_6}} kg</td>
            </tr>
            <tr>
                <td  width='5%'></td>
                <td class='border text-center' width='5%'>c</td>
                <td class='border ' width='20%'>Tinggi Badan</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_tb_1}} cm</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_tb_2}} cm</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_tb_3}} cm</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_tb_4}} cm</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_tb_5}} cm</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_tb_6}} cm</td>
            </tr>
            <tr>
                <td  width='5%'></td>
                <td class='border text-center' width='5%'>d</td>
                <td class='border ' width='20%'>Penyakit</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_pt_1}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_pt_2}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_pt_3}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_pt_4}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_pt_5}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_pt_6}}</td>
            </tr>
            <tr>
                <td  width='5%'></td>
                <td class='border text-center' width='5%'>e</td>
                <td class='border ' width='20%'>Keahlian Jasmani</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_kj_1}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_kj_2}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_kj_3}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_kj_4}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_kj_5}}</td>
                <td class='border text-center' width='10%'>{{$jasmani->jas_kj_6}}</td>
            </tr>
           
            
        </tbody>
    </table>

    <h5 class='text-left my-20'>D. BEASISWA</h5>

    <table width='100%' >
        <tbody>
            <tr>
                <td width='5%'></td>
                <td width='5%'>19</td>
                <td width='30%'>Jenis Beasiswa</td>
                <td width='3%'>:</td>
                <td width='39%'>{{$beasiswa->beasiswa}}</td>
                <td width='3%'></td>
                <td width='15%'></td>
            </tr>
            
        </tbody>
    </table>


        <h5 class='text-left my-20'>E. MENINGGALKAN SEKOLAH</h5>

        <table width='100%' >
            <tbody>
                <tr>
                    <td width='5%'></td>
                    <td width='5%'>20</td>
                    <td width='30%'>Tamat Belajar</td>
                    <td width='3%'></td>
                    <td width='39%'></td>
                    <td width='3%'></td>
                    <td width='15%'></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>a. Tahun Tamat</td>
                    <td>:</td>
                    <td>{{$meninggalkan->thn_tamat}}</td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>b. Nomor Ijazah / STTB</td>
                    <td>:</td>
                    <td>{{$meninggalkan->no_ijazah}}</td>
                    <td></td>
                    <td></td>
                    
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>c. Melanjutkan Ke Sekolah</td>
                    <td>:</td>
                    <td>{{$meninggalkan->lanjut_sekolah_tamat}}</td>
                    <td></td>
                    <td></td>
                    
                </tr>

                <tr>
                    <td></td>
                    <td>21</td>
                    <td>Pindah Sekolah</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td ></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>a. Dari Tingkat</td>
                    <td>:</td>
                    <td>{{$dariTingkat}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>b. Ke Sekolah</td>
                    <td>:</td>
                    <td>{{$meninggalkan->lanjut_sekolah_pindah}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>c. Ke Tingkat</td>
                    <td>:</td>
                    <td>{{$keTingkat}}</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td>22</td>
                    <td>Keluar Sekolah</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>a. Tanggal</td>
                    <td>:</td>
                    <td>{{$meninggalkan->tgl_keluar_sekolah}}</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>b. Alasan</td>
                    <td>:</td>
                    <td>{{$meninggalkan->alasan_keluar_sekolah}}</td>
                    <td></td>
                    <td></td>
                </tr>
                
                
                
            </tbody>
        </table>

        <h5 class='text-left my-20'>F. LAIN-LAIN</h5>
        <p  style='margin-left:5%;'>{{$lain->lain_lain}}</p>



    <script type="text/javascript">
        window.onload = function() { window.print(); }
    </script>
</body>

</html>
<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Guru;
use App\Models\Ketidakhadiran;
use App\Models\ModelBeasiswa;
use App\Models\ModelIjazah;
use App\Models\ModelKenaikan;
use App\Models\ModelKesehatan;
use App\Models\ModelKompetensi;
use App\Models\ModelLainLain;
use App\Models\ModelMeninggalkanSekolah;
use App\Models\ModelOrangTua;
use App\Models\ModelProgressSiswa;
use App\Models\ModelTandaTangan;
use App\Models\PelajarPancasila;
use App\Models\Pengetahuan;
use App\Models\Prestasi;
use App\Models\Students;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Mpdf\Mpdf as PDF;


class cetakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = DB::table('students')
            ->select('id', 'nis', 'nama_lengkap')
            ->orderBy('nis')
            ->get();

        // dd($kepalaSekolah);
        return view('cetak.cetak_view')
            ->with(compact('siswa'));
    }


    public function cover()
    {

        $tahunCetak = $_COOKIE['tahun_cetak'];

        return view('cetak.cetak_cover')
        ->with(compact('tahunCetak'));
        // $documentFileName = "cover.pdf";

        // // Create the mPDF document
        // $document = new PDF([
        //     'mode' => 'utf-8',
        //     'format' => 'A4',
        //     'margin_header' => '3',
        //     'margin_top' => '10',
        //     'margin_bottom' => '10',
        //     'margin_footer' => '2',
        //     'default_font_size' => 16,
        //     'default_font' => 'sans-serif'
        // ]);

        // // Set some header informations for output
        // $header = [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        // ];

        // // Write some simple Content
        // $stylesheet = file_get_contents('cetak.css');
        // $document->SetTitle("HALAMAN COVER");
        // $document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        // $document->WriteHTML("
        //     <table width='100%'>
        //         <tbody>
        //             <tr>
        //                <td colspan='2' class=' text-left'>
        //                    <h2>MERDEKA</h2>
        //                </td> 
        //             </tr>
        //             <tr>
        //                <td colspan='2' class=' text-left'>
        //                    <h2>BELAJAR</h2>
        //                </td> 
        //             </tr>
                    
        //             <tr>
        //                <td colspan='2' class=' text-center'>
        //                    <img src='storage/images/logo.jpg' width='400px'>
        //                </td> 
        //             </tr>
        //             <tr>
        //                 <td colspan='2' class=' text-center'>
        //                     <h1> BUKU INDUK REGISTER </h1>
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td colspan='2' class=' text-center'>
        //                     <h1> PESERTA DIDIK </h1>
        //                  </td>
        //             </tr>
        //             <tr>
        //                 <td colspan='2' class=' text-center'>
        //                     <h1> KURIKULUM MERDEKA </h1>
        //                  </td>
        //             </tr>
        //             <tr>
        //                 <td colspan='2' class=' text-center'>
        //                     <h1> SEKOLAH DASAR (SD) </h1>
        //                  </td>
        //             </tr>
        //             <tr>
        //                 <td colspan='2' class=' text-center'>
        //                     <h1>  {$tahunCetak} </h1>
        //                  </td>
        //             </tr>
        //         </tbody>
        //     </table>
        // ");

        // $document->WriteHTML("
        //     <div class='rcorners2'>
        //         <table width='100%' class='table-border-out'>
        //             <tbody>
        //                 <tr>
        //                 <td  class=' text-left'>
        //                     <h4>NAMA SEKOLAH</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>:</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>SDN GETASKEREP 01</h4>
        //                 </td> 
        //                 </tr>
        //                 <tr>
        //                 <td  class=' text-left'>
        //                     <h4>ALAMAT SEKOLAH</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>:</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>JALAN PROJOSUMARTO 1</h4>
        //                 </td> 
        //                 </tr>
        //                 <tr>
        //                 <td  class=' text-left'>
        //                     <h4>DESA / KELURAHAN</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>:</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>DESA GETASKEREP</h4>
        //                 </td> 
        //                 </tr>
        //                 <tr>
        //                 <td  class=' text-left'>
        //                     <h4>KECAMATAN</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>:</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>TALANG</h4>
        //                 </td> 
        //                 </tr>
        //                 <tr>
        //                 <td  class=' text-left'>
        //                     <h4>KABUPATEN / KOTA</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>:</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>KABUPATEN TEGAL</h4>
        //                 </td> 
        //                 </tr>
        //                 <tr>
        //                 <td  class=' text-left'>
        //                     <h4>PROVINSI</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>:</h4>
        //                 </td> 
        //                 <td  class=' text-left'>
        //                     <h4>JAWA TENGAH</h4>
        //                 </td> 
        //                 </tr>
                        
        //             </tbody>
        //         </table>
        //     </div>
        // ");


        // $document->Output("Cover-{$tahunCetak}.pdf", 'D');
    }


    public function biodata($id)
    {
        // get data
        $siswa = Students::find($id);
        $ortu = ModelOrangTua::where('siswa_id', $id)->first();
        $perkembangan = ModelProgressSiswa::where('siswa_id', $id)->first();
        $jasmani = ModelKesehatan::where('siswa_id', $id)->first();
        $beasiswa = ModelBeasiswa::where('siswa_id', $id)->first();
        $meninggalkan = ModelMeninggalkanSekolah::where('siswa_id', $id)->first();
        $lain = ModelLainLain::where('siswa_id', $id)->first();

        // 
        $documentFileName = "cover.pdf";

        if ($siswa->foto_siswa == 'user_default_profil.png') {
            $imageUrl = 'storage/images/user_default_profil.png';
        } else {
            $imageUrl = "storage/images/foto-siswa/{$siswa->foto_siswa}";
        }

        if ($siswa->jml_saudara == 0) {
            $saudara = "";
        } else {
            $saudara = $siswa->jml_saudara;
        }

        // jarak
        if ($siswa->jarak == NULL) {
            $jarak = "";
        } else {
            $jarak = $siswa->jarak . " kilometer";
        }

        // ayah
        if ($ortu->nama_ayah == null && $ortu->pekerjaan_ayah == null) {
            $pendidikanAyah = "";
        } else {
            $pendidikanAyah = $ortu->pendidikan_ayah;
        }

        // ibu
        if ($ortu->nama_ibu == null && $ortu->pekerjaan_ibu == null) {
            $pendidikanIbu = "";
        } else {
            $pendidikanIbu = $ortu->pendidikan_ibu;
        }
        // wali
        if ($ortu->nama_wali == null && $ortu->pekerjaan_wali == null) {
            $pendidikanWali = "";
        } else {
            $pendidikanWali = $ortu->pendidikan_wali;
        }

        // sekolah pindah

        if ($perkembangan->asal_sekolah_pindah == null && $perkembangan->tingkat_sekolah_pindah == '1') {
            $tingkatSekolahPindah = "";
        } else {
            $tingkatSekolahPindah = $perkembangan->tingkat_sekolah_pindah;
        }
        // meninggalkan sekolah
        // sekolah pindah

        if ($meninggalkan->lanjut_sekolah_pindah == null && $meninggalkan->dari_tingkat == '1' && $meninggalkan->ke_tingkat == '1') {
            $dariTingkat = "";
            $keTingkat = "";
        } else {
            $dariTingkat = $meninggalkan->dari_tingkat;
            $keTingkat = $meninggalkan->ke_tingkat;
        }


        // // Create the mPDF document
        // $document = new PDF([
        //     'mode' => 'utf-8',
        //     'format' => 'A4',
        //     'margin_header' => '3',
        //     'margin_top' => '10',
        //     'margin_bottom' => '10',
        //     'margin_footer' => '2',
        //     'default_font_size' => 12,
        //     'default_font' => 'sans-serif'
        // ]);

        // Set some header informations for output
        // $header = [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        // ];

        // // Write some simple Content
        // $stylesheet = file_get_contents('cetak.css');
        // $document->SetTitle("HALAMAN BIODATA SISWA");
        // $document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        // $document->WriteHTML("
        //     <h4 class='text-center'>II. LEMBAR BUKU INDUK SISWA</h4>
        // ");

        // $document->WriteHTML("
        //     <table width='100%'>
        //         <tbody>
        //             <tr>
        //                 <td width='35%'>Nomor Induk Siswa</td>
        //                 <td width='3%'>:</td>
        //                 <td width='25%'>{$siswa->nis}</td>
        //                 <td width='10%'>NIK</td>
        //                 <td width='3%'>:</td>
        //                 <td width='24%'>{$siswa->nik}</td>
        //             </tr>
        //             <tr>
        //                 <td width='35%'>Nomor Induk Siswa Nasional</td>
        //                 <td width='3%'>:</td>
        //                 <td width='25%'>{$siswa->nisn}</td>
        //                 <td width='10%'>No. KK</td>
        //                 <td width='3%'>:</td>
        //                 <td width='24%'>{$siswa->no_kk}</td>
        //             </tr>
        //         </tbody>
        //     </table>
        // ");

    //     $document->WriteHTML("
    //         <h5 class='text-left'>A. KETERANGAN SISWA</h5>
    //     ");

    //     $document->WriteHTML("
        //     <table width='100%' >
        //         <tbody>
        //             <tr>
        //                 <td  width='5%'></td>
        //                 <td  width='5%'>1</td>
        //                 <td  width='30%'>Nama Siswa</td>
        //                 <td  width='3%'></td>
        //                 <td  width='39%'></td>
        //                 <td  width='3%'></td>
        //                 <td rowspan='4' class=' text-right' width='15%' >
        //                 <img src='{$imageUrl}' width='100px'>
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >a. Lengkap</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->nama_lengkap}</td>
        //                 <td  ></td>
                        
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >a. Panggilan</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->nama_panggilan}</td>
        //                 <td  ></td>
                        
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >2</td>
        //                 <td  >Jenis Kelamin</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->jen_kel}</td>
        //                 <td  ></td>
                        
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >3</td>
        //                 <td  >Kelahiran</td>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >a. Tanggal</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->tgl_lahir}</td>
        //                 <td  ></td>
        //                 <td style='font-size:11px' class='text-center'>tanda tangan siswa</td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >b. Tempat</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->tempat_lahir}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >4</td>
        //                 <td  >Agama</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->agama}</td>
        //                 <td  ></td>
        //                 <td style='font-size:11px' class='text-center'>(.........................)</td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >5</td>
        //                 <td  >Kewarganegaraan</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->kewarganegaraan}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >6</td>
        //                 <td  >Jumlah Saudara</td>
        //                 <td  >:</td>
        //                 <td  >{$saudara}</td>
        //                 <td  ></td>
        //                 <td rowspan='4' class=' text-right' width='15%' >
        //                 <img src='{$imageUrl}' width='100px'>
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >7</td>
        //                 <td  >Bahasa Sehari-hari dirumah</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->bahasa}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >8</td>
        //                 <td  >Golongan Darah</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->gol_darah}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >9</td>
        //                 <td  >Alamat</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->alamat}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >10</td>
        //                 <td  >Nomor Telepon</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->telepon}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >11</td>
        //                 <td  >Bertempat Tinggal Pada</td>
        //                 <td  >:</td>
        //                 <td  >{$siswa->tempat_tinggal}</td>
        //                 <td  ></td>
        //                 <td style='font-size:11px' class='text-center'>tanda tangan siswa</td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >12</td>
        //                 <td  >Jarak Sekolah</td>
        //                 <td  >:</td>
        //                 <td  >{$jarak}</td>
        //                 <td  ></td>
        //                 <td style='font-size:11px' class='text-center'>(.........................)</td>

        //             </tr>
        //         </tbody>
        //     </table>
        // ");
        // $document->WriteHTML("
        //     <h5 class='text-left'>B. KETERANGAN ORANG TUA / WALI SISWA</h5>
        // ");

        // $document->WriteHTML("
        //     <table width='100%' >
        //         <tbody>
        //             <tr>
        //                 <td  width='5%'></td>
        //                 <td  width='5%'>13</td>
        //                 <td  width='30%'>Nama Orang Tua Kandung</td>
        //                 <td  width='3%'></td>
        //                 <td  width='39%'></td>
        //                 <td  width='3%'></td>
        //                 <td width='15%'></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >a. Ayah</td>
        //                 <td  >:</td>
        //                 <td  >{$ortu->nama_ayah}</td>
        //                 <td  ></td>
                        
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >a. Ibu</td>
        //                 <td  >:</td>
        //                 <td  >{$ortu->nama_ibu}</td>
        //                 <td  ></td>
                        
        //             </tr>
                   
        //             <tr>
        //                 <td  ></td>
        //                 <td  >14</td>
        //                 <td  >Pendidikan Tertinggi</td>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >a. Ayah</td>
        //                 <td  >:</td>
        //                 <td  >{$pendidikanAyah}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >b. Ibu</td>
        //                 <td  >:</td>
        //                 <td  >{$pendidikanIbu}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  >15</td>
        //                 <td  >Pekerjaan</td>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >a. Ayah</td>
        //                 <td  >:</td>
        //                 <td  >{$ortu->pekerjaan_ayah}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >b. Ibu</td>
        //                 <td  >:</td>
        //                 <td  >{$ortu->pekerjaan_ibu}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
                    
        //             <tr>
        //                 <td  ></td>
        //                 <td  >16</td>
        //                 <td  >Wali Murid</td>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >a. Nama</td>
        //                 <td  >:</td>
        //                 <td  >{$ortu->nama_wali}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >b. Hubungan Keluarga</td>
        //                 <td  >:</td>
        //                 <td  >{$ortu->hubungan_wali}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >c. Pendidikan Terakhir</td>
        //                 <td  >:</td>
        //                 <td  >{$pendidikanWali}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
        //             <tr>
        //                 <td  ></td>
        //                 <td  ></td>
        //                 <td  >d. Pekerjaan</td>
        //                 <td  >:</td>
        //                 <td  >{$ortu->pekerjaan_wali}</td>
        //                 <td  ></td>
        //                 <td></td>
        //             </tr>
                   
        //         </tbody>
        //     </table>
    //     ");

    //     $document->AddPage();

    //     $document->WriteHTML("
    //     <h5 class='text-left'>C. PERKEMBANGAN SISWA</h5>
    // ");

    //     $document->WriteHTML("
        // <table width='100%' >
        //     <tbody>
        //         <tr>
        //             <td  width='5%'></td>
        //             <td  width='5%'>17</td>
        //             <td  width='30%'>Pendidikan Sebelumnya</td>
        //             <td  width='3%'></td>
        //             <td  width='39%'></td>
        //             <td  width='3%'></td>
        //             <td width='15%'></td>
        //         </tr>
        //         <tr>
        //             <td  ></td>
        //             <td  ></td>
        //             <td  colspan='3' >a. Masuk menjadi siswa baru tingkat I</td>
        //             <td  ></td>
        //             <td></td>
        //         </tr>
        //         <tr>
        //             <td  ></td>
        //             <td  ></td>
        //             <td  style='padding-left:10px;'>1. Asal Sekolah</td>
        //             <td  >:</td>
        //             <td  >{$perkembangan->asal_sekolah}</td>
        //             <td  ></td>
        //             <td></td>
        //         </tr>
        //         <tr>
        //             <td  ></td>
        //             <td  ></td>
        //             <td   style='padding-left:10px;'>2. Nama TK</td>
        //             <td  >:</td>
        //             <td  >{$perkembangan->nama_tk}</td>
        //             <td  ></td>
        //             <td></td>
        //         </tr>
        //         <tr>
        //             <td  ></td>
        //             <td  ></td>
        //             <td   style='padding-left:10px;'>3. Tanggal STTB</td>
        //             <td  >:</td>
        //             <td  >{$perkembangan->tgl_sttb}</td>
        //             <td  ></td>
        //             <td></td>
        //         </tr>
        //         <tr>
        //             <td  ></td>
        //             <td  ></td>
        //             <td   style='padding-left:10px;'>4. Nomor STTB</td>
        //             <td  >:</td>
        //             <td  >{$perkembangan->no_sttb}</td>
        //             <td  ></td>
        //             <td></td>
                    
        //         </tr>

        //         <tr>
        //             <td  ></td>
        //             <td  ></td>
        //             <td  >b. Pindah dari sekolah lain</td>
        //             <td  ></td>
        //             <td  ></td>
        //             <td  ></td>
        //             <td></td>
                    
        //         </tr>
        //         <tr>
        //             <td  ></td>
        //             <td  ></td>
        //             <td   style='padding-left:10px;'>1. Asal Sekolah</td>
        //             <td  >:</td>
        //             <td  >{$perkembangan->asal_sekolah_pindah}</td>
        //             <td  ></td>
        //             <td></td>
                    
        //         </tr>
        //         <tr>
        //             <td  ></td>
        //             <td  ></td>
        //             <td   style='padding-left:10px;'>2. Dari Tingkat</td>
        //             <td  >:</td>
        //             <td  >{$tingkatSekolahPindah}</td>
        //             <td  ></td>
        //             <td></td>
                    
        //         </tr>
        //         <tr>
        //             <td  ></td>
        //             <td  ></td>
        //             <td   style='padding-left:10px;'>3. Diterima Tanggal</td>
        //             <td  >:</td>
        //             <td  >{$perkembangan->tgl_diterima}</td>
        //             <td  ></td>
        //             <td></td>
                    
        //         </tr>
                
        //     </tbody>
        // </table>
    // ");
    //     $document->WriteHTML("
        // <table width='100%' class='table-border2'>
        //     <tbody>
        //         <tr>
        //             <td width='5%'></td>
        //             <td colspan='7'>18. Kesehatan Jasmani</td>
        //         <tr>
        //             <td  width='5%'></td>
        //             <td class='border text-center' width='5%'>a</td>
        //             <td class='border ' width='20%'>Tahun</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_th_1}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_th_2}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_th_3}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_th_4}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_th_5}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_th_6}</td>
        //         </tr>
        //         <tr>
        //             <td  width='5%'></td>
        //             <td class='border text-center' width='5%'>b</td>
        //             <td class='border ' width='20%'>Berat Badan</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_bb_1} kg</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_bb_2} kg</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_bb_3} kg</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_bb_4} kg</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_bb_5} kg</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_bb_6} kg</td>
        //         </tr>
        //         <tr>
        //             <td  width='5%'></td>
        //             <td class='border text-center' width='5%'>c</td>
        //             <td class='border ' width='20%'>Tinggi Badan</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_tb_1} cm</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_tb_2} cm</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_tb_3} cm</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_tb_4} cm</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_tb_5} cm</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_tb_6} cm</td>
        //         </tr>
        //         <tr>
        //             <td  width='5%'></td>
        //             <td class='border text-center' width='5%'>d</td>
        //             <td class='border ' width='20%'>Penyakit</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_pt_1}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_pt_2}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_pt_3}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_pt_4}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_pt_5}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_pt_6}</td>
        //         </tr>
        //         <tr>
        //             <td  width='5%'></td>
        //             <td class='border text-center' width='5%'>e</td>
        //             <td class='border ' width='20%'>Keahlian Jasmani</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_kj_1}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_kj_2}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_kj_3}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_kj_4}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_kj_5}</td>
        //             <td class='border text-center' width='10%'>{$jasmani->jas_kj_6}</td>
        //         </tr>
               
                
        //     </tbody>
        // </table>
    // ");

    //     $document->WriteHTML("
    //     <h5 class='text-left'>D. BEASISWA</h5>
    // ");

    //     $document->WriteHTML("
        // <table width='100%' >
        //     <tbody>
        //         <tr>
        //             <td  width='5%'></td>
        //             <td  width='5%'>19</td>
        //             <td  width='30%'>Jenis Beasiswa</td>
        //             <td  width='3%'>:</td>
        //             <td  width='39%'>{$beasiswa->beasiswa}</td>
        //             <td  width='3%'></td>
        //             <td width='15%'></td>
        //         </tr>
                
        //     </tbody>
        // </table>
    // ");

    //     $document->WriteHTML("
    //     <h5 class='text-left'>E. MENINGGALKAN SEKOLAH</h5>
    // ");

    //     $document->WriteHTML("
    //     <table width='100%' >
    //         <tbody>
    //             <tr>
    //                 <td  width='5%'></td>
    //                 <td  width='5%'>20</td>
    //                 <td  width='30%'>Tamat Belajar</td>
    //                 <td  width='3%'></td>
    //                 <td  width='39%'></td>
    //                 <td  width='3%'></td>
    //                 <td width='15%'></td>
    //             </tr>
    //             <tr>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td  >a. Tahun Tamat</td>
    //                 <td  >:</td>
    //                 <td  >{$meninggalkan->thn_tamat}</td>
    //                 <td  ></td>
    //                 <td></td>
                    
    //             </tr>
    //             <tr>
    //                 <td ></td>
    //                 <td ></td>
    //                 <td >b. Nomor Ijazah / STTB</td>
    //                 <td >:</td>
    //                 <td >{$meninggalkan->no_ijazah}</td>
    //                 <td ></td>
    //                 <td></td>
                    
    //             </tr>
    //             <tr>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td  >c. Melanjutkan Ke Sekolah</td>
    //                 <td  >:</td>
    //                 <td  >{$meninggalkan->lanjut_sekolah_tamat}</td>
    //                 <td  ></td>
    //                 <td></td>
                    
    //             </tr>

    //             <tr>
    //                 <td  ></td>
    //                 <td  >21</td>
    //                 <td  >Pindah Sekolah</td>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td ></td>
    //             </tr>
    //             <tr>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td  >a. Dari Tingkat</td>
    //                 <td  >:</td>
    //                 <td  >{$dariTingkat}</td>
    //                 <td  ></td>
    //                 <td></td>
    //             </tr>
    //             <tr>
    //                 <td ></td>
    //                 <td ></td>
    //                 <td >b. Ke Sekolah</td>
    //                 <td >:</td>
    //                 <td >{$meninggalkan->lanjut_sekolah_pindah}</td>
    //                 <td ></td>
    //                 <td></td>
    //             </tr>
    //             <tr>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td  >c. Ke Tingkat</td>
    //                 <td  >:</td>
    //                 <td  >{$keTingkat}</td>
    //                 <td  ></td>
    //                 <td></td>
    //             </tr>

    //             <tr>
    //                 <td  ></td>
    //                 <td  >22</td>
    //                 <td  >Keluar Sekolah</td>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td ></td>
    //             </tr>
    //             <tr>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td  >a. Tanggal</td>
    //                 <td  >:</td>
    //                 <td  >{$meninggalkan->tgl_keluar_sekolah}</td>
    //                 <td  ></td>
    //                 <td></td>
    //             </tr>
    //             <tr>
    //                 <td  ></td>
    //                 <td  ></td>
    //                 <td  >b. Alasan</td>
    //                 <td  >:</td>
    //                 <td  >{$meninggalkan->alasan_keluar_sekolah}</td>
    //                 <td  ></td>
    //                 <td></td>
    //             </tr>
                
                
                
    //         </tbody>
    //     </table>
    // ");

    //     $document->WriteHTML("
    //     <h5 class='text-left'>F. LAIN-LAIN</h5>
    // ");

    //     $document->WriteHTML("
    //     <p  style='margin-left:5%;'>{$lain->lain_lain}</p>
    // ");
    // $document->Output("{$siswa->nis}-{$siswa->nama_lengkap}.pdf", 'I');

    return view('cetak.cetak_biodata')
    ->with(compact('siswa'))
    ->with(compact('ortu'))
    ->with(compact('imageUrl'))
    ->with(compact('saudara'))
    ->with(compact('jarak'))
    ->with(compact('pendidikanAyah'))
    ->with(compact('pendidikanIbu'))
    ->with(compact('pendidikanWali'))
    ->with(compact('perkembangan'))
    ->with(compact('tingkatSekolahPindah'))
    ->with(compact('jasmani'))
    ->with(compact('beasiswa'))
    ->with(compact('meninggalkan'))
    ->with(compact('dariTingkat'))
    ->with(compact('keTingkat'))
    ->with(compact('lain'))
    ;
    }


    public function nilai($id)
    {

        // 

        // get data
        $ketidakhadiran = Ketidakhadiran::find($id);
        $siswa = Students::where('nama_lengkap', $ketidakhadiran['siswa'])
            ->first();
        $pelajarPancasila = PelajarPancasila::where('tahun_ajaran', $ketidakhadiran['tahun_ajaran'])
            ->where('kelas', $ketidakhadiran['kelas'])
            ->where('siswa', $ketidakhadiran['siswa'])
            ->first();

        $pengetahuan = Pengetahuan::where('tahun_ajaran', $ketidakhadiran['tahun_ajaran'])
            ->where('kelas', $ketidakhadiran['kelas'])
            ->where('siswa', $ketidakhadiran['siswa'])
            ->first();

        $ekstra = Ekstrakulikuler::where('tahun_ajaran', $ketidakhadiran['tahun_ajaran'])
            ->where('kelas', $ketidakhadiran['kelas'])
            ->where('siswa', $ketidakhadiran['siswa'])
            ->first();

        $prestasi = Prestasi::where('tahun_ajaran', $ketidakhadiran['tahun_ajaran'])
            ->where('kelas', $ketidakhadiran['kelas'])
            ->where('siswa', $ketidakhadiran['siswa'])
            ->first();
        $kenaikan = ModelKenaikan::where('tahun_ajaran', $ketidakhadiran['tahun_ajaran'])
            ->where('kelas', $ketidakhadiran['kelas'])
            ->where('siswa', $ketidakhadiran['siswa'])
            ->first();
        $ttd = ModelTandaTangan::where('tahun_ajaran', $ketidakhadiran['tahun_ajaran'])
            ->where('kelas', $ketidakhadiran['kelas'])
            ->where('siswa', $ketidakhadiran['siswa'])
            ->first();



        // get date
        $date = date("d-m-Y");

        // get sum and avg
        $total1 = 0;
        $total2 = 0;

        for ($i = 1; $i <= 13; $i++) {
            $total1 = $total1 + $pengetahuan['b' . $i . 'c1'];
        }

        for ($i = 1; $i <= 13; $i++) {
            $total2 = $total2 + $pengetahuan['b' . $i . 'c3'];
        }

        $rata_rata1 = round(round(($total1 / 13), 2), 0, PHP_ROUND_HALF_ODD);
        $rata_rata2 = round(round(($total2 / 13), 2), 0, PHP_ROUND_HALF_ODD);

        // dd($rata_rata);
        $documentFileName = "Nilai.pdf";

        if ($kenaikan->status  == 'Lulus' || $kenaikan->status_kelas == "Lulus") {
            $statusKenaikan = "Lulus";
        }
        else if ($kenaikan->status  == 'Naik') {
            $statusKenaikan = 'Naik ke kelas ' . $kenaikan->status_kelas;
        } else {
            $statusKenaikan = 'Tinggal di kelas ' . $kenaikan->status_kelas;
        }


        




        // // Create the mPDF document
        // $document = new PDF([
        //     'mode' => 'utf-8',
        //     'format' => 'A4',
        //     'margin_header' => '3',
        //     'margin_top' => '10',
        //     'margin_bottom' => '10',
        //     'margin_footer' => '2',
        //     'default_font_size' => 12,
        //     'default_font' => 'sans-serif'
        // ]);

        // // Set some header informations for output
        // $header = [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        // ];

        // // Write some simple Content
        // $stylesheet = file_get_contents('cetak.css');

        // $document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        // // $document->SetTitle("HALAMAN DATA NILAI");
        // $document->WriteHTML('<h1 style="text-align: center;font-size:20px">DATA NILAI SISWA / SISWI SD KURIKULUM MERDEKA</h1>');
        // $document->WriteHTML("
        //     <table width='100%' style = 'border-bottom:1px solid'>
        //         <tbody>
        //             <tr>
        //                 <th width='18%' style='text-align: left;'>NAMA SISWA</th>
        //                 <td width='2%'>:</td>
        //                 <td width='45%' style='text-align: left;'>{$ketidakhadiran->siswa}</td>
        //                 <th width='15%' style='text-align: left;'>KELAS</th>
        //                 <td width='2%'>:</td>
        //                 <td width='18%' style='text-align: left;'>{$ketidakhadiran->kelas}</td>
        //             </tr>
        //             <tr>
        //                 <th width='18%' style='text-align: left;'>NISN</th>
        //                 <td width='2%'>:</td>
        //                 <td width='30%' style='text-align: left;'>{$siswa->nisn}</td>
        //                 <th width='28%' style='text-align: left;'>TAHUN PELAJARAN</th>
        //                 <td width='2%'>:</td>
        //                 <td width='20%' style='text-align: left;'>{$ketidakhadiran->tahun_ajaran}</td>
        //             </tr>
        //         </tbody>
        //     </table>
        // ");
        // pelajar pancasila
        // $document->WriteHTML("
        // <h5>A. PROFIL PELAJAR PANCASILA</h5>
        //     <table width='100%' class='table-border'>
        //         <tbody >
        //             <tr>
        //                 <th width='40%' class='table-border'>DIMENSI</th>
        //                 <th width='30%' class='table-border'>ELEMEN</th>
        //                 <th width='30%' class='table-border'>SUB ELEMEN</th>
        //             </tr>
        //             <tr>
        //                 <td class='table-border'>1. Beriman, bertakwa kepada Tuhan yang Maha Esa dan berakhlak mulia</td>
        //                 <td class='table-border'>{$pelajarPancasila->b1c1}</td>
        //                 <td class='table-border'>{$pelajarPancasila->b1c2}</td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border'>2. Berkebhinekaan Global</td>
        //                 <td class='table-border'>{$pelajarPancasila->b2c1}</td>
        //                 <td class='table-border'>{$pelajarPancasila->b2c2}</td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border'>3. Bergotong Royong</td>
        //                 <td class='table-border'>{$pelajarPancasila->b3c1}</td>
        //                 <td class='table-border'>{$pelajarPancasila->b3c2}</td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border'>4. Mandiri</td>
        //                 <td class='table-border'>{$pelajarPancasila->b4c1}</td>
        //                 <td class='table-border'>{$pelajarPancasila->b4c2}</td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border'>5. Berfikiri Kritis</td>
        //                 <td class='table-border'>{$pelajarPancasila->b5c1}</td>
        //                 <td class='table-border'>{$pelajarPancasila->b5c2}</td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border'>6. Kreatif & Inovatif</td>
        //                 <td class='table-border'>{$pelajarPancasila->b6c1}</td>
        //                 <td class='table-border'>{$pelajarPancasila->b6c2}</td>
        //             </tr>
        //         </tbody>
        //     </table>
        // ");
        // // pengetahuan
        // $document->WriteHTML("
        // <h5>B. PENGETAHUAN DAN KETERAMPILAN</h5>
        //     <table width='100%' class='table-border'>
        //         <tbody >
        //             <tr>
        //                 <th rowspan='2' class='text-center table-border' width='5%'>No</th>
        //                 <th rowspan='2' class='text-center table-border' width='25%'>Mata Pelajaran</th>
        //                 <th colspan='2' class='text-center table-border' width='35%'>Semester 1</th>
        //                 <th colspan='2' class='text-center table-border' width='35%'>Semester 2</th>
        //             </tr>
        //             <tr class='text-center'>
        //                 <th width='10%' class='table-border'>Nilai Akhir</th>
        //                 <th class='table-border'>Capaian Kompetensi (Deskripsi)</th>
        //                 <th width='10%' class='table-border'>Nilai Akhir</th>
        //                 <th class='table-border'>Capaian Kompetensi (Deskripsi)</th>

        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>1.</td>
        //                 <td class='table-border'>Pendidikan Agama dan Budi Pekerti</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b1c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b1c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b1c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b1c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>2.</td>
        //                 <td class='table-border'>PPKn / PMP</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b2c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b2c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b2c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b2c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>3.</td>
        //                 <td class='table-border'>Bahasa Indonesia</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b3c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b3c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b3c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b3c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>4.</td>
        //                 <td class='table-border'>Matematika</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b4c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b4c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b4c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b4c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>5.</td>
        //                 <td class='table-border'>IPA & IPS (IPAS)</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b5c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b5c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b5c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b5c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>6.</td>
        //                 <td class='table-border'>Bahasa Inggris</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b6c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b6c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b6c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b6c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>7.</td>
        //                 <td class='table-border'>PJOK</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b7c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b7c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b7c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b7c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>8.</td>
        //                 <td class='table-border'>Teknologi Informasi dan Komunikasi</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b8c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b8c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b8c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b8c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>9.</td>
        //                 <td class='table-border'>Seni & Budaya</td>
        //                 <td class='table-border text-center'>
                           
        //                 </td>
        //                 <td class='table-border'>
                           
        //                 </td>
        //                 <td class='table-border text-center'>
                          
        //                 </td>
        //                 <td class='table-border'>
                           
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'></td>
        //                 <td class='table-border'>a. Seni Rupa</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b9c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b9c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b9c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b9c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border'></td>
        //                 <td class='table-border'>b.Seni Musik</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b10c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b10c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b10c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b10c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border'></td>
        //                 <td class='table-border'>c.Seni Tari</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b11c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b11c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b11c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b11c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>10.</td>
        //                 <td class='table-border'>Bimbingan dan Konseling</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b12c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b12c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b12c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b12c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'>11.</td>
        //                 <td class='table-border'>Mulok</td>
        //                 <td class='table-border text-center'>
                           
        //                 </td>
        //                 <td class='table-border'>
                           
        //                 </td>
        //                 <td class='table-border text-center'>
                           
        //                 </td>
        //                 <td class='table-border'>
                           
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;'></td>
        //                 <td class='table-border'>a. Bahasa Jawa</td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b13c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b13c2}
        //                 </td>
        //                 <td class='table-border text-center'>
        //                     {$pengetahuan->b13c3}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$pengetahuan->b13c4}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;' colspan='2'>Jumlah Nilai</td>
        //                 <td class='table-border text-center'>
        //                     {$total1}
        //                 </td>
        //                 <td class='table-border'>
                           
        //                 </td>
        //                 <td class='table-border text-center'>
        //                 {$total2}
        //                 </td>
        //                 <td class='table-border'>
                          
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='table-border' style='text-align:center;' colspan='2'>Rata-rata</td>
        //                 <td class='table-border text-center'>
        //                     {$rata_rata1}
        //                 </td>
        //                 <td class='table-border'>
                            
        //                 </td>
        //                 <td class='table-border text-center'>
        //                      {$rata_rata2}
        //                 </td>
        //                 <td class='table-border'>
                           
        //                 </td>
        //             </tr>
        //         </tbody>
        //     </table>
        // ");
        // $document->AddPage();
        // // pelajar pancasila
        // $document->WriteHTML("
        //      <table width='100%' class='table-border'>
        //         <tbody>
        //             <tr>
        //                 <th class='text-center table-border' width='5%'>No</th>
        //                 <th class='text-center table-border' width='25%'>Ekstrakulikuler</th>
        //                 <th class='text-center table-border' width='10%'>Nilai</th>
        //                 <th class='text-center table-border' width='60%'>Keterangan</th>
        //             </tr>
        //             <tr>
        //                 <td class='text-center table-border'>1.</td>
        //                 <td class='table-border'>Praja Muda Karana</td>
        //                 <td class='table-border text-center'>
        //                     {$ekstra->b1c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$ekstra->b1c2}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='text-center table-border'>2.</td>
        //                 <td class='table-border'>Komputer</td>
        //                 <td class='table-border text-center'>
        //                     {$ekstra->b2c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$ekstra->b2c2}
        //                 </td>
        //             </tr>
        //         </tbody>
        //      </table>
        //  ");
        // $document->WriteHTML("
        //     <br>
        //      <table width='100%' class='table-border'>
        //         <tbody>
        //             <tr>
        //                 <th class='text-center table-border' width='5%'>No</th>
        //                 <th class='text-center table-border' width='35%'>Jenis Prestasi</th>
        //                 <th class='text-center table-border' width='60%'>Keterangan</th>
        //             </tr>
        //             <tr>
        //                 <td class='text-center table-border'>1.</td>
        //                 <td class='table-border'>
        //                     {$prestasi->b1c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$prestasi->b1c2}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='text-center table-border'>2.</td>
        //                 <td class='table-border'>
        //                     {$prestasi->b2c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$prestasi->b2c2}
        //                 </td>
        //             </tr>
        //             <tr>
        //                 <td class='text-center table-border'>3.</td>
        //                 <td class='table-border'>
        //                     {$prestasi->b3c1}
        //                 </td>
        //                 <td class='table-border'>
        //                     {$prestasi->b3c2}
        //                 </td>
        //             </tr>
        //         </tbody>
        //      </table>
        //  ");

        // $document->WriteHTML("
        //     <br>
        //      <table width='100%' class='table-border'>
        //         <tbody>
        //             <tr>
        //                  <th class='text-center table-border' width='5%'>No</th>
        //                 <th class='text-center table-border' width='40%' colspan='3'>Ketidakhadiran</th>
        //                 <th class='text-center table-border' width='55%' colspan='3'>KENAIKAN</th>
        //             </tr>
        //             <tr>
        //                 <td class='text-center table-border'>1.</td>
        //                 <td class='border-bottom'>
        //                     Sakit
        //                 </td>
        //                 <td class='border-bottom'>:</td>
        //                 <td class='border-right border-bottom padding-right'>{$ketidakhadiran->sakit} hari</td>
        //                 <td class='padding-left'>Berdasarkan pencapaian kompetensi pada semester ke-1 dan ke-2, siswa ditetapkan :</td>
        //             </tr>
        //             <tr>
        //                 <td class='text-center table-border'>2.</td>
        //                 <td class='border-bottom'>
        //                    Izin
        //                 </td>
        //                 <td class='border-bottom'>:</td>
        //                 <td class='border-right border-bottom padding-right'>{$ketidakhadiran->izin} hari</td>
        //                 <td rowspan='2' class='padding-left'>{$statusKenaikan}</td>
        //             </tr>
        //             <tr>
        //                 <td class='text-center table-border'>3.</td>
        //                 <td  class='border-bottom'>
        //                     Tanpa Keterangan
        //                 </td>
        //                 <td  class='border-bottom'>:</td>
        //                 <td class='border-right border-bottom padding-right' >{$ketidakhadiran->tanpa_keterangan} hari</td>
        //                 <td></td>
        //             </tr>
        //         </tbody>
        //      </table>
        //  ");
        //  
        // $document->WriteHTML("
        //     <br>
        //      <table width='100%' class='table-border'>
        //         <tbody>
        //             <tr>
        //                 <td width='5%'></td>
        //                 <td width='30%' class='text-left pl-20'>
        //                     <p>Mengetahui,</p>
        //                 </td>
        //                 <td width='15%'></td>
        //                 <td width='15%'></td>
        //                 <td width='30%' class='text-left pl-20'>
        //                     <p>Tegal, {$date}</p>
        //                 </td>
        //                 <td width='5%'></td>

        //             </tr>
        //             <tr class='highlight'>
        //                 <td ></td>
        //                 <td class='text-left pl-20'>
        //                     <p>Kepala Sekolah</p> 
        //                 </td>
        //                 <td></td>
        //                 <td></td>
        //                 <td class='text-left  pl-20'>
        //                     <p>Wali Kelas</p>
        //                 </td>
        //                 <td></td>
        //             </tr>
        //             <tr >
        //                 <td ></td>
        //                 {$barcodeKepsek}
        //                 <td ></td>
        //                 <td ></td>
        //                 {$barcodeWaliKelas}
        //                 <td></td>

        //             </tr>
        //             <tr>
        //                 <td></td>
        //                 <td class='text-left  pl-20'>( {$ttd->kepsek} )</td>
        //                 <td></td>
        //                 <td></td>
        //                 <td class='text-left  pl-20' >( {$ttd->wali_kelas} )</td>
        //                 <td></td>
                        
        //             </tr>
        //             <tr>
        //                 <td></td>
        //                 <td class='text-left  pl-20'>NIP. {$ttd->nip_kepsek}</td>
        //                 <td></td>
        //                 <td></td>
        //                 <td class='text-left  pl-20'>NIP. {$ttd->nip_wali_kelas}</td>
        //                 <td></td>

        //             </tr>
        //         </tbody>
        //      </table>
        //  ");
        //  $document->Output("{$siswa->nis}-{$siswa->nama_lengkap}.pdf", 'I');

        return view('cetak.cetak_nilai')
        ->with(compact('ketidakhadiran'))
        ->with(compact('siswa'))
        ->with(compact('pelajarPancasila'))
        ->with(compact('pengetahuan'))
        ->with(compact('ekstra'))
        ->with(compact('prestasi'))
        ->with(compact('kenaikan'))
        ->with(compact('ttd'))
        ->with(compact('total1'))
        ->with(compact('total2'))
        ->with(compact('rata_rata1'))
        ->with(compact('rata_rata2'))
        ->with(compact('statusKenaikan'))
        ->with(compact('date'))
        ;
        
    }


    public function kompetensi($id)
    {
        $kompetensi = ModelKompetensi::find($id);

        $siswa = Students::find($kompetensi->id_siswa);


        // $documentFileName = 'Kompetensi.pdf';
        // // Create the mPDF document
        // $document = new PDF([
        //     'mode' => 'utf-8',
        //     'format' => 'A4',
        //     'margin_header' => '3',
        //     'margin_top' => '10',
        //     'margin_bottom' => '10',
        //     'margin_footer' => '2',
        //     'default_font_size' => 12,
        //     'default_font' => 'sans-serif'
        // ]);

        // // Set some header informations for output
        // $header = [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'inline; filename="' . $documentFileName . '"'
        // ];

        // // Write some simple Content
        // $stylesheet = file_get_contents('cetak.css');


        // if ($kompetensi->mapel_7 == null && $kompetensi->ck_7_1 == null) {
        //     $kompetensi_7 = "";
        // } else {
        //     $kompetensi_7 = "
        //     <tr>
        //         <td rowspan='2'  class='table-border'>{$kompetensi->mapel_7}</td>
        //         <td rowspan='2' class='text-center table-border'>{$kompetensi->kls}</td>
        //         <td class='text-center table-border'>1</td>
        //         <td  class='table-border'>{$kompetensi->ck_7_1}</td>
        //     </tr>
        //     <tr>
            
        //         <td class='text-center table-border'>2</td>
        //         <td  class='table-border'>{$kompetensi->ck_7_2}</td>
        //     </tr>
        //     ";
        // }
        // if ($kompetensi->mapel_8 == null && $kompetensi->ck_8_1 == null) {
        //     $kompetensi_8 = "";
        // } else {
        //     $kompetensi_8 = "
        //     <tr>
        //         <td rowspan='2'  class='table-border'>{$kompetensi->mapel_8}</td>
        //         <td rowspan='2' class='text-center table-border'>{$kompetensi->kls_2}</td>
        //         <td class='text-center table-border'>1</td>
        //         <td  class='table-border'>{$kompetensi->ck_8_1}</td>
        //     </tr>
        //     <tr>
            
        //         <td class='text-center table-border'>2</td>
        //         <td  class='table-border'>{$kompetensi->ck_8_2}</td>
        //     </tr>
        //     ";
        // }

    //     $document->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
    //     $document->SetTitle("HALAMAN CAPAIAN KOMPETENSI SISWA");
    //     $document->WriteHTML('<h1 style="text-align: center;font-size:20px">CAPAIAN KOMPETENSI</h1>');
    //     $document->WriteHTML("
    //     <table width='100%' class='table-border'>
    //     <thead>
    //         <tr>
    //             <th class='w-30 text-center table-border'>Mata Pelajaran</th>
    //             <th class='w-5 text-center table-border'>Kelas</th>
    //             <th class='w-15 text-center table-border'>Semester</th>
    //             <th class='w-50 text-center table-border'>Capaian Kompetensi</th>
    //         </tr>
    //     </thead>
    //     <tbody>
    //         {{--  --}}
    //         <tr>
    //             <td rowspan='2'  class='table-border'>{$kompetensi->mapel_1}</td>
    //             <td rowspan='2' class='text-center table-border'>1</td>
    //             <td class='text-center table-border'>1</td>
    //             <td  class='table-border'>{$kompetensi->ck_1_1}</td>
    //         </tr>
    //         <tr>
               
    //             <td class='text-center table-border'>2</td>
    //             <td  class='table-border'>{$kompetensi->ck_1_2}</td>
    //         </tr>
    //         {{--  --}}
    //         {{--  --}}
    //         <tr>
    //             <td rowspan='2'  class='table-border'>{$kompetensi->mapel_2}</td>
    //             <td rowspan='2' class='text-center table-border'>2</td>
    //             <td class='text-center table-border'>1</td>
    //             <td  class='table-border'>{$kompetensi->ck_2_1}</td>
    //         </tr>
    //         <tr>
               
    //             <td class='text-center table-border'>2</td>
    //             <td  class='table-border'>{$kompetensi->ck_2_2}</td>
    //         </tr>
          
    //         <tr>
    //             <td rowspan='2'  class='table-border'>{$kompetensi->mapel_3}</td>
    //             <td rowspan='2' class='text-center table-border'>3</td>
    //             <td class='text-center table-border'>1</td>
    //             <td  class='table-border'>{$kompetensi->ck_3_1}</td>
    //         </tr>
    //         <tr>
               
    //             <td class='text-center table-border'>2</td>
    //             <td  class='table-border'>{$kompetensi->ck_3_2}</td>
    //         </tr>
          
    //         <tr>
    //             <td rowspan='2'  class='table-border'>{$kompetensi->mapel_4}</td>
    //             <td rowspan='2' class='text-center table-border'>4</td>
    //             <td class='text-center table-border'>1</td>
    //             <td  class='table-border'>{$kompetensi->ck_4_1}</td>
    //         </tr>
    //         <tr>
               
    //             <td class='text-center table-border'>2</td>
    //             <td  class='table-border'>{$kompetensi->ck_4_2}</td>
    //         </tr>
          
    //         <tr>
    //             <td rowspan='2'  class='table-border'>{$kompetensi->mapel_5}</td>
    //             <td rowspan='2' class='text-center table-border'>5</td>
    //             <td class='text-center table-border'>1</td>
    //             <td  class='table-border'>{$kompetensi->ck_5_1}</td>
    //         </tr>
    //         <tr>
               
    //             <td class='text-center table-border'>2</td>
    //             <td  class='table-border'>{$kompetensi->ck_5_2}</td>
    //         </tr>
          
    //         <tr>
    //             <td rowspan='2'  class='table-border'>{$kompetensi->mapel_6}</td>
    //             <td rowspan='2' class='text-center table-border'>6</td>
    //             <td class='text-center table-border'>1</td>
    //             <td  class='table-border'>{$kompetensi->ck_6_1}</td>
    //         </tr>
    //         <tr>
               
    //             <td class='text-center table-border'>2</td>
    //             <td  class='table-border'>{$kompetensi->ck_6_2}</td>
    //         </tr>
    //         {$kompetensi_7}
    //         {$kompetensi_8}
    //     </tbody>
    // </table>
        
    //     ");
    //     $document->Output("{$siswa->nis}-{$siswa->nama_lengkap}.pdf", 'I');

    
    return view('cetak.cetak_kompetensi')
    ->with(compact('kompetensi'))
    ->with(compact('siswa'))
    ;

    }

    public function ijazah($id)
    {
        $file = ModelIjazah::find($id);
         return response()->file('storage/pdf/ijazah/'.$file->ijazah);
    }
    public function skl($id)
    {
        $file = ModelIjazah::find($id);
         return response()->file('storage/pdf/skl/'.$file->skl);
    }
    public function skhun($id)
    {
        $file = ModelIjazah::find($id);
         return response()->file('storage/pdf/skhun/'.$file->skhun);
    }
}

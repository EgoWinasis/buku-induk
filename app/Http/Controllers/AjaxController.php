<?php

namespace App\Http\Controllers;

use App\Models\Ketidakhadiran;
use App\Models\ModelKelas;
use App\Models\Students;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getKelas()
    {
        $tahun_ajaran = $_GET['tahun_ajaran'];
        $kelas = ModelKelas::where('tahun_ajaran', $tahun_ajaran)->groupBy('kelas')->get();
     
        return $kelas;
    }
    public function getSiswa()
    {
        $kelas = $_GET['kelas'];
        $siswa = ModelKelas::where('kelas', $kelas)->get();
        $data = array();
        foreach ($siswa as $s) {
            $getSiswa = Students::where('id', $s->id_siswa)->get();
            array_push($data, $getSiswa);
        }

        return $data;
    }

    public function getNilai($id, $kelas, $siswa){

        $tahun = $_COOKIE['tahun'];
        
        if ($tahun == "") {
            $tahun = null;
        }

        
        $nilaiExist = Ketidakhadiran::where('siswa', $siswa)
        ->where('kelas', $kelas)
        ->where('tahun_ajaran', $tahun)
        ->exists();
        if ($nilaiExist) {
            $siswa = Students::find($id);
            $getKetidakhadiran = Ketidakhadiran::where('siswa', $siswa->nama_lengkap)
                                ->where('kelas',$kelas)
                                ->where('tahun_ajaran', $tahun)
                                ->first();
            
            return redirect()->route('nilai.edit',$getKetidakhadiran->id);
        } else {
            return redirect()->route('nilai.create')
            ->with('kelas', $kelas)
            ->with('siswa', $siswa)
            ;
        }
        
    }
   

    public function setKelas($id,$kelas){
        $kelas = [
            'id_siswa' => $id,
            'kelas' => $kelas,
            'tinggal_kelas' => 'true',
            'tahun_ajaran' => NULL,
            ];
        ModelKelas::create($kelas);
    }
}

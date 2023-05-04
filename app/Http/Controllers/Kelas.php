<?php

namespace App\Http\Controllers;

use App\Models\Ketidakhadiran;
use App\Models\ModelKelas;
use App\Models\Students;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use function Spatie\LaravelIgnition\Support\getType;

class Kelas extends Controller
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

        if (isset($_COOKIE['tahun_ajaran_cari'])) {
            $tahun_ajaran = $_COOKIE['tahun_ajaran_cari'];
            setcookie("tahun_ajaran_cari", "", time() - 50);
        } else {

            if (date("m") < 7) {
                $tahun_ajaran =  (date("Y") - 1) . "/" . date("Y");
            } else {
                $tahun_ajaran = date("Y") . "/" . (date("Y") + 1);
            }
        }




        $kelas = ModelKelas::where('tahun_ajaran', $tahun_ajaran)->groupBy('kelas')->get();
        $arrayTahunAjar = array();
        $arrayTahun =  explode("/", $tahun_ajaran);
        for ($i = 1; $i < 3; $i++) {
            $thAwal = (int) $arrayTahun[0] + $i;
            $thAkhir = (int)$arrayTahun[0] + $i  + 1;
            $th = "{$thAwal}/{$thAkhir}";
            array_unshift($arrayTahunAjar, $th);
        }
        array_push($arrayTahunAjar, $tahun_ajaran);

        for ($i = 1; $i < 3; $i++) {
            $thAwal = (int) $arrayTahun[0] - $i;
            $thAkhir = (int)$arrayTahun[0] - $i + 1;
            $th = "{$thAwal}/{$thAkhir}";
            array_push($arrayTahunAjar, $th);
        }

   
        return view('kelas.kelas_view')
            ->with(compact('kelas'))
            ->with(compact('arrayTahunAjar'))
            ->with(compact('tahun_ajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Students::all()->sortBy("nis");
        return view('kelas.kelas_create_view',  compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kelas' => ['required', 'string'],
            'tahun_ajaran_awal' => ['required', 'string'],
            'tahun_ajaran_akhir' => ['required', 'string'],
            'to' => ['required'],
        ], [
            'kelas' => 'Pilih Kelas terlebih dahulu..',
            'to' => 'Pilih Siswa terlebih dahulu..',
            'tahun_ajaran_awal' => 'Pilih Tahun Ajaran terlebih dahulu',
            'tahun_ajaran_akhir' => 'Pilih Tahun Ajaran terlebih dahulu',
        ]);

        if (($validatedData['tahun_ajaran_awal'] == $validatedData['tahun_ajaran_akhir']) || ($validatedData['tahun_ajaran_awal'] > $validatedData['tahun_ajaran_akhir'])) {
            return redirect()->route('kelas.create')
                ->with('error', 'Tahun Ajaran tidak valid!');
        }

        // cek data sudah ada 
        $kelasExist = ModelKelas::where('tahun_ajaran', $validatedData['tahun_ajaran_awal'] . '/' . $validatedData['tahun_ajaran_akhir'])
            ->where('kelas', $validatedData['kelas'])
            ->get();

        
        if (count($kelasExist) > 0) {
            return redirect()->route('kelas.index')
                ->with('error', 'Gagal Menambahkan Kelas : Data Kelas ' . $validatedData['kelas'] . ' Tahun Ajaran ' . $validatedData['tahun_ajaran_awal'] . '/' . $validatedData['tahun_ajaran_akhir'] . ' Sudah Ada');
        } else {

            $siswa = array();
            foreach ($request->get('to') as $id_siswa) {
                array_push($siswa, $id_siswa);
            }


            foreach ($siswa as $id_siswa) {


                ModelKelas::create([
                    'id_siswa' => $id_siswa,
                    'kelas' => $request->kelas,
                    'tahun_ajaran' => ($request->tahun_ajaran_awal . '/' . $request->tahun_ajaran_akhir),


                ]);
            }

            return redirect()->route('kelas.index')
                ->with('success', 'Berhasil Menambahkan Kelas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($kelas)
    {
        $tahun_ajaran_show = $_COOKIE['tahun_ajaran_show'];
        setcookie("tahun_ajaran_show", "", time() - 50);
        $data['kelas'] = ModelKelas::where([
            ['kelas', '=', $kelas],
            ['tahun_ajaran', '=', $tahun_ajaran_show],
        ])->get()->sortBy("id_siswa");

        $id_siswa = array();
        for ($i = 0; $i < count($data['kelas']); $i++) {
            array_push($id_siswa, $data['kelas'][$i]->id_siswa);
        }

        $arraySiswa = array();

        foreach ($id_siswa as $id) {
            $siswa =  Students::find($id);
            $id_siswa_temp = $siswa->id;
            $nis_siswa_temp = $siswa->nis;
            $nama_siswa_temp = $siswa->nama_lengkap;

            $siswa = [
                'id' => $id_siswa_temp,
                'nis' => $nis_siswa_temp,
                'nama' => $nama_siswa_temp
            ];

            array_push($arraySiswa, $siswa);
        }
        $data['siswa'] = $arraySiswa;
        $data['kelas'] = $kelas;
        $data['tahun_ajaran'] = $tahun_ajaran_show;

        return view('kelas.kelas_detail_view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataKelas = ModelKelas::find($id);
        $kelasValue = $dataKelas->kelas;
        $tahunValue = explode("/", $dataKelas->tahun_ajaran);
        $thAwal = $tahunValue[0];
        $thAkhir = $tahunValue[1];

        $kelas = ModelKelas::where([
            ['kelas', '=', $dataKelas->kelas],
            ['tahun_ajaran', '=', $dataKelas->tahun_ajaran],
        ])->get()->sortBy("id_siswa");
        // dd(count($kelas));

        $students = Students::all()->sortBy("id");

        $id_siswa = array();
        foreach ($kelas as $k) {
            array_push($id_siswa, $k->id_siswa);
        }

        $from = array();
        $to = array();

        $i = 0;
        foreach ($students as $student) {
            if (count($id_siswa) != count($to)) {
                if ($student->id == $id_siswa[$i]) {
                    array_push($to, $student);
                    $i++;
                }else {
                    array_push($from, $student);
                }
            }else {
                array_push($from, $student);
            }
        }

        return view('kelas.kelas_edit_view')
            ->with(compact('from'))
            ->with(compact('id'))
            ->with(compact('thAwal'))
            ->with(compact('thAkhir'))
            ->with(compact('kelasValue'))
            ->with(compact('to'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kelas' => ['required', 'string'],
            'tahun_ajaran_awal' => ['required', 'string'],
            'tahun_ajaran_akhir' => ['required', 'string'],
            'to' => ['required'],
        ], [
            'kelas' => 'Pilih Kelas terlebih dahulu..',
            'to' => 'Pilih Siswa terlebih dahulu..',
            'tahun_ajaran_awal' => 'Pilih Tahun Ajaran terlebih dahulu',
            'tahun_ajaran_akhir' => 'Pilih Tahun Ajaran terlebih dahulu',
        ]);

        if (($validatedData['tahun_ajaran_awal'] == $validatedData['tahun_ajaran_akhir']) || ($validatedData['tahun_ajaran_awal'] > $validatedData['tahun_ajaran_akhir'])) {
            return redirect()->route('kelas.index')
                ->with('error', 'Gagal Edit Kelas '.$validatedData['kelas'].' : Tahun Ajaran tidak valid!');
        }

        
        if (($request['kelas-old'] != $validatedData['kelas']) || ($request['thn-old'] != ($validatedData['tahun_ajaran_awal'] . '/' . $validatedData['tahun_ajaran_akhir']))) {
            // cek data sudah ada 
            $kelasExist = ModelKelas::where('tahun_ajaran', $validatedData['tahun_ajaran_awal'] . '/' . $validatedData['tahun_ajaran_akhir'])
                ->where('kelas', $validatedData['kelas'])
                ->get();

            if (count($kelasExist) > 0) {
                return redirect()->route('kelas.index')
                    ->with('error', 'Gagal Edit Kelas : Data Kelas ' . $validatedData['kelas'] . ' Tahun Ajaran ' . $validatedData['tahun_ajaran_awal'] . '/' . $validatedData['tahun_ajaran_akhir'] . ' Sudah Ada');
            } else {

                 ModelKelas::where('tahun_ajaran', $request['thn-old'] )
                ->where('kelas', $request['kelas-old'])
                ->delete();

                $siswa = array();
                foreach ($request->get('to') as $id_siswa) {
                    array_push($siswa, $id_siswa);
                }


                foreach ($siswa as $id_siswa) {


                    ModelKelas::create([
                        'id_siswa' => $id_siswa,
                        'kelas' => $request->kelas,
                        'tahun_ajaran' => ($request->tahun_ajaran_awal . '/' . $request->tahun_ajaran_akhir),


                    ]);
                }

                return redirect()->route('kelas.index')
                    ->with('success', 'Berhasil Mengedit Kelas ' .$validatedData['kelas']);
            }
        } else {

            ModelKelas::where('tahun_ajaran', $request['thn-old'] )
                ->where('kelas', $request['kelas-old'])
                ->delete();

            $siswa = array();
            foreach ($request->get('to') as $id_siswa) {
                array_push($siswa, $id_siswa);
            }


            foreach ($siswa as $id_siswa) {


                ModelKelas::create([
                    'id_siswa' => $id_siswa,
                    'kelas' => $request->kelas,
                    'tahun_ajaran' => ($request->tahun_ajaran_awal . '/' . $request->tahun_ajaran_akhir),


                ]);
            }

            return redirect()->route('kelas.index')
                ->with('success', 'Berhasil Mengedit Kelas '.$validatedData['kelas']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataKelas = ModelKelas::find($id);
        // dd($dataKelas->tahun_ajaran);
        $nilaiKelas = Ketidakhadiran::where('tahun_ajaran', $dataKelas->tahun_ajaran)
        ->where('kelas', $dataKelas->kelas)
        ->get();
        
        if(count($nilaiKelas) > 0){

            return redirect()->route('kelas.index')
                ->with('error', 'Gagal Menghapus Data Kelas ' .$dataKelas->kelas . ' : Ada Data Nilai Siswa');
        }else{

            ModelKelas::where([
                ['kelas', '=', $dataKelas->kelas],
                ['tahun_ajaran', '=', $dataKelas->tahun_ajaran],
            ])->delete();
    
    
        }

    }
}

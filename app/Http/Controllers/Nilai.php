<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Ketidakhadiran;
use App\Models\ModelKelas;
use App\Models\ModelKenaikan;
use App\Models\ModelTandaTangan;
use Illuminate\Http\Request;
use App\Models\PelajarPancasila;
use App\Models\Pengetahuan;
use App\Models\Prestasi;
use App\Models\Students;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Nilai extends Controller
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
            ->get();

        return view('nilai.nilai_view')
            ->with(compact('siswa'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kelas = $request->session()->get('kelas');
        $siswa = $request->session()->get('siswa');
        return view('nilai.nilai_create_view')
            ->with(compact('kelas'))
            ->with(compact('siswa'));
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

            // data siswa
            'tahun_ajaran' => ['required', 'max:20'],
            'kelas'        => ['required', 'max:5'],
            'siswa'        => ['required', 'max:255'],
            // Profil Pelajar Pancasila
            'a1b1c1' => ['required', 'string', 'max:255'],
            'a1b1c2' => ['required', 'string', 'max:255'],
            // 
            'a1b2c1' => ['required', 'string', 'max:255'],
            'a1b2c2' => ['required', 'string', 'max:255'],
            // 
            'a1b3c1' => ['required', 'string', 'max:255'],
            'a1b3c2' => ['required', 'string', 'max:255'],
            // 
            'a1b4c1' => ['required', 'string', 'max:255'],
            'a1b4c2' => ['required', 'string', 'max:255'],
            // 
            'a1b5c1' => ['required', 'string', 'max:255'],
            'a1b5c2' => ['required', 'string', 'max:255'],
            // 
            'a1b6c1' => ['required', 'string', 'max:255'],
            'a1b6c2' => ['required', 'string', 'max:255'],

            // Pengetahuan

            'a2b1c1' => ['required', 'string', 'max:255'],
            'a2b1c2' => ['required', 'string', 'max:255'],
            'a2b1c3' => ['required', 'string', 'max:255'],
            'a2b1c4' => ['required', 'string', 'max:255'],
            // 
            'a2b2c1' => ['required', 'string', 'max:255'],
            'a2b2c2' => ['required', 'string', 'max:255'],
            'a2b2c3' => ['required', 'string', 'max:255'],
            'a2b2c4' => ['required', 'string', 'max:255'],
            // 
            'a2b3c1' => ['required', 'string', 'max:255'],
            'a2b3c2' => ['required', 'string', 'max:255'],
            'a2b3c3' => ['required', 'string', 'max:255'],
            'a2b3c4' => ['required', 'string', 'max:255'],
            // 
            'a2b4c1' => ['required', 'string', 'max:255'],
            'a2b4c2' => ['required', 'string', 'max:255'],
            'a2b4c3' => ['required', 'string', 'max:255'],
            'a2b4c4' => ['required', 'string', 'max:255'],
            // 
            'a2b5c1' => ['required', 'string', 'max:255'],
            'a2b5c2' => ['required', 'string', 'max:255'],
            'a2b5c3' => ['required', 'string', 'max:255'],
            'a2b5c4' => ['required', 'string', 'max:255'],
            // 
            'a2b6c1' => ['required', 'string', 'max:255'],
            'a2b6c2' => ['required', 'string', 'max:255'],
            'a2b6c3' => ['required', 'string', 'max:255'],
            'a2b6c4' => ['required', 'string', 'max:255'],
            // 
            'a2b7c1' => ['required', 'string', 'max:255'],
            'a2b7c2' => ['required', 'string', 'max:255'],
            'a2b7c3' => ['required', 'string', 'max:255'],
            'a2b7c4' => ['required', 'string', 'max:255'],
            // 
            'a2b8c1' => ['required', 'string', 'max:255'],
            'a2b8c2' => ['required', 'string', 'max:255'],
            'a2b8c3' => ['required', 'string', 'max:255'],
            'a2b8c4' => ['required', 'string', 'max:255'],
            // 
            'a2b9c1' => ['required', 'string', 'max:255'],
            'a2b9c2' => ['required', 'string', 'max:255'],
            'a2b9c3' => ['required', 'string', 'max:255'],
            'a2b9c4' => ['required', 'string', 'max:255'],
            // 
            'a2b10c1' => ['required', 'string', 'max:255'],
            'a2b10c2' => ['required', 'string', 'max:255'],
            'a2b10c3' => ['required', 'string', 'max:255'],
            'a2b10c4' => ['required', 'string', 'max:255'],
            // 
            'a2b11c1' => ['required', 'string', 'max:255'],
            'a2b11c2' => ['required', 'string', 'max:255'],
            'a2b11c3' => ['required', 'string', 'max:255'],
            'a2b11c4' => ['required', 'string', 'max:255'],
            // 
            'a2b12c1' => ['required', 'string', 'max:255'],
            'a2b12c2' => ['required', 'string', 'max:255'],
            'a2b12c3' => ['required', 'string', 'max:255'],
            'a2b12c4' => ['required', 'string', 'max:255'],
            // 
            'a2b13c1' => ['required', 'string', 'max:255'],
            'a2b13c2' => ['required', 'string', 'max:255'],
            'a2b13c3' => ['required', 'string', 'max:255'],
            'a2b13c4' => ['required', 'string', 'max:255'],

            // ekskul
            //
            'a3b1c1' => ['nullable', 'string', 'max:255'],
            'a3b1c2' => ['nullable', 'string', 'max:255'],
            //
            'a3b2c1' => ['nullable', 'string', 'max:255'],
            'a3b2c2' => ['nullable', 'string', 'max:255'],

            // prestasi
            //
            'a4b1c1' => ['nullable', 'string', 'max:255'],
            'a4b1c2' => ['nullable', 'string', 'max:255'],
            //
            'a4b2c1' => ['nullable', 'string', 'max:255'],
            'a4b2c2' => ['nullable', 'string', 'max:255'],
            //
            'a4b3c1' => ['nullable', 'string', 'max:255'],
            'a4b3c2' => ['nullable', 'string', 'max:255'],

            // Ketidakhadiran
            //
            'sakit' => ['nullable', 'string', 'max:255'],
            //
            'izin' => ['nullable', 'string', 'max:255'],
            //
            'tanpa_keterangan' => ['nullable', 'string', 'max:255'],
            // kenaikan
            'status' => ['nullable', 'string', 'max:50'],
            'status_kelas' => ['nullable', 'string', 'max:5'],
            // tanda tangan
            // kepsek
            'kepsek' => ['nullable', 'string', 'max:255'],
            'nip_kepsek' => ['nullable', 'string', 'max:20'],
            'barcode_kepsek' => 'nullable|image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=300,max_height=300',
            // wali kelas
            'wali_kelas' => ['nullable', 'string', 'max:255'],
            'nip_wali_kelas' => ['nullable', 'string', 'max:20'],
            'barcode_wali_kelas' => 'nullable|image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=300,max_height=300',

        ], [
            // data siswa
            'tahun_ajaran' => 'Masukan Tahun Ajaran',
            'kelas'        => 'Masukan Kelas',
            'siswa'        => 'Masukan Siswa',
            // Profil Pelajar Pancasila
            'a1b1c1' => 'Masukan Nilai..',
            'a1b1c2' => 'Masukan Nilai..',
            // 
            'a1b2c1' => 'Masukan Nilai..',
            'a1b2c2' => 'Masukan Nilai..',
            // 
            'a1b3c1' => 'Masukan Nilai..',
            'a1b3c2' => 'Masukan Nilai..',
            // 
            'a1b4c1' => 'Masukan Nilai..',
            'a1b4c2' => 'Masukan Nilai..',
            // 
            'a1b5c1' => 'Masukan Nilai..',
            'a1b5c2' => 'Masukan Nilai..',
            // 
            'a1b6c1' => 'Masukan Nilai..',
            'a1b6c2' => 'Masukan Nilai..',


            // Pengetahuan

            'a2b1c1' => 'Masukan Nilai..',
            'a2b1c2' => 'Masukan Nilai..',
            'a2b1c3' => 'Masukan Nilai..',
            'a2b1c4' => 'Masukan Nilai..',
            // 
            'a2b2c1' => 'Masukan Nilai..',
            'a2b2c2' => 'Masukan Nilai..',
            'a2b2c3' => 'Masukan Nilai..',
            'a2b2c4' => 'Masukan Nilai..',
            // 
            'a2b3c1' => 'Masukan Nilai..',
            'a2b3c2' => 'Masukan Nilai..',
            'a2b3c3' => 'Masukan Nilai..',
            'a2b3c4' => 'Masukan Nilai..',
            // 
            'a2b4c1' => 'Masukan Nilai..',
            'a2b4c2' => 'Masukan Nilai..',
            'a2b4c3' => 'Masukan Nilai..',
            'a2b4c4' => 'Masukan Nilai..',
            // 
            'a2b5c1' => 'Masukan Nilai..',
            'a2b5c2' => 'Masukan Nilai..',
            'a2b5c3' => 'Masukan Nilai..',
            'a2b5c4' => 'Masukan Nilai..',
            // 
            'a2b6c1' => 'Masukan Nilai..',
            'a2b6c2' => 'Masukan Nilai..',
            'a2b6c3' => 'Masukan Nilai..',
            'a2b6c4' => 'Masukan Nilai..',
            // 
            'a2b7c1' => 'Masukan Nilai..',
            'a2b7c2' => 'Masukan Nilai..',
            'a2b7c3' => 'Masukan Nilai..',
            'a2b7c4' => 'Masukan Nilai..',
            // 
            'a2b8c1' => 'Masukan Nilai..',
            'a2b8c2' => 'Masukan Nilai..',
            'a2b8c3' => 'Masukan Nilai..',
            'a2b8c4' => 'Masukan Nilai..',
            // 
            'a2b9c1' => 'Masukan Nilai..',
            'a2b9c2' => 'Masukan Nilai..',
            'a2b9c3' => 'Masukan Nilai..',
            'a2b9c4' => 'Masukan Nilai..',
            // 
            'a2b10c1' => 'Masukan Nilai..',
            'a2b10c2' => 'Masukan Nilai..',
            'a2b10c3' => 'Masukan Nilai..',
            'a2b10c4' => 'Masukan Nilai..',
            // 
            'a2b11c1' => 'Masukan Nilai..',
            'a2b11c2' => 'Masukan Nilai..',
            'a2b11c3' => 'Masukan Nilai..',
            'a2b11c4' => 'Masukan Nilai..',
            // 
            'a2b12c1' => 'Masukan Nilai..',
            'a2b12c2' => 'Masukan Nilai..',
            'a2b12c3' => 'Masukan Nilai..',
            'a2b12c4' => 'Masukan Nilai..',
            // 
            'a2b13c1' => 'Masukan Nilai..',
            'a2b13c2' => 'Masukan Nilai..',
            'a2b13c3' => 'Masukan Nilai..',
            'a2b13c4' => 'Masukan Nilai..',

        ]);


        // cek data sudah ada 
        $pelajarPancasila = PelajarPancasila::where('tahun_ajaran', $validatedData['tahun_ajaran'])
            ->where('kelas', $validatedData['kelas'])
            ->where('siswa', $validatedData['siswa'])
            ->first();

        if (!empty($pelajarPancasila)) {
            return redirect()->route('nilai.index')
                ->with('error', 'Gagal Menambahkan Nilai Siswa : Data Siswa ' . $validatedData['siswa'] . ' Sudah Ada');
        } else {



            // 

            $pelajarPancasila = [
                'tahun_ajaran' => $validatedData['tahun_ajaran'],
                'kelas' => $validatedData['kelas'],
                'siswa' => $validatedData['siswa'],
                // 
                'b1c1' => $validatedData['a1b1c1'],
                'b1c2' => $validatedData['a1b1c2'],
                //
                'b2c1' => $validatedData['a1b2c1'],
                'b2c2' => $validatedData['a1b2c2'],
                //
                'b3c1' => $validatedData['a1b3c1'],
                'b3c2' => $validatedData['a1b3c2'],
                //
                'b4c1' => $validatedData['a1b4c1'],
                'b4c2' => $validatedData['a1b4c2'],
                //
                'b5c1' => $validatedData['a1b5c1'],
                'b5c2' => $validatedData['a1b5c2'],
                //
                'b6c1' => $validatedData['a1b6c1'],
                'b6c2' => $validatedData['a1b6c2'],
            ];


            PelajarPancasila::create($pelajarPancasila);

            $pengetahuan = [
                'tahun_ajaran' => $validatedData['tahun_ajaran'],
                'kelas' => $validatedData['kelas'],
                'siswa' => $validatedData['siswa'],

                // 
                'b1c1' => $validatedData['a2b1c1'],
                'b1c2' => $validatedData['a2b1c2'],
                'b1c3' => $validatedData['a2b1c3'],
                'b1c4' => $validatedData['a2b1c4'],
                //
                'b2c1' => $validatedData['a2b2c1'],
                'b2c2' => $validatedData['a2b2c2'],
                'b2c3' => $validatedData['a2b2c3'],
                'b2c4' => $validatedData['a2b2c4'],
                //
                'b3c1' => $validatedData['a2b3c1'],
                'b3c2' => $validatedData['a2b3c2'],
                'b3c3' => $validatedData['a2b3c3'],
                'b3c4' => $validatedData['a2b3c4'],
                //
                'b4c1' => $validatedData['a2b4c1'],
                'b4c2' => $validatedData['a2b4c2'],
                'b4c3' => $validatedData['a2b4c3'],
                'b4c4' => $validatedData['a2b4c4'],
                //
                'b5c1' => $validatedData['a2b5c1'],
                'b5c2' => $validatedData['a2b5c2'],
                'b5c3' => $validatedData['a2b5c3'],
                'b5c4' => $validatedData['a2b5c4'],
                //
                'b6c1' => $validatedData['a2b6c1'],
                'b6c2' => $validatedData['a2b6c2'],
                'b6c3' => $validatedData['a2b6c3'],
                'b6c4' => $validatedData['a2b6c4'],
                //
                'b7c1' => $validatedData['a2b7c1'],
                'b7c2' => $validatedData['a2b7c2'],
                'b7c3' => $validatedData['a2b7c3'],
                'b7c4' => $validatedData['a2b7c4'],
                //
                'b8c1' => $validatedData['a2b8c1'],
                'b8c2' => $validatedData['a2b8c2'],
                'b8c3' => $validatedData['a2b8c3'],
                'b8c4' => $validatedData['a2b8c4'],
                //
                'b9c1' => $validatedData['a2b9c1'],
                'b9c2' => $validatedData['a2b9c2'],
                'b9c3' => $validatedData['a2b9c3'],
                'b9c4' => $validatedData['a2b9c4'],
                //
                'b10c1' => $validatedData['a2b10c1'],
                'b10c2' => $validatedData['a2b10c2'],
                'b10c3' => $validatedData['a2b10c3'],
                'b10c4' => $validatedData['a2b10c4'],
                //
                'b11c1' => $validatedData['a2b11c1'],
                'b11c2' => $validatedData['a2b11c2'],
                'b11c3' => $validatedData['a2b11c3'],
                'b11c4' => $validatedData['a2b11c4'],
                //
                'b12c1' => $validatedData['a2b12c1'],
                'b12c2' => $validatedData['a2b12c2'],
                'b12c3' => $validatedData['a2b12c3'],
                'b12c4' => $validatedData['a2b12c4'],
                //
                'b13c1' => $validatedData['a2b13c1'],
                'b13c2' => $validatedData['a2b13c2'],
                'b13c3' => $validatedData['a2b13c3'],
                'b13c4' => $validatedData['a2b13c4'],
            ];

            Pengetahuan::create($pengetahuan);


            $ekstra = [
                'tahun_ajaran' => $validatedData['tahun_ajaran'],
                'kelas' => $validatedData['kelas'],
                'siswa' => $validatedData['siswa'],
                // 
                'b1c1' => $validatedData['a3b1c1'],
                'b1c2' => $validatedData['a3b1c2'],
                //
                'b2c1' => $validatedData['a3b2c1'],
                'b2c2' => $validatedData['a3b2c2'],

            ];

            Ekstrakulikuler::create($ekstra);

            $prestasi = [
                'tahun_ajaran' => $validatedData['tahun_ajaran'],
                'kelas' => $validatedData['kelas'],
                'siswa' => $validatedData['siswa'],
                // 
                'b1c1' => $validatedData['a4b1c1'],
                'b1c2' => $validatedData['a4b1c2'],
                //
                'b2c1' => $validatedData['a4b2c1'],
                'b2c2' => $validatedData['a4b2c2'],
                //
                'b3c1' => $validatedData['a4b3c1'],
                'b3c2' => $validatedData['a4b3c2'],

            ];

            Prestasi::create($prestasi);

            $ketidakhadiran = [
                'tahun_ajaran' => $validatedData['tahun_ajaran'],
                'kelas' => $validatedData['kelas'],
                'siswa' => $validatedData['siswa'],
                // 
                'sakit' => $validatedData['sakit'],
                'izin' => $validatedData['izin'],
                'tanpa_keterangan' => $validatedData['tanpa_keterangan'],

            ];

            Ketidakhadiran::create($ketidakhadiran);

            $status = [
                'tahun_ajaran' => $validatedData['tahun_ajaran'],
                'kelas' => $validatedData['kelas'],
                'siswa' => $validatedData['siswa'],
                // 
                'status' => $validatedData['status'],
                'status_kelas' => $validatedData['status_kelas'],

            ];

            ModelKenaikan::create($status);

            if ($request->file('barcode_kepsek')) {
                $file = $request->file('barcode_kepsek');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $request->file('barcode_kepsek')->storeAs('public/images/barcode', $fileName);
                $validatedData['barcode_kepsek'] = $fileName;
            }else {
                $validatedData['barcode_kepsek'] = null;
            }
            // 
            if ($request->file('barcode_wali_kelas')) {
                $file = $request->file('barcode_wali_kelas');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $request->file('barcode_wali_kelas')->storeAs('public/images/barcode', $fileName);
                $validatedData['barcode_wali_kelas'] = $fileName;
            }else {
                $validatedData['barcode_wali_kelas'] = null;
            }
            // 
            $ttd = [
                'tahun_ajaran' => $validatedData['tahun_ajaran'],
                'kelas' => $validatedData['kelas'],
                'siswa' => $validatedData['siswa'],
                // 
                'kepsek' => $validatedData['kepsek'],
                'nip_kepsek' => $validatedData['nip_kepsek'],
                'barcode_kepsek' => $validatedData['barcode_kepsek'],
                // 
                'wali_kelas' => $validatedData['wali_kelas'],
                'nip_wali_kelas' => $validatedData['nip_wali_kelas'],
                'barcode_wali_kelas' => $validatedData['barcode_wali_kelas'],

            ];

            ModelTandaTangan::create($ttd);

            $update_kelas = [
                'tahun_ajaran' => $validatedData['tahun_ajaran']
            ];
            $update_siswa = Students::where('nama_lengkap', $validatedData['siswa'])->first();
            $idKelas = $_COOKIE['id_kelas'];
            ModelKelas::where('id', $idKelas)
                ->where('kelas', $validatedData['kelas'])
                ->where('id_siswa', $update_siswa->id)
                ->update($update_kelas);
            // 
            return redirect()->route('nilai.index')
                ->with('success', 'Berhasil Menambahkan Nilai Siswa');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ketidakhadiran = Ketidakhadiran::find($id);
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


        return view('nilai.nilai_detail_view')
            ->with(compact('ketidakhadiran'))
            ->with(compact('pelajarPancasila'))
            ->with(compact('pengetahuan'))
            ->with(compact('ekstra'))
            ->with(compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ketidakhadiran = Ketidakhadiran::find($id);

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

        return view('nilai.nilai_edit_view')
            ->with(compact('ketidakhadiran'))
            ->with(compact('pelajarPancasila'))
            ->with(compact('pengetahuan'))
            ->with(compact('ekstra'))
            ->with(compact('prestasi'))
            ->with(compact('kenaikan'))
            ->with(compact('ttd'));
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

            // data siswa
            'tahun_ajaran' => ['required', 'max:20'],
            'kelas'        => ['required', 'max:5'],
            'siswa'        => ['required', 'max:255'],
            // Profil Pelajar Pancasila
            'a1b1c1' => ['required', 'string', 'max:255'],
            'a1b1c2' => ['required', 'string', 'max:255'],
            // 
            'a1b2c1' => ['required', 'string', 'max:255'],
            'a1b2c2' => ['required', 'string', 'max:255'],
            // 
            'a1b3c1' => ['required', 'string', 'max:255'],
            'a1b3c2' => ['required', 'string', 'max:255'],
            // 
            'a1b4c1' => ['required', 'string', 'max:255'],
            'a1b4c2' => ['required', 'string', 'max:255'],
            // 
            'a1b5c1' => ['required', 'string', 'max:255'],
            'a1b5c2' => ['required', 'string', 'max:255'],
            // 
            'a1b6c1' => ['required', 'string', 'max:255'],
            'a1b6c2' => ['required', 'string', 'max:255'],

            // Pengetahuan

            'a2b1c1' => ['required', 'string', 'max:255'],
            'a2b1c2' => ['required', 'string', 'max:255'],
            'a2b1c3' => ['required', 'string', 'max:255'],
            'a2b1c4' => ['required', 'string', 'max:255'],
            // 
            'a2b2c1' => ['required', 'string', 'max:255'],
            'a2b2c2' => ['required', 'string', 'max:255'],
            'a2b2c3' => ['required', 'string', 'max:255'],
            'a2b2c4' => ['required', 'string', 'max:255'],
            // 
            'a2b3c1' => ['required', 'string', 'max:255'],
            'a2b3c2' => ['required', 'string', 'max:255'],
            'a2b3c3' => ['required', 'string', 'max:255'],
            'a2b3c4' => ['required', 'string', 'max:255'],
            // 
            'a2b4c1' => ['required', 'string', 'max:255'],
            'a2b4c2' => ['required', 'string', 'max:255'],
            'a2b4c3' => ['required', 'string', 'max:255'],
            'a2b4c4' => ['required', 'string', 'max:255'],
            // 
            'a2b5c1' => ['required', 'string', 'max:255'],
            'a2b5c2' => ['required', 'string', 'max:255'],
            'a2b5c3' => ['required', 'string', 'max:255'],
            'a2b5c4' => ['required', 'string', 'max:255'],
            // 
            'a2b6c1' => ['required', 'string', 'max:255'],
            'a2b6c2' => ['required', 'string', 'max:255'],
            'a2b6c3' => ['required', 'string', 'max:255'],
            'a2b6c4' => ['required', 'string', 'max:255'],
            // 
            'a2b7c1' => ['required', 'string', 'max:255'],
            'a2b7c2' => ['required', 'string', 'max:255'],
            'a2b7c3' => ['required', 'string', 'max:255'],
            'a2b7c4' => ['required', 'string', 'max:255'],
            // 
            'a2b8c1' => ['required', 'string', 'max:255'],
            'a2b8c2' => ['required', 'string', 'max:255'],
            'a2b8c3' => ['required', 'string', 'max:255'],
            'a2b8c4' => ['required', 'string', 'max:255'],
            // 
            'a2b9c1' => ['required', 'string', 'max:255'],
            'a2b9c2' => ['required', 'string', 'max:255'],
            'a2b9c3' => ['required', 'string', 'max:255'],
            'a2b9c4' => ['required', 'string', 'max:255'],
            // 
            'a2b10c1' => ['required', 'string', 'max:255'],
            'a2b10c2' => ['required', 'string', 'max:255'],
            'a2b10c3' => ['required', 'string', 'max:255'],
            'a2b10c4' => ['required', 'string', 'max:255'],
            // 
            'a2b11c1' => ['required', 'string', 'max:255'],
            'a2b11c2' => ['required', 'string', 'max:255'],
            'a2b11c3' => ['required', 'string', 'max:255'],
            'a2b11c4' => ['required', 'string', 'max:255'],
            // 
            'a2b12c1' => ['required', 'string', 'max:255'],
            'a2b12c2' => ['required', 'string', 'max:255'],
            'a2b12c3' => ['required', 'string', 'max:255'],
            'a2b12c4' => ['required', 'string', 'max:255'],
            // 
            'a2b13c1' => ['required', 'string', 'max:255'],
            'a2b13c2' => ['required', 'string', 'max:255'],
            'a2b13c3' => ['required', 'string', 'max:255'],
            'a2b13c4' => ['required', 'string', 'max:255'],

            // ekskul
            //
            'a3b1c1' => ['nullable', 'string', 'max:255'],
            'a3b1c2' => ['nullable', 'string', 'max:255'],
            //
            'a3b2c1' => ['nullable', 'string', 'max:255'],
            'a3b2c2' => ['nullable', 'string', 'max:255'],

            // prestasi
            //
            'a4b1c1' => ['nullable', 'string', 'max:255'],
            'a4b1c2' => ['nullable', 'string', 'max:255'],
            //
            'a4b2c1' => ['nullable', 'string', 'max:255'],
            'a4b2c2' => ['nullable', 'string', 'max:255'],
            //
            'a4b3c1' => ['nullable', 'string', 'max:255'],
            'a4b3c2' => ['nullable', 'string', 'max:255'],

            // Ketidakhadiran
            //
            'sakit' => ['nullable', 'string', 'max:255'],
            //
            'izin' => ['nullable', 'string', 'max:255'],
            //
            'tanpa_keterangan' => ['nullable', 'string', 'max:255'],
            // kenaikan
            'status' => ['nullable', 'string', 'max:50'],
            'status_kelas' => ['nullable', 'string', 'max:5'],
            // tanda tangan
            // kepsek
            'kepsek' => ['nullable', 'string', 'max:255'],
            'nip_kepsek' => ['nullable', 'string', 'max:20'],
            'barcode_kepsek' => 'nullable|image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=300,max_height=300',
            // wali kelas
            'wali_kelas' => ['nullable', 'string', 'max:255'],
            'nip_wali_kelas' => ['nullable', 'string', 'max:20'],
            'barcode_wali_kelas' => 'nullable|image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=300,max_height=300',


        ], [
            // data siswa
            'tahun_ajaran' => 'Masukan Tahun Ajaran',
            'kelas'        => 'Masukan Kelas',
            'siswa'        => 'Masukan Siswa',
            // Profil Pelajar Pancasila
            'a1b1c1' => 'Masukan Nilai..',
            'a1b1c2' => 'Masukan Nilai..',
            // 
            'a1b2c1' => 'Masukan Nilai..',
            'a1b2c2' => 'Masukan Nilai..',
            // 
            'a1b3c1' => 'Masukan Nilai..',
            'a1b3c2' => 'Masukan Nilai..',
            // 
            'a1b4c1' => 'Masukan Nilai..',
            'a1b4c2' => 'Masukan Nilai..',
            // 
            'a1b5c1' => 'Masukan Nilai..',
            'a1b5c2' => 'Masukan Nilai..',
            // 
            'a1b6c1' => 'Masukan Nilai..',
            'a1b6c2' => 'Masukan Nilai..',


            // Pengetahuan

            'a2b1c1' => 'Masukan Nilai..',
            'a2b1c2' => 'Masukan Nilai..',
            'a2b1c3' => 'Masukan Nilai..',
            'a2b1c4' => 'Masukan Nilai..',
            // 
            'a2b2c1' => 'Masukan Nilai..',
            'a2b2c2' => 'Masukan Nilai..',
            'a2b2c3' => 'Masukan Nilai..',
            'a2b2c4' => 'Masukan Nilai..',
            // 
            'a2b3c1' => 'Masukan Nilai..',
            'a2b3c2' => 'Masukan Nilai..',
            'a2b3c3' => 'Masukan Nilai..',
            'a2b3c4' => 'Masukan Nilai..',
            // 
            'a2b4c1' => 'Masukan Nilai..',
            'a2b4c2' => 'Masukan Nilai..',
            'a2b4c3' => 'Masukan Nilai..',
            'a2b4c4' => 'Masukan Nilai..',
            // 
            'a2b5c1' => 'Masukan Nilai..',
            'a2b5c2' => 'Masukan Nilai..',
            'a2b5c3' => 'Masukan Nilai..',
            'a2b5c4' => 'Masukan Nilai..',
            // 
            'a2b6c1' => 'Masukan Nilai..',
            'a2b6c2' => 'Masukan Nilai..',
            'a2b6c3' => 'Masukan Nilai..',
            'a2b6c4' => 'Masukan Nilai..',
            // 
            'a2b7c1' => 'Masukan Nilai..',
            'a2b7c2' => 'Masukan Nilai..',
            'a2b7c3' => 'Masukan Nilai..',
            'a2b7c4' => 'Masukan Nilai..',
            // 
            'a2b8c1' => 'Masukan Nilai..',
            'a2b8c2' => 'Masukan Nilai..',
            'a2b8c3' => 'Masukan Nilai..',
            'a2b8c4' => 'Masukan Nilai..',
            // 
            'a2b9c1' => 'Masukan Nilai..',
            'a2b9c2' => 'Masukan Nilai..',
            'a2b9c3' => 'Masukan Nilai..',
            'a2b9c4' => 'Masukan Nilai..',
            // 
            'a2b10c1' => 'Masukan Nilai..',
            'a2b10c2' => 'Masukan Nilai..',
            'a2b10c3' => 'Masukan Nilai..',
            'a2b10c4' => 'Masukan Nilai..',
            // 
            'a2b11c1' => 'Masukan Nilai..',
            'a2b11c2' => 'Masukan Nilai..',
            'a2b11c3' => 'Masukan Nilai..',
            'a2b11c4' => 'Masukan Nilai..',
            // 
            'a2b12c1' => 'Masukan Nilai..',
            'a2b12c2' => 'Masukan Nilai..',
            'a2b12c3' => 'Masukan Nilai..',
            'a2b12c4' => 'Masukan Nilai..',
            // 
            'a2b13c1' => 'Masukan Nilai..',
            'a2b13c2' => 'Masukan Nilai..',
            'a2b13c3' => 'Masukan Nilai..',
            'a2b13c4' => 'Masukan Nilai..',
        ]);

        $ketidakhadiran = Ketidakhadiran::find($id);


        $pelajarPancasila = [
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
            'kelas' => $validatedData['kelas'],
            'siswa' => $validatedData['siswa'],
            // 
            'b1c1' => $validatedData['a1b1c1'],
            'b1c2' => $validatedData['a1b1c2'],
            //
            'b2c1' => $validatedData['a1b2c1'],
            'b2c2' => $validatedData['a1b2c2'],
            //
            'b3c1' => $validatedData['a1b3c1'],
            'b3c2' => $validatedData['a1b3c2'],
            //
            'b4c1' => $validatedData['a1b4c1'],
            'b4c2' => $validatedData['a1b4c2'],
            //
            'b5c1' => $validatedData['a1b5c1'],
            'b5c2' => $validatedData['a1b5c2'],
            //
            'b6c1' => $validatedData['a1b6c1'],
            'b6c2' => $validatedData['a1b6c2'],
        ];

        PelajarPancasila::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->update($pelajarPancasila);

        $pengetahuan = [
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
            'kelas' => $validatedData['kelas'],
            'siswa' => $validatedData['siswa'],

            // 
            'b1c1' => $validatedData['a2b1c1'],
            'b1c2' => $validatedData['a2b1c2'],
            'b1c3' => $validatedData['a2b1c3'],
            'b1c4' => $validatedData['a2b1c4'],
            //
            'b2c1' => $validatedData['a2b2c1'],
            'b2c2' => $validatedData['a2b2c2'],
            'b2c3' => $validatedData['a2b2c3'],
            'b2c4' => $validatedData['a2b2c4'],
            //
            'b3c1' => $validatedData['a2b3c1'],
            'b3c2' => $validatedData['a2b3c2'],
            'b3c3' => $validatedData['a2b3c3'],
            'b3c4' => $validatedData['a2b3c4'],
            //
            'b4c1' => $validatedData['a2b4c1'],
            'b4c2' => $validatedData['a2b4c2'],
            'b4c3' => $validatedData['a2b4c3'],
            'b4c4' => $validatedData['a2b4c4'],
            //
            'b5c1' => $validatedData['a2b5c1'],
            'b5c2' => $validatedData['a2b5c2'],
            'b5c3' => $validatedData['a2b5c3'],
            'b5c4' => $validatedData['a2b5c4'],
            //
            'b6c1' => $validatedData['a2b6c1'],
            'b6c2' => $validatedData['a2b6c2'],
            'b6c3' => $validatedData['a2b6c3'],
            'b6c4' => $validatedData['a2b6c4'],
            //
            'b7c1' => $validatedData['a2b7c1'],
            'b7c2' => $validatedData['a2b7c2'],
            'b7c3' => $validatedData['a2b7c3'],
            'b7c4' => $validatedData['a2b7c4'],
            //
            'b8c1' => $validatedData['a2b8c1'],
            'b8c2' => $validatedData['a2b8c2'],
            'b8c3' => $validatedData['a2b8c3'],
            'b8c4' => $validatedData['a2b8c4'],
            //
            'b9c1' => $validatedData['a2b9c1'],
            'b9c2' => $validatedData['a2b9c2'],
            'b9c3' => $validatedData['a2b9c3'],
            'b9c4' => $validatedData['a2b9c4'],
            //
            'b10c1' => $validatedData['a2b10c1'],
            'b10c2' => $validatedData['a2b10c2'],
            'b10c3' => $validatedData['a2b10c3'],
            'b10c4' => $validatedData['a2b10c4'],
            //
            'b11c1' => $validatedData['a2b11c1'],
            'b11c2' => $validatedData['a2b11c2'],
            'b11c3' => $validatedData['a2b11c3'],
            'b11c4' => $validatedData['a2b11c4'],
            //
            'b12c1' => $validatedData['a2b12c1'],
            'b12c2' => $validatedData['a2b12c2'],
            'b12c3' => $validatedData['a2b12c3'],
            'b12c4' => $validatedData['a2b12c4'],
            //
            'b13c1' => $validatedData['a2b13c1'],
            'b13c2' => $validatedData['a2b13c2'],
            'b13c3' => $validatedData['a2b13c3'],
            'b13c4' => $validatedData['a2b13c4'],
        ];

        Pengetahuan::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->update($pengetahuan);


        $ekstra = [
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
            'kelas' => $validatedData['kelas'],
            'siswa' => $validatedData['siswa'],
            // 
            'b1c1' => $validatedData['a3b1c1'],
            'b1c2' => $validatedData['a3b1c2'],
            //
            'b2c1' => $validatedData['a3b2c1'],
            'b2c2' => $validatedData['a3b2c2'],

        ];

        Ekstrakulikuler::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->update($ekstra);

        $prestasi = [
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
            'kelas' => $validatedData['kelas'],
            'siswa' => $validatedData['siswa'],
            // 
            'b1c1' => $validatedData['a4b1c1'],
            'b1c2' => $validatedData['a4b1c2'],
            //
            'b2c1' => $validatedData['a4b2c1'],
            'b2c2' => $validatedData['a4b2c2'],
            //
            'b3c1' => $validatedData['a4b3c1'],
            'b3c2' => $validatedData['a4b3c2'],

        ];

        Prestasi::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->update($prestasi);

        $ketidakhadiranNew = [
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
            'kelas' => $validatedData['kelas'],
            'siswa' => $validatedData['siswa'],
            // 
            'sakit' => $validatedData['sakit'],
            'izin' => $validatedData['izin'],
            'tanpa_keterangan' => $validatedData['tanpa_keterangan'],

        ];

        Ketidakhadiran::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->update($ketidakhadiranNew);

        $kenaikanNew = [
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
            'kelas' => $validatedData['kelas'],
            'siswa' => $validatedData['siswa'],
            // 
            'sakit' => $validatedData['sakit'],
            'izin' => $validatedData['izin'],
            'tanpa_keterangan' => $validatedData['tanpa_keterangan'],

        ];

        Ketidakhadiran::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->update($ketidakhadiranNew);

        $statusNew = [
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
            'kelas' => $validatedData['kelas'],
            'siswa' => $validatedData['siswa'],
            // 
            'status' => $validatedData['status'],
            'status_kelas' => $validatedData['status_kelas'],

        ];

        ModelKenaikan::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->update($statusNew);
        // update barcode
        $get_ttd = ModelTandaTangan::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->first();
        // 
        if ($request->file('barcode_kepsek')) {
            Storage::delete('public/images/barcode/' . $get_ttd->barcode_kepsek);
            $file = $request->file('barcode_kepsek');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('barcode_kepsek')->storeAs('public/images/barcode', $fileName);
            $validatedData['barcode_kepsek'] = $fileName;
        }
        else {
            $validatedData['barcode_kepsek'] = $get_ttd->barcode_kepsek;
        }

        if ($request->file('barcode_wali_kelas')) {
            Storage::delete('public/images/barcode/' . $get_ttd->barcode_wali_kelas);
            $file = $request->file('barcode_wali_kelas');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('barcode_wali_kelas')->storeAs('public/images/barcode', $fileName);
            $validatedData['barcode_wali_kelas'] = $fileName;
        } else {
            $validatedData['barcode_wali_kelas'] = $get_ttd->barcode_wali_kelas;
        }


        $ttdNew = [
            'tahun_ajaran' => $validatedData['tahun_ajaran'],
            'kelas' => $validatedData['kelas'],
            'siswa' => $validatedData['siswa'],
            // 
            'kepsek' => $validatedData['kepsek'],
            'nip_kepsek' => $validatedData['nip_kepsek'],
            'barcode_kepsek' => $validatedData['barcode_kepsek'],
            // 
            'wali_kelas' => $validatedData['wali_kelas'],
            'nip_wali_kelas' => $validatedData['nip_wali_kelas'],
            'barcode_wali_kelas' => $validatedData['barcode_wali_kelas'],

        ];

        ModelTandaTangan::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->update($ttdNew);


        $update_kelas = [
            'tahun_ajaran' => $validatedData['tahun_ajaran']
        ];
        $update_siswa = Students::where('nama_lengkap', $validatedData['siswa'])->first();
        $idKelas = $_COOKIE['id_kelas'];

        ModelKelas::where('id', $idKelas)
            ->where('kelas', $validatedData['kelas'])
            ->where('id_siswa', $update_siswa->id)
            ->update($update_kelas);
        // 
        return redirect()->route('nilai.index')
            ->with('success', 'Berhasil Mengedit Nilai Siswa ' . $ketidakhadiran->siswa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ketidakhadiran = Ketidakhadiran::find($id);

        PelajarPancasila::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->delete();
        Pengetahuan::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->delete();
        Ekstrakulikuler::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->delete();
        Prestasi::where('tahun_ajaran', $ketidakhadiran->tahun_ajaran)
            ->where('kelas', $ketidakhadiran->kelas)
            ->where('siswa', $ketidakhadiran->siswa)
            ->delete();
        Ketidakhadiran::where('id', $id)
            ->delete();


        return redirect()->route('nilai.index')
            ->with('success', 'Berhasil Menghapus Data Nilai Siswa ' . $ketidakhadiran->siswa);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use App\Models\Ketidakhadiran;
use App\Models\ModelBeasiswa;
use App\Models\ModelIjazah;
use App\Models\ModelKelas;
use App\Models\ModelKenaikan;
use App\Models\ModelKesehatan;
use App\Models\ModelKompetensi;
use App\Models\ModelLainLain;
use App\Models\ModelMeninggalkanSekolah;
use App\Models\Students;
use App\Models\ModelOrangTua;
use App\Models\ModelProgressSiswa;
use App\Models\ModelTandaTangan;
use App\Models\PelajarPancasila;
use App\Models\Pengetahuan;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Siswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = DB::table('students')
        ->select('id', 'nis','nisn', 'nama_lengkap', 'jen_kel', 'foto_siswa')
        ->orderBy('nis')
        ->get();

        return view('siswa.siswa_view')
            ->with(compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.siswa_create_view');
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
            'nis' => ['required', 'min:4', 'max:4', 'unique:students,nis'],
            'nisn' => ['required', 'min:10', 'max:10', 'unique:students,nisn'],
            'nik' => ['string', 'max:16', 'nullable'],
            'no_kk' => ['string', 'max:16', 'nullable'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nama_panggilan' => ['string', 'max:255', 'nullable'],
            'jen_kel' => ['string'],
            'tempat_lahir' => ['string', 'required', 'nullable', 'max:100'],
            'tgl_lahir' => ['required', 'string'],
            'agama' => ['required', 'string'],
            'kewarganegaraan' => ['string', 'nullable', 'max:100'],
            'jml_saudara' => ['required', 'string'],
            'bahasa' => ['string', 'nullable', 'max:100'],
            'gol_darah' => ['required', 'string'],
            'alamat' => ['string', 'nullable', 'max:255'],
            'telepon' => ['string', 'nullable', 'max:13'],
            'tempat_tinggal' => ['string', 'nullable', 'max:100'],
            'jarak' => ['string', 'nullable', 'max:5'],
            // orang tua
            'nama_ayah' => ['string', 'nullable', 'max:255'],
            'nama_ibu' => ['string', 'nullable', 'max:255'],
            'pendidikan_ayah' => ['string'],
            'pendidikan_ibu' => ['string'],
            'pekerjaan_ayah' => ['string', 'nullable', 'max:255'],
            'pekerjaan_ibu' => ['string', 'nullable', 'max:255'],
            'nama_wali' => ['string', 'nullable', 'max:255'],
            'hubungan_wali' => ['string', 'nullable', 'max:100'],
            'pendidikan_wali' => ['string'],
            'pekerjaan_wali' => ['string', 'nullable', 'max:255'],
            // perkembangan siswa
            'asal_sekolah' => ['string', 'nullable', 'max:100'],
            'nama_tk' => ['string', 'nullable', 'max:100'],
            'tgl_sttb' => ['string', 'nullable', 'max:50'],
            'no_sttb' => ['string', 'nullable', 'max:100'],
            'asal_sekolah_pindah' => ['string', 'nullable', 'max:100'],
            'tingkat_sekolah_pindah' => ['string', 'nullable', 'max:2'],
            'tgl_diterima' => ['string', 'nullable', 'max:20'],

            // kesehatan jasmani
            // tahun
            'jas_th_1' => ['string', 'nullable', 'max:20'],
            'jas_th_2' => ['string', 'nullable', 'max:20'],
            'jas_th_3' => ['string', 'nullable', 'max:20'],
            'jas_th_4' => ['string', 'nullable', 'max:20'],
            'jas_th_5' => ['string', 'nullable', 'max:20'],
            'jas_th_6' => ['string', 'nullable', 'max:20'],
            // berat
            'jas_bb_1' => ['string', 'nullable', 'max:20'],
            'jas_bb_2' => ['string', 'nullable', 'max:20'],
            'jas_bb_3' => ['string', 'nullable', 'max:20'],
            'jas_bb_4' => ['string', 'nullable', 'max:20'],
            'jas_bb_5' => ['string', 'nullable', 'max:20'],
            'jas_bb_6' => ['string', 'nullable', 'max:20'],
            // tinggi
            'jas_tb_1' => ['string', 'nullable', 'max:20'],
            'jas_tb_2' => ['string', 'nullable', 'max:20'],
            'jas_tb_3' => ['string', 'nullable', 'max:20'],
            'jas_tb_4' => ['string', 'nullable', 'max:20'],
            'jas_tb_5' => ['string', 'nullable', 'max:20'],
            'jas_tb_6' => ['string', 'nullable', 'max:20'],

            // penyakit
            'jas_pt_1' => ['string', 'nullable', 'max:255'],
            'jas_pt_2' => ['string', 'nullable', 'max:255'],
            'jas_pt_3' => ['string', 'nullable', 'max:255'],
            'jas_pt_4' => ['string', 'nullable', 'max:255'],
            'jas_pt_5' => ['string', 'nullable', 'max:255'],
            'jas_pt_6' => ['string', 'nullable', 'max:255'],

            // keahlian
            'jas_kj_1' => ['string', 'nullable', 'max:255'],
            'jas_kj_2' => ['string', 'nullable', 'max:255'],
            'jas_kj_3' => ['string', 'nullable', 'max:255'],
            'jas_kj_4' => ['string', 'nullable', 'max:255'],
            'jas_kj_5' => ['string', 'nullable', 'max:255'],
            'jas_kj_6' => ['string', 'nullable', 'max:255'],

            // beasiswa
            'beasiswa' => ['string', 'nullable', 'max:255'],
            // meninggalkan sekolah
            //tamat
            'thn_tamat' => ['string', 'nullable', 'max:50'],
            'no_ijazah' => ['string', 'nullable', 'max:255'],
            'lanjut_sekolah_tamat' => ['string', 'nullable', 'max:255'],
            //pindah 
            'dari_tingkat' => ['string', 'nullable', 'max:5'],
            'ke_tingkat' => ['string', 'nullable', 'max:5'],
            'lanjut_sekolah_pindah' => ['string', 'nullable', 'max:255'],

            // keluar
            'tgl_keluar_sekolah' => ['string', 'nullable', 'max:50'],
            'alasan_keluar_sekolah' => ['string', 'nullable', 'max:255'],
            // lain-lain
            'lain_lain' => ['string', 'nullable', 'max:255'],
            // foto
            'foto_siswa' => 'image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=200,max_height=300',

        ]);

        // dd($validatedData);
        if ($request->file('foto_siswa')) {
            $folderPath = 'public/images/foto-siswa';

            if (!Storage::exists($folderPath)) {
                // Folder doesn't exist, create it
                Storage::makeDirectory($folderPath, 0755, true);
            }
            $file = $request->file('foto_siswa');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('foto_siswa')->storeAs('public/images/foto-siswa', $fileName);
            $validatedData['foto_siswa'] = $fileName;
        } else {
            $validatedData['foto_siswa'] = "user_default_profil.png";
        }

        $siswa = [
            'nis' => $validatedData['nis'],
            'nisn' => $validatedData['nisn'],
            'nik' => $validatedData['nik'],
            'no_kk' => $validatedData['no_kk'],
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'nama_panggilan' => $validatedData['nama_panggilan'],
            'jen_kel' => $validatedData['jen_kel'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'agama' => $validatedData['agama'],
            'kewarganegaraan' => $validatedData['kewarganegaraan'],
            'jml_saudara' => $validatedData['jml_saudara'],
            'bahasa' => $validatedData['bahasa'],
            'gol_darah' => $validatedData['gol_darah'],
            'alamat' => $validatedData['alamat'],
            'telepon' => $validatedData['telepon'],
            'tempat_tinggal' => $validatedData['tempat_tinggal'],
            'jarak' => $validatedData['jarak'],
            'foto_siswa' => $validatedData['foto_siswa']
        ];

        Students::create($siswa);
        $siswaBaru = Students::where('nis', $validatedData['nis'])->first();

        // orang tua
        $orangTua = [
            'siswa_id' => $siswaBaru['id'],
            'nama_ayah' => $validatedData['nama_ayah'],
            'nama_ibu' => $validatedData['nama_ibu'],
            'pendidikan_ayah' => $validatedData['pendidikan_ayah'],
            'pendidikan_ibu' => $validatedData['pendidikan_ibu'],
            'pekerjaan_ayah' => $validatedData['pekerjaan_ayah'],
            'pekerjaan_ibu' => $validatedData['pekerjaan_ibu'],
            'nama_wali' => $validatedData['nama_wali'],
            'hubungan_wali' => $validatedData['hubungan_wali'],
            'pendidikan_wali' => $validatedData['pendidikan_wali'],
            'pekerjaan_wali' => $validatedData['pekerjaan_wali']
        ];
        ModelOrangTua::create($orangTua);

        // progress siswa
        $ProgresSiswa = [
            'siswa_id' => $siswaBaru['id'],
            'asal_sekolah' => $validatedData['asal_sekolah'],
            'nama_tk' => $validatedData['nama_tk'],
            'tgl_sttb' => $validatedData['tgl_sttb'],
            'no_sttb' => $validatedData['no_sttb'],
            'asal_sekolah_pindah' => $validatedData['asal_sekolah_pindah'],
            'tingkat_sekolah_pindah' => $validatedData['tingkat_sekolah_pindah'],
            'tgl_diterima' => $validatedData['tgl_diterima'],
        ];

        ModelProgressSiswa::create($ProgresSiswa);


        $kesehatanJasmani = [
            'siswa_id' => $siswaBaru['id'],
            // kesehatan jasmani
            // tahun
            'jas_th_1' => $validatedData['jas_th_1'],
            'jas_th_2' => $validatedData['jas_th_2'],
            'jas_th_3' => $validatedData['jas_th_3'],
            'jas_th_4' => $validatedData['jas_th_4'],
            'jas_th_5' => $validatedData['jas_th_5'],
            'jas_th_6' => $validatedData['jas_th_6'],
            // berat
            'jas_bb_1' => $validatedData['jas_bb_1'],
            'jas_bb_2' => $validatedData['jas_bb_2'],
            'jas_bb_3' => $validatedData['jas_bb_3'],
            'jas_bb_4' => $validatedData['jas_bb_4'],
            'jas_bb_5' => $validatedData['jas_bb_5'],
            'jas_bb_6' => $validatedData['jas_bb_6'],
            // tinggi
            'jas_tb_1' => $validatedData['jas_tb_1'],
            'jas_tb_2' => $validatedData['jas_tb_2'],
            'jas_tb_3' => $validatedData['jas_tb_3'],
            'jas_tb_4' => $validatedData['jas_tb_4'],
            'jas_tb_5' => $validatedData['jas_tb_5'],
            'jas_tb_6' => $validatedData['jas_tb_6'],

            // penyakit
            'jas_pt_1' => $validatedData['jas_pt_1'],
            'jas_pt_2' => $validatedData['jas_pt_2'],
            'jas_pt_3' => $validatedData['jas_pt_3'],
            'jas_pt_4' => $validatedData['jas_pt_4'],
            'jas_pt_5' => $validatedData['jas_pt_5'],
            'jas_pt_6' => $validatedData['jas_pt_6'],

            // keahlian
            'jas_kj_1' => $validatedData['jas_kj_1'],
            'jas_kj_2' => $validatedData['jas_kj_2'],
            'jas_kj_3' => $validatedData['jas_kj_3'],
            'jas_kj_4' => $validatedData['jas_kj_4'],
            'jas_kj_5' => $validatedData['jas_kj_5'],
            'jas_kj_6' => $validatedData['jas_kj_6'],
        ];

        ModelKesehatan::create($kesehatanJasmani);


        // beasiswa
        $beasiswa = [
            'siswa_id' => $siswaBaru['id'],
            'beasiswa' =>  $validatedData['beasiswa'],
        ];

        ModelBeasiswa::create($beasiswa);

        // meninggalkan sekolah
        $meninggalkanSekolah = [
            'siswa_id' => $siswaBaru['id'],
            'thn_tamat' => $validatedData['thn_tamat'],
            'no_ijazah' => $validatedData['no_ijazah'],
            'lanjut_sekolah_tamat' => $validatedData['lanjut_sekolah_tamat'],
            //pindah 
            'dari_tingkat' => $validatedData['dari_tingkat'],
            'ke_tingkat' => $validatedData['ke_tingkat'],
            'lanjut_sekolah_pindah' => $validatedData['lanjut_sekolah_pindah'],

            // keluar
            'tgl_keluar_sekolah' => $validatedData['tgl_keluar_sekolah'],
            'alasan_keluar_sekolah' => $validatedData['alasan_keluar_sekolah'],
        ];

        ModelMeninggalkanSekolah::create($meninggalkanSekolah);

        // lain-lain
        $lain = [
            'siswa_id' => $siswaBaru['id'],
            'lain_lain' =>  $validatedData['lain_lain'],
        ];

        ModelLainLain::create($lain);

        // buat kelas
        for ($i=1; $i < 7; $i++) { 
            $kelas = [
            'id_siswa' => $siswaBaru['id'],
            'kelas' => $i,
            'tinggal_kelas' => 'false',
            'tahun_ajaran' => NULL,
            ];
            ModelKelas::create($kelas);
        }
        return redirect()->route('siswa.index')
            ->with('success', 'Berhasil Menambahkan Siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Students::find($id);
        $orangTua = ModelOrangTua::where('siswa_id', $student['id'])->first();
        $progresSiswa = ModelProgressSiswa::where('siswa_id', $student['id'])->first();
        $kesehatanJasmani = ModelKesehatan::where('siswa_id', $student['id'])->first();
        $beasiswa = ModelBeasiswa::where('siswa_id', $student['id'])->first();
        $meninggalkanSekolah = ModelMeninggalkanSekolah::where('siswa_id', $student['id'])->first();
        $lain = ModelLainLain::where('siswa_id', $student['id'])->first();

        return view('siswa.siswa_detail_view')
            ->with(compact('student'))
            ->with(compact('orangTua'))
            ->with(compact('progresSiswa'))
            ->with(compact('kesehatanJasmani'))
            ->with(compact('beasiswa'))
            ->with(compact('meninggalkanSekolah'))
            ->with(compact('lain'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Students::find($id);
        $orangTua = ModelOrangTua::where('siswa_id', $student['id'])->first();
        $progresSiswa = ModelProgressSiswa::where('siswa_id', $student['id'])->first();
        $kesehatanJasmani = ModelKesehatan::where('siswa_id', $student['id'])->first();
        $beasiswa = ModelBeasiswa::where('siswa_id', $student['id'])->first();
        $meninggalkanSekolah = ModelMeninggalkanSekolah::where('siswa_id', $student['id'])->first();
        $lain = ModelLainLain::where('siswa_id', $student['id'])->first();

        return view('siswa.siswa_edit_view')
            ->with(compact('student'))
            ->with(compact('orangTua'))
            ->with(compact('progresSiswa'))
            ->with(compact('kesehatanJasmani'))
            ->with(compact('beasiswa'))
            ->with(compact('meninggalkanSekolah'))
            ->with(compact('lain'));
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
        $siswa = Students::find($id);
        //$nisExist = Students::where('nis', $request->nis)->first();
        //$nisnExist = Students::where('nisn', $request->nisn)->first();

        if ($request->nis != $siswa->nis) {
            $validatedData = $request->validate([
                'nis' => ['required', 'min:4', 'max:4', 'unique:students,nis'],
                'nisn' => ['required', 'min:10', 'max:10'],
                'nik' => ['string', 'max:16', 'nullable'],
                'no_kk' => ['string', 'max:16', 'nullable'],
                'nama_lengkap' => ['required', 'string', 'max:255'],
                'nama_panggilan' => ['string', 'max:255', 'nullable'],
                'jen_kel' => ['string'],
                'tempat_lahir' => ['string', 'required', 'nullable', 'max:100'],
                'tgl_lahir' => ['required', 'string'],
                'agama' => ['required', 'string'],
                'kewarganegaraan' => ['string', 'nullable', 'max:100'],
                'jml_saudara' => ['required', 'string'],
                'bahasa' => ['string', 'nullable', 'max:100'],
                'gol_darah' => ['required', 'string'],
                'alamat' => ['string', 'nullable', 'max:255'],
                'telepon' => ['string', 'nullable', 'max:13'],
                'tempat_tinggal' => ['string', 'nullable', 'max:100'],
                'jarak' => ['string', 'nullable', 'max:5'],
                'nama_ayah' => ['string', 'nullable', 'max:255'],
                'nama_ibu' => ['string', 'nullable', 'max:255'],
                'pendidikan_ayah' => ['string'],
                'pendidikan_ibu' => ['string'],
                'pekerjaan_ayah' => ['string', 'nullable', 'max:255'],
                'pekerjaan_ibu' => ['string', 'nullable', 'max:255'],
                'nama_wali' => ['string', 'nullable', 'max:255'],
                'hubungan_wali' => ['string', 'nullable', 'max:100'],
                'pendidikan_wali' => ['string'],
                'pekerjaan_wali' => ['string', 'nullable', 'max:255'],
                'asal_sekolah' => ['string', 'nullable', 'max:100'],
                'nama_tk' => ['string', 'nullable', 'max:100'],
                'tgl_sttb' => ['string', 'nullable', 'max:50'],
                'no_sttb' => ['string', 'nullable', 'max:100'],
                'asal_sekolah_pindah' => ['string', 'nullable', 'max:100'],
                'tingkat_sekolah_pindah' => ['string', 'nullable', 'max:2'],
                'tgl_diterima' => ['string', 'nullable', 'max:20'],
                // kesehatan jasmani
                // tahun
                'jas_th_1' => ['string', 'nullable', 'max:20'],
                'jas_th_2' => ['string', 'nullable', 'max:20'],
                'jas_th_3' => ['string', 'nullable', 'max:20'],
                'jas_th_4' => ['string', 'nullable', 'max:20'],
                'jas_th_5' => ['string', 'nullable', 'max:20'],
                'jas_th_6' => ['string', 'nullable', 'max:20'],
                // berat
                'jas_bb_1' => ['string', 'nullable', 'max:20'],
                'jas_bb_2' => ['string', 'nullable', 'max:20'],
                'jas_bb_3' => ['string', 'nullable', 'max:20'],
                'jas_bb_4' => ['string', 'nullable', 'max:20'],
                'jas_bb_5' => ['string', 'nullable', 'max:20'],
                'jas_bb_6' => ['string', 'nullable', 'max:20'],
                // tinggi
                'jas_tb_1' => ['string', 'nullable', 'max:20'],
                'jas_tb_2' => ['string', 'nullable', 'max:20'],
                'jas_tb_3' => ['string', 'nullable', 'max:20'],
                'jas_tb_4' => ['string', 'nullable', 'max:20'],
                'jas_tb_5' => ['string', 'nullable', 'max:20'],
                'jas_tb_6' => ['string', 'nullable', 'max:20'],

                // penyakit
                'jas_pt_1' => ['string', 'nullable', 'max:255'],
                'jas_pt_2' => ['string', 'nullable', 'max:255'],
                'jas_pt_3' => ['string', 'nullable', 'max:255'],
                'jas_pt_4' => ['string', 'nullable', 'max:255'],
                'jas_pt_5' => ['string', 'nullable', 'max:255'],
                'jas_pt_6' => ['string', 'nullable', 'max:255'],

                // keahlian
                'jas_kj_1' => ['string', 'nullable', 'max:255'],
                'jas_kj_2' => ['string', 'nullable', 'max:255'],
                'jas_kj_3' => ['string', 'nullable', 'max:255'],
                'jas_kj_4' => ['string', 'nullable', 'max:255'],
                'jas_kj_5' => ['string', 'nullable', 'max:255'],
                'jas_kj_6' => ['string', 'nullable', 'max:255'],

                // beasiswa
                'beasiswa' => ['string', 'nullable', 'max:255'],
                // meninggalkan sekolah
                //tamat
                'thn_tamat' => ['string', 'nullable', 'max:50'],
                'no_ijazah' => ['string', 'nullable', 'max:255'],
                'lanjut_sekolah_tamat' => ['string', 'nullable', 'max:255'],
                //pindah 
                'dari_tingkat' => ['string', 'nullable', 'max:5'],
                'ke_tingkat' => ['string', 'nullable', 'max:5'],
                'lanjut_sekolah_pindah' => ['string', 'nullable', 'max:255'],

                // keluar
                'tgl_keluar_sekolah' => ['string', 'nullable', 'max:50'],
                'alasan_keluar_sekolah' => ['string', 'nullable', 'max:255'],
                // lain-lain
                'lain_lain' => ['string', 'nullable', 'max:255'],
                // foto
                'foto_siswa' => 'image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=200,max_height=300',

            ]);
        } 

        else if ($request->nisn != $siswa->nisn) {
            $validatedData = $request->validate([
                'nis' => ['required', 'min:4', 'max:4'],
                'nisn' => ['required', 'min:10', 'max:10', 'unique:students,nisn'],
                'nik' => ['string', 'max:16', 'nullable'],
                'no_kk' => ['string', 'max:16', 'nullable'],
                'nama_lengkap' => ['required', 'string', 'max:255'],
                'nama_panggilan' => ['string', 'max:255', 'nullable'],
                'jen_kel' => ['string'],
                'tempat_lahir' => ['string', 'required', 'nullable', 'max:100'],
                'tgl_lahir' => ['required', 'string'],
                'agama' => ['required', 'string'],
                'kewarganegaraan' => ['string', 'nullable', 'max:100'],
                'jml_saudara' => ['required', 'string'],
                'bahasa' => ['string', 'nullable', 'max:100'],
                'gol_darah' => ['required', 'string'],
                'alamat' => ['string', 'nullable', 'max:255'],
                'telepon' => ['string', 'nullable', 'max:13'],
                'tempat_tinggal' => ['string', 'nullable', 'max:100'],
                'jarak' => ['string', 'nullable', 'max:5'],
                'nama_ayah' => ['string', 'nullable', 'max:255'],
                'nama_ibu' => ['string', 'nullable', 'max:255'],
                'pendidikan_ayah' => ['string'],
                'pendidikan_ibu' => ['string'],
                'pekerjaan_ayah' => ['string', 'nullable', 'max:255'],
                'pekerjaan_ibu' => ['string', 'nullable', 'max:255'],
                'nama_wali' => ['string', 'nullable', 'max:255'],
                'hubungan_wali' => ['string', 'nullable', 'max:100'],
                'pendidikan_wali' => ['string'],
                'pekerjaan_wali' => ['string', 'nullable', 'max:255'],
                'asal_sekolah' => ['string', 'nullable', 'max:100'],
                'nama_tk' => ['string', 'nullable', 'max:100'],
                'tgl_sttb' => ['string', 'nullable', 'max:50'],
                'no_sttb' => ['string', 'nullable', 'max:100'],
                'asal_sekolah_pindah' => ['string', 'nullable', 'max:100'],
                'tingkat_sekolah_pindah' => ['string', 'nullable', 'max:2'],
                'tgl_diterima' => ['string', 'nullable', 'max:20'],
                // kesehatan jasmani
                // tahun
                'jas_th_1' => ['string', 'nullable', 'max:20'],
                'jas_th_2' => ['string', 'nullable', 'max:20'],
                'jas_th_3' => ['string', 'nullable', 'max:20'],
                'jas_th_4' => ['string', 'nullable', 'max:20'],
                'jas_th_5' => ['string', 'nullable', 'max:20'],
                'jas_th_6' => ['string', 'nullable', 'max:20'],
                // berat
                'jas_bb_1' => ['string', 'nullable', 'max:20'],
                'jas_bb_2' => ['string', 'nullable', 'max:20'],
                'jas_bb_3' => ['string', 'nullable', 'max:20'],
                'jas_bb_4' => ['string', 'nullable', 'max:20'],
                'jas_bb_5' => ['string', 'nullable', 'max:20'],
                'jas_bb_6' => ['string', 'nullable', 'max:20'],
                // tinggi
                'jas_tb_1' => ['string', 'nullable', 'max:20'],
                'jas_tb_2' => ['string', 'nullable', 'max:20'],
                'jas_tb_3' => ['string', 'nullable', 'max:20'],
                'jas_tb_4' => ['string', 'nullable', 'max:20'],
                'jas_tb_5' => ['string', 'nullable', 'max:20'],
                'jas_tb_6' => ['string', 'nullable', 'max:20'],

                // penyakit
                'jas_pt_1' => ['string', 'nullable', 'max:255'],
                'jas_pt_2' => ['string', 'nullable', 'max:255'],
                'jas_pt_3' => ['string', 'nullable', 'max:255'],
                'jas_pt_4' => ['string', 'nullable', 'max:255'],
                'jas_pt_5' => ['string', 'nullable', 'max:255'],
                'jas_pt_6' => ['string', 'nullable', 'max:255'],

                // keahlian
                'jas_kj_1' => ['string', 'nullable', 'max:255'],
                'jas_kj_2' => ['string', 'nullable', 'max:255'],
                'jas_kj_3' => ['string', 'nullable', 'max:255'],
                'jas_kj_4' => ['string', 'nullable', 'max:255'],
                'jas_kj_5' => ['string', 'nullable', 'max:255'],
                'jas_kj_6' => ['string', 'nullable', 'max:255'],

                // beasiswa
                'beasiswa' => ['string', 'nullable', 'max:255'],
                // meninggalkan sekolah
                //tamat
                'thn_tamat' => ['string', 'nullable', 'max:50'],
                'no_ijazah' => ['string', 'nullable', 'max:255'],
                'lanjut_sekolah_tamat' => ['string', 'nullable', 'max:255'],
                //pindah 
                'dari_tingkat' => ['string', 'nullable', 'max:5'],
                'ke_tingkat' => ['string', 'nullable', 'max:5'],
                'lanjut_sekolah_pindah' => ['string', 'nullable', 'max:255'],

                // keluar
                'tgl_keluar_sekolah' => ['string', 'nullable', 'max:50'],
                'alasan_keluar_sekolah' => ['string', 'nullable', 'max:255'],
                // lain-lain
                'lain_lain' => ['string', 'nullable', 'max:255'],
                // foto
                'foto_siswa' => 'image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=200,max_height=300',

            ]);
        }


        else {
            $validatedData = $request->validate([
                'nis' => ['required', 'min:4', 'max:4'],
                'nisn' => ['required', 'min:10', 'max:10'],
                'nik' => ['string', 'max:16', 'nullable'],
                'no_kk' => ['string', 'max:16', 'nullable'],
                'nama_lengkap' => ['required', 'string', 'max:255'],
                'nama_panggilan' => ['string', 'max:255', 'nullable'],
                'jen_kel' => ['string'],
                'tempat_lahir' => ['string', 'required', 'nullable', 'max:100'],
                'tgl_lahir' => ['required', 'string'],
                'agama' => ['required', 'string'],
                'kewarganegaraan' => ['string', 'nullable', 'max:100'],
                'jml_saudara' => ['required', 'string'],
                'bahasa' => ['string', 'nullable', 'max:100'],
                'gol_darah' => ['required', 'string'],
                'alamat' => ['string', 'nullable', 'max:255'],
                'telepon' => ['string', 'nullable', 'max:13'],
                'tempat_tinggal' => ['string', 'nullable', 'max:100'],
                'jarak' => ['string', 'nullable', 'max:5'],
                'nama_ayah' => ['string', 'nullable', 'max:255'],
                'nama_ibu' => ['string', 'nullable', 'max:255'],
                'pendidikan_ayah' => ['string'],
                'pendidikan_ibu' => ['string'],
                'pekerjaan_ayah' => ['string', 'nullable', 'max:255'],
                'pekerjaan_ibu' => ['string', 'nullable', 'max:255'],
                'nama_wali' => ['string', 'nullable', 'max:255'],
                'hubungan_wali' => ['string', 'nullable', 'max:100'],
                'pendidikan_wali' => ['string'],
                'pekerjaan_wali' => ['string', 'nullable', 'max:255'],
                'asal_sekolah' => ['string', 'nullable', 'max:100'],
                'nama_tk' => ['string', 'nullable', 'max:100'],
                'tgl_sttb' => ['string', 'nullable', 'max:50'],
                'no_sttb' => ['string', 'nullable', 'max:100'],
                'asal_sekolah_pindah' => ['string', 'nullable', 'max:100'],
                'tingkat_sekolah_pindah' => ['string', 'nullable', 'max:2'],
                'tgl_diterima' => ['string', 'nullable', 'max:20'],
                // kesehatan jasmani
                // tahun
                'jas_th_1' => ['string', 'nullable', 'max:20'],
                'jas_th_2' => ['string', 'nullable', 'max:20'],
                'jas_th_3' => ['string', 'nullable', 'max:20'],
                'jas_th_4' => ['string', 'nullable', 'max:20'],
                'jas_th_5' => ['string', 'nullable', 'max:20'],
                'jas_th_6' => ['string', 'nullable', 'max:20'],
                // berat
                'jas_bb_1' => ['string', 'nullable', 'max:20'],
                'jas_bb_2' => ['string', 'nullable', 'max:20'],
                'jas_bb_3' => ['string', 'nullable', 'max:20'],
                'jas_bb_4' => ['string', 'nullable', 'max:20'],
                'jas_bb_5' => ['string', 'nullable', 'max:20'],
                'jas_bb_6' => ['string', 'nullable', 'max:20'],
                // tinggi
                'jas_tb_1' => ['string', 'nullable', 'max:20'],
                'jas_tb_2' => ['string', 'nullable', 'max:20'],
                'jas_tb_3' => ['string', 'nullable', 'max:20'],
                'jas_tb_4' => ['string', 'nullable', 'max:20'],
                'jas_tb_5' => ['string', 'nullable', 'max:20'],
                'jas_tb_6' => ['string', 'nullable', 'max:20'],

                // penyakit
                'jas_pt_1' => ['string', 'nullable', 'max:255'],
                'jas_pt_2' => ['string', 'nullable', 'max:255'],
                'jas_pt_3' => ['string', 'nullable', 'max:255'],
                'jas_pt_4' => ['string', 'nullable', 'max:255'],
                'jas_pt_5' => ['string', 'nullable', 'max:255'],
                'jas_pt_6' => ['string', 'nullable', 'max:255'],

                // keahlian
                'jas_kj_1' => ['string', 'nullable', 'max:255'],
                'jas_kj_2' => ['string', 'nullable', 'max:255'],
                'jas_kj_3' => ['string', 'nullable', 'max:255'],
                'jas_kj_4' => ['string', 'nullable', 'max:255'],
                'jas_kj_5' => ['string', 'nullable', 'max:255'],
                'jas_kj_6' => ['string', 'nullable', 'max:255'],

                // beasiswa
                'beasiswa' => ['string', 'nullable', 'max:255'],
                // meninggalkan sekolah
                //tamat
                'thn_tamat' => ['string', 'nullable', 'max:50'],
                'no_ijazah' => ['string', 'nullable', 'max:255'],
                'lanjut_sekolah_tamat' => ['string', 'nullable', 'max:255'],
                //pindah 
                'dari_tingkat' => ['string', 'nullable', 'max:5'],
                'ke_tingkat' => ['string', 'nullable', 'max:5'],
                'lanjut_sekolah_pindah' => ['string', 'nullable', 'max:255'],

                // keluar
                'tgl_keluar_sekolah' => ['string', 'nullable', 'max:50'],
                'alasan_keluar_sekolah' => ['string', 'nullable', 'max:255'],
                // lain-lain
                'lain_lain' => ['string', 'nullable', 'max:255'],
                // foto
                'foto_siswa' => 'image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=200,max_height=300',

            ]);
        }





        if ($request->file('foto_siswa')) {
            Storage::delete('public/images/foto-siswa/' . $siswa['foto_siswa']);
            $file = $request->file('foto_siswa');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('foto_siswa')->storeAs('public/images/foto-siswa', $fileName);
            $validatedData['foto_siswa'] = $fileName;
        } else {
            $validatedData['foto_siswa'] = $siswa['foto_siswa'];
        }

        $update_siswa = [
            'nis' => $validatedData['nis'],
            'nisn' => $validatedData['nisn'],
            'nik' => $validatedData['nik'],
            'no_kk' => $validatedData['no_kk'],
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'nama_panggilan' => $validatedData['nama_panggilan'],
            'jen_kel' => $validatedData['jen_kel'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'agama' => $validatedData['agama'],
            'kewarganegaraan' => $validatedData['kewarganegaraan'],
            'jml_saudara' => $validatedData['jml_saudara'],
            'bahasa' => $validatedData['bahasa'],
            'gol_darah' => $validatedData['gol_darah'],
            'alamat' => $validatedData['alamat'],
            'telepon' => $validatedData['telepon'],
            'tempat_tinggal' => $validatedData['tempat_tinggal'],
            'jarak' => $validatedData['jarak'],
            'foto_siswa' => $validatedData['foto_siswa']
        ];

        Students::where('id', $id)->update($update_siswa);

        // orang tua
        $update_orangTua = [
            'siswa_id' => $siswa['id'],
            'nama_ayah' => $validatedData['nama_ayah'],
            'nama_ibu' => $validatedData['nama_ibu'],
            'pendidikan_ayah' => $validatedData['pendidikan_ayah'],
            'pendidikan_ibu' => $validatedData['pendidikan_ibu'],
            'pekerjaan_ayah' => $validatedData['pekerjaan_ayah'],
            'pekerjaan_ibu' => $validatedData['pekerjaan_ibu'],
            'nama_wali' => $validatedData['nama_wali'],
            'hubungan_wali' => $validatedData['hubungan_wali'],
            'pendidikan_wali' => $validatedData['pendidikan_wali'],
            'pekerjaan_wali' => $validatedData['pekerjaan_wali']
        ];
        ModelOrangTua::where('siswa_id', $id)->update($update_orangTua);

        // progress siswa
        $update_ProgresSiswa = [
            'siswa_id' => $siswa['id'],
            'asal_sekolah' => $validatedData['asal_sekolah'],
            'nama_tk' => $validatedData['nama_tk'],
            'tgl_sttb' => $validatedData['tgl_sttb'],
            'no_sttb' => $validatedData['no_sttb'],
            'asal_sekolah_pindah' => $validatedData['asal_sekolah_pindah'],
            'tingkat_sekolah_pindah' => $validatedData['tingkat_sekolah_pindah'],
            'tgl_diterima' => $validatedData['tgl_diterima'],
        ];

        ModelProgressSiswa::where('siswa_id', $id)->update($update_ProgresSiswa);

        $update_kesehatanJasmani = [
            'siswa_id' => $siswa['id'],
            // kesehatan jasmani
            // tahun
            'jas_th_1' => $validatedData['jas_th_1'],
            'jas_th_2' => $validatedData['jas_th_2'],
            'jas_th_3' => $validatedData['jas_th_3'],
            'jas_th_4' => $validatedData['jas_th_4'],
            'jas_th_5' => $validatedData['jas_th_5'],
            'jas_th_6' => $validatedData['jas_th_6'],
            // berat
            'jas_bb_1' => $validatedData['jas_bb_1'],
            'jas_bb_2' => $validatedData['jas_bb_2'],
            'jas_bb_3' => $validatedData['jas_bb_3'],
            'jas_bb_4' => $validatedData['jas_bb_4'],
            'jas_bb_5' => $validatedData['jas_bb_5'],
            'jas_bb_6' => $validatedData['jas_bb_6'],
            // tinggi
            'jas_tb_1' => $validatedData['jas_tb_1'],
            'jas_tb_2' => $validatedData['jas_tb_2'],
            'jas_tb_3' => $validatedData['jas_tb_3'],
            'jas_tb_4' => $validatedData['jas_tb_4'],
            'jas_tb_5' => $validatedData['jas_tb_5'],
            'jas_tb_6' => $validatedData['jas_tb_6'],

            // penyakit
            'jas_pt_1' => $validatedData['jas_pt_1'],
            'jas_pt_2' => $validatedData['jas_pt_2'],
            'jas_pt_3' => $validatedData['jas_pt_3'],
            'jas_pt_4' => $validatedData['jas_pt_4'],
            'jas_pt_5' => $validatedData['jas_pt_5'],
            'jas_pt_6' => $validatedData['jas_pt_6'],

            // keahlian
            'jas_kj_1' => $validatedData['jas_kj_1'],
            'jas_kj_2' => $validatedData['jas_kj_2'],
            'jas_kj_3' => $validatedData['jas_kj_3'],
            'jas_kj_4' => $validatedData['jas_kj_4'],
            'jas_kj_5' => $validatedData['jas_kj_5'],
            'jas_kj_6' => $validatedData['jas_kj_6'],
        ];

        ModelKesehatan::where('siswa_id', $id)->update($update_kesehatanJasmani);



        // beasiswa
        $update_beasiswa = [
            'siswa_id' => $siswa['id'],
            'beasiswa' =>  $validatedData['beasiswa'],
        ];

        ModelBeasiswa::where('siswa_id', $id)->update($update_beasiswa);


        // meninggalkan sekolah
        $update_meninggalkanSekolah = [
            'siswa_id' => $siswa['id'],
            'thn_tamat' => $validatedData['thn_tamat'],
            'no_ijazah' => $validatedData['no_ijazah'],
            'lanjut_sekolah_tamat' => $validatedData['lanjut_sekolah_tamat'],
            //pindah 
            'dari_tingkat' => $validatedData['dari_tingkat'],
            'ke_tingkat' => $validatedData['ke_tingkat'],
            'lanjut_sekolah_pindah' => $validatedData['lanjut_sekolah_pindah'],

            // keluar
            'tgl_keluar_sekolah' => $validatedData['tgl_keluar_sekolah'],
            'alasan_keluar_sekolah' => $validatedData['alasan_keluar_sekolah'],
        ];

        ModelMeninggalkanSekolah::where('siswa_id', $id)->update($update_meninggalkanSekolah);


        // lain-lain
        $update_lain = [
            'siswa_id' => $siswa['id'],
            'lain_lain' =>  $validatedData['lain_lain'],
        ];

        ModelLainLain::where('siswa_id', $id)->update($update_lain);

        return redirect()->route('siswa.index')
            ->with('success', 'Berhasil Update Siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Students::find($id);
        $namaSiswa = $siswa->nama_lengkap;
        if ($siswa) {

            if ($siswa->foto_siswa != 'user_default_profil.png') {
                $fileFotoSiswa = 'public/images/foto-siswa/' . $siswa['foto_siswa'];

                if (Storage::exists($fileFotoSiswa)) {
                    Storage::delete('public/images/foto-siswa/' . $siswa['foto_siswa']);
                }
            }
            // delete siswa
            Students::where('id', $id)->delete();
            ModelOrangTua::where('siswa_id', $id)->delete();
            ModelProgressSiswa::where('siswa_id', $id)->delete();
            ModelKesehatan::where('siswa_id', $id)->delete();
            ModelBeasiswa::where('siswa_id', $id)->delete();
            ModelMeninggalkanSekolah::where('siswa_id', $id)->delete();
            ModelLainLain::where('siswa_id', $id)->delete();
        }
        // delete kelas
        $kelas = ModelKelas::where('id_siswa', $id);
        if ($kelas) {
            ModelKelas::where('id_siswa', $id)->delete();
        }

        // delete nilai
        $nilai = Ketidakhadiran::where('siswa', $namaSiswa);

        if ($nilai) {

            PelajarPancasila::where('siswa', $namaSiswa)->delete();
            Pengetahuan::where('siswa', $namaSiswa)->delete();
            Ekstrakulikuler::where('siswa', $namaSiswa)->delete();
            Prestasi::where('siswa', $namaSiswa)->delete();
            Ketidakhadiran::where('siswa', $namaSiswa)->delete();
            ModelKenaikan::where('siswa', $namaSiswa)->delete();
            $ttd =  ModelTandaTangan::where('siswa', $namaSiswa)->first();

            $folderPath = 'public/images/barcode';

            //dd($ttd);
            if ($ttd != null) {

                if (!Storage::exists($folderPath)) {
                    // Folder doesn't exist, create it
                    Storage::makeDirectory($folderPath, 0755, true);
                }
                if ($ttd->barcode_kepsek != null) {
                    $fileBarcodeKepsek = 'public/images/barcode/' . $ttd->barcode_kepsek;

                    if (Storage::exists($fileBarcodeKepsek)) {
                        Storage::delete('public/images/barcode/' . $ttd->barcode_kepsek);
                    }
                }
                if ($ttd->barcode_wali_kelas != null) {
                    $fileBarcodeWaliKelas = 'public/images/barcode/' . $ttd->barcode_wali_kelas;

                    if (Storage::exists($fileBarcodeWaliKelas)) {
                        Storage::delete('public/images/barcode/' . $ttd->barcode_wali_kelas);
                    }
                }

                ModelTandaTangan::where('siswa', $namaSiswa)->delete();
            }
        }
        // // delete kompetensi

        $kompetensi =  ModelKompetensi::where('id_siswa', $id);

        if ($kompetensi) {
            ModelKompetensi::where('id_siswa', $id)->delete();
        }

        // // delete ijazah

        $fileSiswaExist = ModelIjazah::where('id_siswa', $id)->first();
        $folderPathIjazah = 'public/pdf/ijazah';
        $folderPathSkhun = 'public/pdf/skhun';
        $folderPathSkl = 'public/pdf/skl';
        // create folder
        if (!Storage::exists($folderPathIjazah)) {
            // Folder doesn't exist, create it
            Storage::makeDirectory($folderPathIjazah, 0755, true);
        }
        if (!Storage::exists($folderPathSkhun)) {
            // Folder doesn't exist, create it
            Storage::makeDirectory($folderPathSkhun, 0755, true);
        }
        if (!Storage::exists($folderPathSkl)) {
            // Folder doesn't exist, create it
            Storage::makeDirectory($folderPathSkl, 0755, true);
        }

        if ($fileSiswaExist != null) {



            $file = ModelIjazah::where('id_siswa', $id)->first();


            if ($file->ijazah != null) {
                $fileIjazah = 'public/pdf/ijazah/' . $file->ijazah;
                if (Storage::exists($fileIjazah)) {
                    Storage::delete('public/pdf/ijazah/' . $file->ijazah);
                }
            }
            if ($file->skl != null) {
                $fileSkl = 'public/pdf/skl/' . $file->skl;
                if (Storage::exists($fileSkl)) {
                    Storage::delete('public/pdf/skl/' . $file->skl);
                }
            }
            if ($file->skhun != null) {
                $fileSkhun = 'public/pdf/skhun/' . $file->skhun;
                if (Storage::exists($fileSkhun)) {
                    Storage::delete('public/pdf/skhun/' . $file->skhun);
                }
            }
            ModelIjazah::where('id_siswa', $id)->delete();
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
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
        $students = Students::latest()->paginate(5);

        return view('siswa.siswa_view', compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('siswa.siswa_view');
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
            'nisn' => ['string', 'max:10', 'nullable'],
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
            'foto_siswa' => 'image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=200,max_height=300',

        ]);

        // ddd($request);
        if ($request->file('foto_siswa')) {
            $file = $request->file('foto_siswa');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('foto_siswa')->storeAs('public/images/foto-siswa', $fileName);
            $validatedData['foto_siswa'] = $fileName;
        }


        // dd($validatedData);
        Students::create($validatedData);

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

        return view('siswa.siswa_detail_view', compact('student'));
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

        return view('siswa.siswa_edit_view', compact('student'));
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
        if ($request->nis != $siswa->nis) {
            $validatedData = $request->validate([
                'nis' => ['required', 'min:4', 'max:4', 'unique:students,nis'],
                'nisn' => ['string', 'max:10', 'nullable'],
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
                'foto_siswa' => 'image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=200,max_height=300',

            ]);
        }else{
            $validatedData = $request->validate([
                'nis' => ['required', 'min:4', 'max:4'],
                'nisn' => ['string', 'max:10', 'nullable'],
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
                'foto_siswa' => 'image|file|max:2048|mimes:png,jpg,jpeg|dimensions:max_width=200,max_height=300',

            ]);
        }


        // dd($validatedData);
        

        if ($request->file('foto_siswa')) {
            Storage::delete('public/images/foto-siswa/' . $siswa['foto_siswa']);
            $file = $request->file('foto_siswa');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('foto_siswa')->storeAs('public/images/foto-siswa', $fileName);
            $validatedData['foto_siswa'] = $fileName;
        }


        // dd($validatedData);
        Students::where('id', $id)->update($validatedData);

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
        if ($siswa->foto_siswa != 'user_default_profil.png') {
            Storage::delete('public/images/foto-siswa/' . $siswa['foto_siswa']);
        }
        Students::where('id', $id)->delete();
        return redirect()->route('siswa.index')
            ->with('success', 'Berhasil Menghapus Siswa');
    }
}

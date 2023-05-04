<?php

namespace App\Http\Controllers;

use App\Models\ModelKompetensi;
use App\Models\Students;
use Illuminate\Http\Request;

class Kompetensi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = $_COOKIE['id_kompetensi'];
        $siswa = Students::find($id);
        return view('kompetensi.kompetensi_create_view')
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
            'id_siswa' => ['required', 'max:20'],
            // 
            'mapel_1' => ['nullable', 'string', 'max:255'],
            'ck_1_1' => ['nullable', 'string', 'max:255'],
            'ck_1_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_2' => ['nullable', 'string', 'max:255'],
            'ck_2_1' => ['nullable', 'string', 'max:255'],
            'ck_2_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_3' => ['nullable', 'string', 'max:255'],
            'ck_3_1' => ['nullable', 'string', 'max:255'],
            'ck_3_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_4' => ['nullable', 'string', 'max:255'],
            'ck_4_1' => ['nullable', 'string', 'max:255'],
            'ck_4_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_5' => ['nullable', 'string', 'max:255'],
            'ck_5_1' => ['nullable', 'string', 'max:255'],
            'ck_5_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_6' => ['nullable', 'string', 'max:255'],
            'ck_6_1' => ['nullable', 'string', 'max:255'],
            'ck_6_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_7' => ['nullable', 'string', 'max:255'],
            'kls' => ['required', 'string', 'max:3'],
            'ck_7_1' => ['nullable', 'string', 'max:255'],
            'ck_7_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_8' => ['nullable', 'string', 'max:255'],
            'kls_2' => ['required', 'string', 'max:3'],
            'ck_8_1' => ['nullable', 'string', 'max:255'],
            'ck_8_2' => ['nullable', 'string', 'max:255'],
        ]);

        ModelKompetensi::create($validatedData);
        return redirect()->route('nilai.index')
        ->with('success', 'Berhasil Menambahkan Kompetensi Siswa');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kompetensi = ModelKompetensi::find($id);
        $siswa = Students::find($kompetensi->id_siswa);
        return view('kompetensi.kompetensi_edit_view')
        ->with(compact('siswa'))
        ->with(compact('kompetensi'))
        ;
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
            // 
            'mapel_1' => ['nullable', 'string', 'max:255'],
            'ck_1_1' => ['nullable', 'string', 'max:255'],
            'ck_1_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_2' => ['nullable', 'string', 'max:255'],
            'ck_2_1' => ['nullable', 'string', 'max:255'],
            'ck_2_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_3' => ['nullable', 'string', 'max:255'],
            'ck_3_1' => ['nullable', 'string', 'max:255'],
            'ck_3_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_4' => ['nullable', 'string', 'max:255'],
            'ck_4_1' => ['nullable', 'string', 'max:255'],
            'ck_4_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_5' => ['nullable', 'string', 'max:255'],
            'ck_5_1' => ['nullable', 'string', 'max:255'],
            'ck_5_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_6' => ['nullable', 'string', 'max:255'],
            'ck_6_1' => ['nullable', 'string', 'max:255'],
            'ck_6_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_7' => ['nullable', 'string', 'max:255'],
            'kls' => ['required', 'string', 'max:3'],
            'ck_7_1' => ['nullable', 'string', 'max:255'],
            'ck_7_2' => ['nullable', 'string', 'max:255'],
            // 
            'mapel_8' => ['nullable', 'string', 'max:255'],
            'kls_2' => ['required', 'string', 'max:3'],
            'ck_8_1' => ['nullable', 'string', 'max:255'],
            'ck_8_2' => ['nullable', 'string', 'max:255'],
        ]);

        ModelKompetensi::where('id', $id)->update($validatedData);
        return redirect()->route('nilai.index')
        ->with('success', 'Berhasil Mengedit Kompetensi Siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

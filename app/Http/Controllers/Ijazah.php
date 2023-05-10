<?php

namespace App\Http\Controllers;

use App\Models\ModelIjazah;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Ijazah extends Controller
{
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

        return view('ijazah.ijazah_view')
            ->with(compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = $_COOKIE['id_ijazah'];
        $siswa = Students::find($id);
        return view('ijazah.ijazah_create_view')
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
            'ijazah' => ['nullable','mimes:pdf','max:2048'],
            'skl' => ['nullable','mimes:pdf','max:2048'],
            'skhun' => ['nullable','mimes:pdf','max:2048'],
        ]);

        if ($request->file('ijazah')) {
            $file = $request->file('ijazah');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('ijazah')->storeAs('public/pdf/ijazah', $fileName);
            $validatedData['ijazah'] = $fileName;
        }
        if ($request->file('skl')) {
            $file = $request->file('skl');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('skl')->storeAs('public/pdf/skl', $fileName);
            $validatedData['skl'] = $fileName;
        }
        if ($request->file('skhun')) {
            $file = $request->file('skhun');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('skhun')->storeAs('public/pdf/skhun', $fileName);
            $validatedData['skhun'] = $fileName;
        }

        ModelIjazah::create($validatedData);
        return redirect()->route('ijazah.index')
            ->with('success', 'Berhasil Menambahkan Data Siswa');
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
        $ijazah = ModelIjazah::find($id);
        $siswa = Students::find($ijazah->id_siswa);

        return view('ijazah.ijazah_edit_view')
        ->with(compact('ijazah'))
        ->with(compact('siswa'))
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
        
  
        $ijazah = ModelIjazah::find($id);

        $validatedData = $request->validate([
            'id_siswa' => ['required', 'max:20'],
            'ijazah' => ['nullable','mimes:pdf','max:2048'],
            'skl' => ['nullable','mimes:pdf','max:2048'],
            'skhun' => ['nullable','mimes:pdf','max:2048'],
        ]);

        if ($request->file('ijazah')) {
            Storage::delete('public/pdf/ijazah/' . $ijazah->ijazah);
            $file = $request->file('ijazah');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('ijazah')->storeAs('public/pdf/ijazah', $fileName);
            $validatedData['ijazah'] = $fileName;
        }
       
        if ($request->file('skhun')) {
            Storage::delete('public/pdf/skhun/' . $ijazah->skhun);
            $file = $request->file('skhun');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('skhun')->storeAs('public/pdf/skhun', $fileName);
            $validatedData['skhun'] = $fileName;
        }
        if ($request->file('skl')) {
            Storage::delete('public/pdf/skl/' . $ijazah->skl);
            $file = $request->file('skl');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $request->file('skl')->storeAs('public/pdf/skl', $fileName);
            $validatedData['skl'] = $fileName;
        }

        ModelIjazah::where('id', $id)->update($validatedData);
        return redirect()->route('ijazah.index')
            ->with('success', 'Berhasil Mengedit Data Siswa');
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

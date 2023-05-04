<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
       $siswa = DB::table('students')->count();
       $kelas = DB::table('class')->groupBy('kelas')->get();
       $nilai = DB::table('ketidakhadiran')->count();
       $file = DB::table('ijazah')->count();
        return view('home')
        ->with(compact('siswa'))
        ->with(compact('kelas'))
        ->with(compact('nilai'))
        ->with(compact('file'))
        ;
        
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function get() {
        $data = DB::table('anggota')->where('delete_agt', 0)->get();
        return view('anggota.anggota',['data' => $data]);
    }
    public function add(Request $request) {
        DB::select('CALL InsertAnggota("' . $request->nama . '", "' . $request->notelp . '")');
        return redirect('/anggota');
    }
    public function delete(Request $request) {
        DB::select('CALL DeleteAnggota("' . $request->idDelete . '")');
        return redirect('/anggota');
    }
    public function edit(Request $request) {
        DB::select('CALL EditAnggota("' . $request->idagt . '", "' . $request->nama . '", "' . $request->notelp . '")');
        return redirect('/anggota');
    }
}

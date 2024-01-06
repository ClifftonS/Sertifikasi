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
        $data = DB::table('anggota')->where('nama', $request->nama)->get();
        if(count($data) == 0){
            DB::select('CALL InsertAnggota("' . $request->nama . '", "' . $request->notelp . '")');
            return redirect('/anggota')->with('message', 'Data Sudah Terubah!');
        } else{
            return redirect('/anggota')->with('message', 'Data Sudah Ada!');
        }
    }
    public function delete(Request $request) {
        DB::select('CALL DeleteAnggota("' . $request->idDelete . '")');
        return redirect('/anggota')->with('message', 'Data Sudah Terubah!');
    }
    public function edit(Request $request) {
        DB::select('CALL EditAnggota("' . $request->idagt . '", "' . $request->nama . '", "' . $request->notelp . '")');
        return redirect('/anggota')->with('message', 'Data Sudah Terubah!');
    }
    public function ajax(Request $request) {
        $name = $request->name;
        $results =  DB::table('anggota')->where('delete_agt', 0)->where(function($query) use ($name) {
            $query->where('id_agt', 'LIKE', '%' . $name . '%')
                  ->orWhere('nama', 'LIKE', '%' . $name . '%')
                  ->orWhere('no_telp', 'LIKE', '%' . $name . '%');
        })->get();
        $c = count($results);
        if($c == 0){
            return "<p>data tidak ada</p>";
        }else{
            return view('anggota.ajaxanggota')->with([
                'datasend' => $results
            ]);
        }
    }
}

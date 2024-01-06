<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function get() {
        //menarik data anggota
        $data = DB::table('anggota')->where('delete_agt', 0)->get();
        //mereturn view anggota dan mnegirim data
        return view('anggota.anggota',['data' => $data]);
    }
    public function add(Request $request) {
        //menarik data anggota
        $data = DB::table('anggota')->where('nama', $request->nama)->get();
        if(count($data) == 0){
            //menjalankan procedure insert anggota
            DB::select('CALL InsertAnggota("' . $request->nama . '", "' . $request->notelp . '")');
            // mengarahkan routing ke tampilan awal dengan message
            return redirect('/anggota')->with('message', 'Data Sudah Terubah!');
        } else{
            return redirect('/anggota')->with('message', 'Data Sudah Ada!');
        }
    }
    public function delete(Request $request) {
        //menjalankan procedure delete anggota
        DB::select('CALL DeleteAnggota("' . $request->idDelete . '")');
        // mengarahkan routing ke tampilan awal dengan message
        return redirect('/anggota')->with('message', 'Data Sudah Terubah!');
    }
    public function edit(Request $request) {
        //menjalankan procedure edit anggota
        DB::select('CALL EditAnggota("' . $request->idagt . '", "' . $request->nama . '", "' . $request->notelp . '")');
         // mengarahkan routing ke tampilan awal dengan message
        return redirect('/anggota')->with('message', 'Data Sudah Terubah!');
    }
    public function ajax(Request $request) {
        $name = $request->name;
        // menarik data yang sesuai dengan value search
        $results =  DB::table('anggota')->where('delete_agt', 0)->where(function($query) use ($name) {
            $query->where('id_agt', 'LIKE', '%' . $name . '%')
                  ->orWhere('nama', 'LIKE', '%' . $name . '%')
                  ->orWhere('no_telp', 'LIKE', '%' . $name . '%');
        })->get();
        $c = count($results);
        if($c == 0){
            return "<p>data tidak ada</p>";
        }else{
            // mengembalikan view dan mengirim data
            return view('anggota.ajaxanggota')->with([
                'datasend' => $results
            ]);
        }
    }
}

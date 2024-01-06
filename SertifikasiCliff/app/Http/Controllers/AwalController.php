<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AwalController extends Controller
{
    public function get() {
        $data = DB::table('buku')->where('delete_buku', 0)->where('jumlah_tersedia', '>', 0)->get();
        return view('katalog',['data' => $data]);
    }
    public function ajax(Request $request) {
        $name = $request->name;
        $results =  DB::table('buku')->where('delete_buku', 0)->where('jumlah_tersedia', '>', 0)->where(function($query) use ($name) {
            $query->where('judul', 'LIKE', '%' . $name . '%')
                  ->orWhere('id_buku', 'LIKE', '%' . $name . '%')
                  ->orWhere('penulis', 'LIKE', '%' . $name . '%')
                  ->orWhere('tahun_terbit', 'LIKE', '%' . $name . '%');
        })->get();
        $c = count($results);
        if($c == 0){
            return "<p>data tidak ada</p>";
        }else{
            return view('ajaxkatalog')->with([
                'datasend' => $results
            ]);
        }
    }
}

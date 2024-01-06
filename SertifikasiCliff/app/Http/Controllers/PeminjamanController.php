<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function get() {
        $dateToday = Carbon::today()->toDateString();
        $data = DB::table('peminjaman')->join('anggota', 'anggota.id_agt','=', 'peminjaman.id_agt')->join('buku', 'buku.id_buku','=', 'peminjaman.id_buku')->where('delete_pmnj', 0)->orderBy('status_pmnj', 'asc')->orderBy('tgl_pmnj', 'desc')->get();
        $data4 = DB::table('peminjaman')->join('anggota', 'anggota.id_agt','=', 'peminjaman.id_agt')->join('buku', 'buku.id_buku','=', 'peminjaman.id_buku')->where('delete_pmnj', 0)->where('status_pmnj', 0)->whereDate('tgl_kembali', '<', $dateToday)->orderBy('tgl_pmnj', 'desc')->get();
        $data2 = DB::table('anggota')->where('delete_agt', 0)->get();
        $data3 = DB::table('buku')->where('delete_buku', 0)->get();
        return view('peminjaman.peminjaman',['data' => $data, 'anggota' => $data2, 'buku' => $data3, 'datalewat' => $data4]);
    }
    public function add(Request $request) {
        $tglkmbl = date('Y-m-d', strtotime($request->tglpmnj . ' +7 days'));
        DB::select('CALL InsertPeminjaman("' . $request->buku . '", "' . $request->anggota . '", "' . $request->tglpmnj . '", "'.$tglkmbl.'")');
        $buku = DB::table('buku')->where('id_buku', $request->buku)->first();
        $jumlahTersediaBaru = $buku->jumlah_tersedia - 1;
        DB::table('buku')->where('id_buku',$request->buku)->update([
            'jumlah_tersedia' => $jumlahTersediaBaru
        ]);
        return redirect('/peminjaman')->with('message', 'Data Sudah Terubah!');
    }
    public function delete(Request $request) {
        DB::select('CALL DeletePeminjaman("' . $request->idDelete . '")');
        return redirect('/peminjaman')->with('message', 'Data Sudah Terubah!');
    }
    public function edit(Request $request) {
        DB::select('CALL EditPeminjaman("' . $request->idpmnj . '")');
        $buku = DB::table('buku')->where('id_buku', $request->buku)->first();
        $jumlahTersediaBaru = $buku->jumlah_tersedia + 1;
        DB::table('buku')->where('id_buku',$request->buku)->update([
            'jumlah_tersedia' => $jumlahTersediaBaru
        ]);
        return redirect('/peminjaman')->with('message', 'Data Sudah Terubah!');
    }
    public function ajax(Request $request) {
        $name = $request->name;
        $results =  DB::table('peminjaman')->join('anggota', 'anggota.id_agt','=', 'peminjaman.id_agt')->join('buku', 'buku.id_buku','=', 'peminjaman.id_buku')->where('delete_pmnj', 0)->where(function($query) use ($name) {
            $query->where('judul', 'LIKE', '%' . $name . '%')
                  ->orWhere('nama', 'LIKE', '%' . $name . '%')
                  ->orWhere('tgl_pmnj', 'LIKE', '%' . $name . '%')
                  ->orWhere('tgl_kembali', 'LIKE', '%' . $name . '%')
                  ->orWhere('id_pmnj', 'LIKE', '%' . $name . '%');
        })->orderBy('status_pmnj', 'asc')->orderBy('tgl_pmnj', 'desc')->get();
        $c = count($results);
        if($c == 0){
            return "<p>data tidak ada</p>";
        }else{
            return view('peminjaman.ajaxpeminjaman')->with([
                'datasend' => $results
            ]);
        }
    }
}

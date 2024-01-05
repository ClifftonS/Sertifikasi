<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function get() {
        $data = DB::table('peminjaman')->join('anggota', 'anggota.id_agt','=', 'peminjaman.id_agt')->join('buku', 'buku.id_buku','=', 'peminjaman.id_buku')->where('delete_pmnj', 0)->orderBy('status_pmnj', 'asc')->orderBy('tgl_pmnj', 'desc')->get();
        $data2 = DB::table('anggota')->where('delete_agt', 0)->get();
        $data3 = DB::table('buku')->where('delete_buku', 0)->get();
        return view('peminjaman.peminjaman',['data' => $data, 'anggota' => $data2, 'buku' => $data3]);
    }
    public function add(Request $request) {
        $tglkmbl = date('Y-m-d', strtotime($request->tglpmnj . ' +7 days'));
        DB::select('CALL InsertPeminjaman("' . $request->buku . '", "' . $request->anggota . '", "' . $request->tglpmnj . '", "'.$tglkmbl.'")');
        return redirect('/peminjaman');
    }
    public function delete(Request $request) {
        DB::select('CALL DeletePeminjaman("' . $request->idDelete . '")');
        return redirect('/peminjaman');
    }
    public function edit(Request $request) {
        $tglkmbl = date('Y-m-d', strtotime($request->tglpmnj . ' +7 days'));
        DB::select('CALL EditPeminjaman("' . $request->idpmnj . '", "' . $request->buku . '", "' . $request->anggota . '", "' . $request->tglpmnj . '", "' . $tglkmbl . '", "' . $request->status . '")');
        return redirect('/peminjaman');
    }
}

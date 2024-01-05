<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    public function get() {
        $data = DB::table('buku')->where('delete_buku', 0)->get();
        return view('buku.buku',['data' => $data]);
    }
    public function add(Request $request) {
        $file=$request->image;
        if ($file != null){
            $filename = time() .'.'.$file->getClientOriginalName();
            $request->image->move('assets/', $filename);
        }
        else{
            $filename = null;
        }
        DB::select('CALL InsertBuku("' . $request->judul . '", "' . $request->penulis . '", "' . $request->terbit . '", "'.$request->jumlah.'", "' . $filename . '")');
        return redirect('/buku');
    }
    public function delete(Request $request) {
        DB::select('CALL DeleteBuku("' . $request->idDelete . '")');
        return redirect('/buku');
    }
    public function edit(Request $request) {
        $file=$request->image;
        if ($file != null){
            $filename = time() .'.'.$file->getClientOriginalName();
            $request->image->move('assets/', $filename);
            File::delete('assets/'.$request->oldimage);
        }
        else{
            $filename = $request->oldimage;
        }
        DB::select('CALL EditBuku("' . $request->idbuku . '", "' . $request->judul . '", "' . $request->penulis . '", "' . $request->terbit . '", "' . $request->jumlah . '", "' . $filename . '")');
        return redirect('/buku');
    }
}

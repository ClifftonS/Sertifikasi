<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BukuController extends Controller
{
    public function get() {
        // menarik data buku
        $data = DB::table('buku')->where('delete_buku', 0)->get();
        // menampilkan view buku dengan membawa data
        return view('buku.buku',['data' => $data]);
    }
    public function add(Request $request) {
        // menarik data buku
        $data = DB::table('buku')->where('judul', $request->judul)->get();
        // memindah dan mengatur data untuk dimasukan ke public
        if(count($data) == 0){
            $file=$request->image;
            if ($file != null){
                $filename = time() .'.'.$file->getClientOriginalName();
                $request->image->move('assets/', $filename);
            }
            else{
                $filename = null;
            }
            // insert data buku menggunakan procedure
            DB::select('CALL InsertBuku("' . $request->judul . '", "' . $request->penulis . '", "' . $request->terbit . '", "'.$request->jumlah.'", "' . $filename . '")');
            // mengarahkan routing ke tampilan awal dengan message
            return redirect('/buku')->with('message', 'Data Sudah Terubah!');
        }else{
            // mengarahkan routing ke tampilan awal dengan message
            return redirect('/buku')->with('message', 'Data Sudah Ada!');
        }

    }
    public function delete(Request $request) {
        // menjalankan procedure untuk delete buku
        DB::select('CALL DeleteBuku("' . $request->idDelete . '")');
        // mengarahkan routing ke tampilan awal dengan message
        return redirect('/buku')->with('message', 'Data Sudah Terubah!');
    }
    public function edit(Request $request) {
        // memindah dan mengatur data untuk dimasukan ke public
        $file=$request->image;
        if ($file != null){
            $filename = time() .'.'.$file->getClientOriginalName();
            $request->image->move('assets/', $filename);
            File::delete('assets/'.$request->oldimage);
        }
        else{
            // jika tidak menginput image maka akan menggunakan image lama
            $filename = $request->oldimage;
        }
        // menjalankan procedure edit
        DB::select('CALL EditBuku("' . $request->idbuku . '", "' . $request->judul . '", "' . $request->penulis . '", "' . $request->terbit . '", "' . $request->jumlah . '", "' . $filename . '")');
        // mengarahkan routing ke tampilan awal dengan message
        return redirect('/buku')->with('message', 'Data Sudah Terubah!');
    }
    public function ajax(Request $request) {
        $name = $request->name;
        // menarik data yang sesuai dengan value search
        $results =  DB::table('buku')->where('delete_buku', 0)->where(function($query) use ($name) {
            $query->where('judul', 'LIKE', '%' . $name . '%')
                  ->orWhere('id_buku', 'LIKE', '%' . $name . '%')
                  ->orWhere('penulis', 'LIKE', '%' . $name . '%')
                  ->orWhere('tahun_terbit', 'LIKE', '%' . $name . '%');
        })->get();
        $c = count($results);
        if($c == 0){
            return "<p>data tidak ada</p>";
        }else{
            // mengembalikan view dan mengirim data
            return view('buku.ajaxbuku')->with([
                'datasend' => $results
            ]);
        }
    }
}

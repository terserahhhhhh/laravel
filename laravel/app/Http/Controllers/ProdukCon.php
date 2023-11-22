<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukCon extends Controller
{
    public function home()
    {
        $produk = DB::table('produk')->get();
        return view('utama',['produk' => $produk]);
    }
    public function index()
    {
        $produk = DB::table('produk')->get();
        return view('produk',['produk' => $produk]);
    }
    public function input()
    {
        return view ('tammbahproduk');
    }
    public function storeinput(Request $request)
    {
        $file = $request->file('foto');
        $filename = $request->kode . "." . $file->getClientOriginalExtension();
        $file->move(public_path('assets/img'), $filename);
        DB::table('produk')->insert([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' => $filename
        ]);

        Session::flash('message', 'Input Berhasil.');
        return redirect('/produk/tampil');
    }

    public function update($id)
    {
       $produk = DB::table('produk')->where('kode', $id)->get();
       return redirect('/produk/tampil');
    }

    public function storeupdate(Request $request)
    {
        DB::table('produk')->where('kode', $request->kode)->update([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'stok' => $request->stok
            
        ]);

        return redirect('/produk/tampil');
    }

    public function delete($id)
    {
        DB::table('produk')->where('kode', $id)->delete();
        return redirect('/produk/tampil');
    }
    
}

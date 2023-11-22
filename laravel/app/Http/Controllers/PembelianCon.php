<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class PembelianCon extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 'Guest') 
        {
            $pembelian = DB::table('pembelian')->get();
            return view('pembelian',['pembelian' =>$pembelian]);
        }
        else 
        {
            $pembelian = DB::table('pembelian')->where('kode_pembeli', Auth::user()->id)->get();
            return view('pembelian', ['pembelian' => $pembelian]);
        }
        
    }
    public function input()
    {
        return view ('tambahpembelian');
    }
    public function storeinput(Request $request)
    {
        DB::table('pembelian')->insert([
            'kode_pembelian' => auth()->user()->id,
            'kode_produk' => $request->kodeproduk,
            'banyak' => $request->banyak,
            'bayar' => $request->harga * $request-> banyak,
            'kode_pembeli' => auth()->user()->id,
            'status' => 'verifikasi'
        ]);
        Session::flash('massage','Input Berhasil.');
        return redirect('/pembelian/tampil');
    }
    public function update($id)
    {
        $pembelian = DB::table('pembelian')->where('kode_pembelian', $id)->get();
        return redirect('/pembelian/tampil');
    }
    public function delete($id)
    {
        DB::table('pembelian')->where('kode_pembelian',$id)->delete();
        return redirect('/pembelian/tampil');
    }
}

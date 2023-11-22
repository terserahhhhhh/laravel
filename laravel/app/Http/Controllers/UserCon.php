<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class UserCon extends Controller
{
    public function index()
    {
        $user = DB::table('users')->get();
        return view('user', ['user' => $user]);
    }

    public function input()
    {
        return view('tambahUser');
    }

    public function storeinput(Request $request)
    {
        // insert data ke table tbuser
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        // alihkan halaman ke route user
        Session::flash('message', 'Input Berhasil.');
        return redirect('/user/tampil');
    }

    public function update($id)
    {
        // mengambil data user berdasarkan id yang dipilih
        $user = DB::table('users')->where('id', $id)->get();
        // passing data user yang didapat ke view edit.blade.php
        return redirect('/user/tampil');
    }

    public function storeupdate(Request $request)
    {
        // update data user
        if (!empty($request->password)) {
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
        } else {
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        // alihkan halaman ke halaman user
        return redirect('/user/tampil');
    }

    public function delete($id)
    {
        // mengambil data user berdasarkan id yang dipilih
        DB::table('users')->where('id', $id)->delete();
        // passing data user yang didapat ke view edit.blade.php
        return redirect('/user/tampil');
    }
}

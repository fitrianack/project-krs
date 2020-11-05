<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //Halaman Dashboard
    public function home()
    {
        return view('mahasiswa.dashboard');
    }

    //lihat mhs
    public function show()
    {
        $mahasiswa = \App\Mahasiswas::all();
        return view('mahasiswa.content.show', compact('mahasiswa'));
    }

    //post
    public function tambah(Request $request)
    {
        $data_mhs = new Mahasiswa;
        $data_mhs->nim = $request->nim;
        $data_mhs->nama_mahasiswa = $request->nama_mahasiswa;
        $data_mhs->save();
        return redirect('/lihatdata')->with('status', 'Data Berhasil Ditambah!');;
    }
    // tambah get
    public function create()
    {
        return view('mahasiswa.content.create');
    }
}

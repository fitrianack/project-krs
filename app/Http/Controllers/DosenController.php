<?php

namespace App\Http\Controllers;

use App\Dosen;
use App\Matakuliah;
use Illuminate\Http\Request;

class DosenController extends Controller
{

    public function index()
    {
        $dosen = \App\Dosen::all();
        return  view('dosen.content.index', compact('dosen'));
    }

    public function create()
    {
        $dosen = \App\Dosen::all();
        $matkul = \App\Matakuliah::all();
        return view('dosen.content.create', compact('dosen', 'matkul'));
    }


    public function store(Request $request)
    {
        $kodematkularray = $request->input('checkbox-array');
        $kodematkularrayy = array();

        foreach ($kodematkularray as $kode) {
            $kodematkularrayy[] = $kode;
        }
        $dosen = new dosen;
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->kode_matkul = json_encode($kodematkularrayy);
        $dosen->save();

        if ($dosen) {
            return redirect("/index-dosen")->with('alert success', 'Mata Kuliah berhasil ditambahkan!');;
        } else {
            return redirect("/create-dosen")->with('alert danger', 'Mata Kuliah gagal ditambahkan!');;
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($kode_dosen)
    {
        $dosen = \App\Dosen::find($kode_dosen);
        $matkul = \App\Matakuliah::all();
        return view('dosen.content.edit', compact('dosen', 'matkul'));
    }


    public function update(Request $request, $kode_dosen)
    {
        $dosen = Dosen::find($request->kode_dosen);
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->kode_matkul = $request->kode_matkul;
        $dosen->save();

        return redirect("/index-dosen");
    }

    public function destroy($kode_dosen)
    {
        $destroy = Dosen::find($kode_dosen);
        $destroy->delete();
        return redirect('/index-dosen')->with('status', 'Data Dosen Berhasil Dihapus!');
    }
}

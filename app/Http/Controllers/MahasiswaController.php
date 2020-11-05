<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Validator;
use Session;
use Auth;
use App\User;
use Illuminate\Http\Request;
Use App\Mahasiswa;
use App\Krs;

class MahasiswaController extends Controller
{
    //Halaman Dashboard
    public function home()
    {
        return view('mahasiswa.content.dashboard');
    }
    //---------------------FITUR KRS--------------------
    public function krs()
    {
        $krs = KRS::all();
        return view('mahasiswa.content.pilihkrs', compact('krs'));
    }
    //Pilih KRS
    public function lihatkrs(Request $request)
    {
        $krs = new krs;
        $krs->nim = $request->nim;
        $krs->kode_matkul = $request->kode_matkul;
        $krs->save();
        return redirect('/lihatkrs')->with('status', 'KRS Berhasil Ditambah!');
    }
    
    //--------------PROFIL------------------

    //PROFIL MAHASISWA
    public function profil()
    {
        $users = \App\User::where('id', Auth::user()->id)->first();
        return view('mahasiswa.content.profil', compact('users'));
    }

    //Edit
    public function edit()
    {
        $users = \App\User::where('id', Auth::user()->id)->first();
        return view('mahasiswa.content.editprofil', compact('users'));
    }

    //update
    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $users = User::find($user_id);

        if ($request->isMethod('post')) {
            $data = $request->all();
            User::where(['id' => $user_id])->update([
                'name' => $data['name'], 'email' => $data['email'], 'password' => $data['password']
            ]);
            return redirect('/mahasiswa/profil')->with('status', 'Profil Berhasil diperbarui');
        }
        return view('mahasiswa.content.editprofil')->with(compact('users'));
    }
}

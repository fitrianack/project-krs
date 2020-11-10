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
Use App\Matakuliah;
use App\Krs;

class MahasiswaController extends Controller
{
    //Halaman Dashboard
    public function home()
    {
        $users = User::all();
        return view('mahasiswa.content.dashboard', compact('users'));
    }
    //---------------------FITUR KRS--------------------
    public function tambahkrs()
    {
        $krs = KRS::all();
        $users = Auth::user()->id;
        return view('mahasiswa.content.pilihkrs', compact('krs', 'users'));
    }
    //menampilkan form krs
    public function lihatkrs($id)
    {
        $krs = KRS::all();
        $users = \App\User::where('id', Auth::user()->id)->first();
        $matkul = Matakuliah::all();
        return view('mahasiswa.content.ambilmatkul', compact('krs', 'users', 'matkul'));
    }
    //Pilih KRS
    public function proseskrs(Request $request)
    {
        for ($i=0; $i < sizeof($request->kode_matkul); $i++) { 
            $krs = new Krs;
            $krs->nim = $request->id;
            $krs->kode_matkul = $request->kode_matkul[$i];
            $krs->save();
        }

        if ($krs) {
            return redirect('mahasiswa/lihatkrs')->with('flash_message_success', 'KRS berhasil ditambahkan');
        }else{
            return redirect('mahasiswa/lihatkrs')->with('flash_message_danger', 'KRS gagal ditambahkan');
        }
    }

    //Edit KRS get
    public function editkrs($id)
    {
        $krs = Krs::find($id);
        $users = \App\User::get();
        $mk = Matakuliah::get();
        return view('mahasiswa.content.editkrs', compact('krs', 'users', 'mk'));
    }

    //edit KRS post
    public function editp(Request $request)
    {
        $krs = Krs::find($request->id);
        $krs->kode_matkul = $request->kode_matkul;
        $krs->save();
        return redirect('mahasiswa/lihatkrs');
    }

    //hapus krs
    public function hapuskrs($id)
    {
        Krs::where('id', $id)->delete();
        return redirect('mahasiswa/lihatkrs');
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

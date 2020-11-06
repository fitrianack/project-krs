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
        return view('mahasiswa.content.dashboard');
    }
    //---------------------FITUR KRS--------------------
    public function tambahkrs()
    {
        $krs = KRS::all();
        return view('mahasiswa.content.pilihkrs', compact('krs'));
    }
    //menampilkan form krs
    public function lihatkrs($id)
    {
        $krs = KRS::all();
        $users = User::where('id',$id)->get();
        $matkul = Matakuliah::all();
        return view('mahasiswa.content.ambilmatkul', compact('krs', 'users', 'matkul'));
    }
    //Pilih KRS
    public function proseskrs()
    {
        $kode_matkul = Matakuliah::all();
        $id_user = Auth::user()->id;
        $mhs = User::where('id', $id_user)->first();

        if ($request->isMethod('post')) {
            $data = $request->all();

            $mh = new Krs;
            $mh->id .= $data['id'];
            $mh->nim = $mhs['nim'];
            $mh->kode_matkul = $data['kode_matkul'];
            $mh->save();
        }

        return redirect('lihatkrs')->with('flash_message_success', 'KRS berhasil ditambahkan');
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

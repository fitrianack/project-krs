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
use App\Matakuliah;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    //menampilkan dashaboard dosen
    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $data = User::get();
        $users = User::where('id', $user_id)->first();
        return  view('dosen.content.dashboard', compact('data'));
    }

    //menampilkan profil dosen
    public function index()
    {
        $users = \App\User::where('id', Auth::user()->id)->first();
        return  view('dosen.content.index', compact('dosen', 'users'));
    }

    //mengarahkan ke form pilih mata kuliah
    public function create()
    {
        $matkul = \App\Matakuliah::all();
        $users = \App\User::where('id', Auth::user()->id)->first();
        return view('dosen.content.create', compact('matkul', 'users'));
    }

    //mengarahkan ke tampilan form edit mata kuliah
    public function edit($kode_dosen)
    {
        $matkul = \App\Matakuliah::all();
        return view('dosen.content.editmatkul', compact('dosen', 'matkul'));
    }


    //mengarahkan ke form edit profil dosen
    public function editdata()
    {
        $users = User::get();
        $users = \App\User::where('id', Auth::user()->id)->first();
        return view('dosen.content.edit', compact('users'));
    }

    //proses edit atau update profil DOSEN
    public function updatedata(Request $request)
    {

        $user_id = Auth::user()->id;
        $users = User::find($user_id);

        if ($request->isMethod('post')) {
            $data = $request->all();
            User::where(['id' => $user_id])->update([
                'name' => $data['name'], 'email' => $data['email'], 'password' => $data['password']
            ]);
            return redirect('/index-dosen')->with('status', 'Profil Berhasil diperbarui');
        }
        return view('dosen.content.edit')->with(compact('users'));
    }

    //memilih  mata kuliah untuk dosen
    public function pilihmatkul(Request $request)
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->first();


        if ($request->isMethod('post')) {
            $data = $request->all();

            User::where(['id' => $user_id])->update([
                'kode_matkul' => $data['kode_matkul']
            ]);
            return redirect('/dashboard-dosen')->with('status', 'Profil Berhasil diperbarui');
        }
        return view('dosen.content.dashboard')->with(compact('users'));
    }

    //mengarahkan ke form edit pilihan matkul
    public function editmatkul()
    {
        $users = User::get();
        $users = \App\User::where('id', Auth::user()->id)->first();
        $matkul = \App\Matakuliah::all();
        return view('dosen.content.editpilihan', compact('users', 'matkul'));
    }


    //mengedit mata kuliah untuk dosen
    public function editpilihan(Request $request)
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->first();

        if ($request->isMethod('post')) {
            $data = $request->all();

            User::where(['id' => $user_id])->update([
                'kode_matkul' => $data['kode_matkul'],  'kapasitas' => $data['kapasitas']
            ]);
            return redirect('/dashboard-dosen')->with('status', 'Profil Berhasil diperbarui');
        }
        return view('dosen.content.dashboard')->with(compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Validator;
use Session;
use Auth;
use App\Dosen;
use App\User;
use App\Matakuliah;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    //menampilkan dashboard dosen
    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $data = User::get();
        $users = User::where('id', $user_id)->first();
        $dosenn = Dosen::all();
        return  view('dosen.content.dashboard', compact('data', 'dosenn'));
    }

    //menampilkan profil dosen
    public function index()
    {
        $users = \App\User::where('id', Auth::user()->id)->first();
        return  view('dosen.content.index', compact('dosen', 'users'));
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
        for ($i = 0; $i < sizeof($request->kode_matkul); $i++) {
            $dosen = new Dosen;
            $dosen->nidn = $request->id;
            $dosen->kode_matkul = $request->kode_matkul[$i];
            $dosen->save();
        }

        if ($dosen) {
            return redirect('dashboard-dosen')->with('flash_message_success', 'Mata Kuliah berhasil ditambahkan');
        } else {
            return redirect('dashboard-dosen')->with('flash_message_danger', 'Mata Kuliah gagal ditambahkan');
        }
    }

    //mengarahkan ke form pilih mata kuliah
    public function create($id)
    {
        $matkul = \App\Matakuliah::all();
        $users = \App\User::where('id', Auth::user()->id)->first();
        $dosen = \App\Dosen::all();
        return view('dosen.content.create', compact('matkul', 'users', 'dosen'));
    }


    //mengarahkan ke form edit pilihan matkul
    public function editmatkul($id)
    {
        $matkul = \App\Matakuliah::all();
        $dosen = \App\Dosen::find($id);
        return view('dosen.content.editpilihan', compact('matkul', 'dosen'));
    }


    //mengedit mata kuliah untuk dosen
    public function editpilihan(Request $request, $id)
    {
        $dosen = Dosen::find($request->id);
        $dosen->kode_matkul = $request->kode_matkul;
        $dosen->kapasitas = $request->kapasitas;
        $dosen->save();

        return redirect('/dashboard-dosen')->with('status', 'Profil Berhasil diperbarui');
    }

    public function destroy($id)
    {
        $destroy = Dosen::find($id);
        $destroy->delete();
        return redirect('/dashboard-dosen')->with('status', 'Data Keuangan Berhasil Dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Matakuliah;

class AdminController extends Controller
{
    //Halaman Dashboard
    public function home(){
        return view('admin.dashboard');
    }

    //------------------------------Fitur Role-----------------------------------------
    public function tampilrole(){
        $user = User::all();
        return view('admin.role.index', compact('user'));
    }
    public function create_role(){
        return view('admin.role.create');
    }
    public function store_role(Request $req){

            if ($req->isMethod('post')){
                $this->validate($req, [
                    'name' => 'required|string|min:4',
                    'email' => 'required|unique:users',
                    'password' => 'required|string|min:5',
                ]);
        
                User::create([
                    'name' => $req->name,
                    'email' => $req->email,
                    'password' => bcrypt($req->password),
                    'role' => $req->role,
                ]);
                return redirect('/role')->with('alert-success', 'User berhasil ditambahkan!');
            }
    }
    public function edit_role($id){
        $user = User::find($id);
        return view('admin.role.edit', compact('user'));
    }
    public function update_role(Request $request){
        if ($request->isMethod('post')) {
            $user = User::find($request->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role = $request->role;
    
            $user->save();
    
            if ($user) {
                return redirect("/role");
            } else {
                return dd($user);
            }
        }
    }
    public function delete_role($id){
        $user = User::find($id);
        $user->delete();

        return redirect('/role');
    }

    //---------------------------------------------FITUR MATA KULIAH----------------------------
    public function tampilmatkul(){
        $matkul = Matakuliah::all();
        return view('admin.matkul.index', compact('matkul'));
    }
    public function create_matkul(){
        return view('admin.matkul.create');
    }
    public function store_matkul(Request $req){

        if ($req->isMethod('post')){
            $this->validate($req, [
                'nama_matkul' => 'required',
                'sks' => 'required',
            ]);
    
            Matakuliah::create([
                'nama_matkul' => $req->nama_matkul,
                'sks' => $req->sks,
            ]);
            return redirect('/matkul')->with('alert-success', 'Mata Kuliah berhasil ditambahkan!');
        }
    }
    public function edit_matkul($kode_matkul){
        $matkul = Matakuliah::find($kode_matkul);
        return view('admin.matkul.edit', compact('matkul'));
    }
    public function update_matkul(Request $request){
        if ($request->isMethod('post')) {
            $matkul = Matakuliah::find($request->kode_matkul);
            $matkul->nama_matkul = $request->nama_matkul;
            $matkul->sks = $request->sks;
            $matkul->save();
    
            if ($matkul) {
                return redirect('/matkul');
            } else {
                return dd($matkul);
            }
        }
    }
    public function delete_matkul($kode_matkul){
        $kode_matkul = Matakuliah::find($kode_matkul);
        $kode_matkul->delete();
        return redirect('/matkul');
    }
}

<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $data['title'] = "Data Pegawai";
        $user = User::with('jabatan')->get();
        $data['result'] = $user->sortDesc();
        return view("main.user.index", $data);
    }
    public function tambah()
    {

        $data['jabatan'] = Jabatan::all();
        $data['title'] = "Tambah Data Pegawai";
        return view("main.user.tambah", $data);
    }
    public function simpan(Request $request)
    {
        $objek = User::create([
            'kode_pegawai' => $request->kode_pegawai,
            'jab_id' => $request->jab_id,
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);
        return redirect('main/user')->with('success', 'Data berhasil disimpan!');
    }
    public function edit($id)
    {
        $data['title'] = "Edit Data Pegawai";
        $data['result'] = User::findOrFail($id);
        return view("main.user.edit", $data);
    }
    public function aksi_ubah(Request $request, $id)
    {
        $post = User::find($id);
        $post->name = $request->name;
        $post->kode_pegawai = $request->kode_pegawai;
        $post->email = $request->email;
        $post->password = bcrypt($request->password);
        $post->save();

        return redirect('main/user')->with('success', 'Data berhasil diubah!');
    }
    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
    public function lihat($id)
    {
        $data['title'] = "Lihat Data Pegawai";
        $data['result'] = User::findOrFail($id);
        return view("main.user.lihat", $data);
    }
}

<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Kelompok;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = "Data Pegawai";
        $user = User::with('jabatan', 'kelompok')->get();
        $data['result'] = $user->sortDesc();
        return view("main.user.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['jabatan'] = Jabatan::all();
        $data['kelompok'] = Kelompok::all();
        $data['kodePegawai'] = $this->generateUniqueCode('001', 8);
        $data['title'] = "Tambah Data Pegawai";
        return view("main.user.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'jab_id' => $request->jab_id,
            'kelompok_id' => $request->kelompok_id,
            'name' => $request->name,
            'kode_pegawai' => $request->kode_pegawai,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
        ]);
        return redirect('main/user')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['title'] = "Lihat Data Pegawai";
        $data['result'] = User::with('jabatan', 'kelompok')->findOrFail($id);
        return view("main.user.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = "Edit Data Pegawai";
        $data['jabatan'] = Jabatan::all();
        $data['kelompok'] = Kelompok::all();
        $data['result'] = User::with('jabatan', 'kelompok')->findOrFail($id);
        return view("main.user.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = User::find($id);
        $post->name = $request->input('name');
        $post->jab_id = $request->input('jab_id');
        $post->kelompok_id = $request->input('kelompok_id');
        $post->kode_pegawai = $request->input('kode_pegawai');
        $post->no_hp = $request->input('no_hp');
        $post->email = $request->input('email');
        $post->gender = $request->input('gender');
        $post->password = bcrypt($request->password);

        $post->save();

        return redirect('main/user')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }

    function generateUniqueCode($prefix = '', $length = 8)
    {
        // Menetapkan prefix ke kode (jika ada)
        $code = $prefix;

        // Menetapkan panjang sisa kode yang harus di-generate
        $remainingLength = $length - strlen($prefix);

        // Menghasilkan karakter random dengan panjang sisa kode
        $randomPart = Str::random($remainingLength);

        // Menggabungkan prefix dan karakter random untuk mendapatkan kode lengkap
        $code .= $randomPart;

        return $code;
    }
}

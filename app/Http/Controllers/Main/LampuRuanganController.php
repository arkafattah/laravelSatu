<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\LampuRuangan;
use App\Models\User;
use Illuminate\Http\Request;

class LampuRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Penggantian Lampu';
        $lampu = LampuRuangan::with('users')->get();
        $data['result'] = $lampu->sortDesc();
        return view('main.lampu_ruangan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['user'] = User::all();
        $data['title'] = "Tambah Data Penggantian Lampu";
        return view("main.lampu_ruangan.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validasi = $this->validate(
            $request,
            [
                'user_id' => 'required',
                'keterangan' => 'required',
                'waktu' => 'required',
                'jumlah_lampu' => 'required',
                'status' => 'required',

            ],
            [
                'user_id.required' => 'user_id tidak boleh kosong',
                'keterangan.required' => 'keterangan tidak boleh kosong',
                'waktu.required' => 'waktu tidak boleh kosong',
                'jumlah_lampu.required' => 'jumlah lampu tidak boleh kosong',
                'status.required' => 'status tidak boleh kosong',
            ]
        );
        LampuRuangan::create([
            'user_id' => $request->user_id,
            'keterangan' => $request->keterangan,
            'waktu' => $request->waktu,
            'jumlah_lampu' => $request->jumlah_lampu,
            'status' => $request->status,
        ]);

        return redirect('main/lampu_ruangan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = LampuRuangan::findOrFail($id);
        $user = User::findOrFail($row->user_id);
        return view('main.lampu_ruangan.show', [
            'title' => 'Detail Data Penggantian Lampu',
            'user_id' => $user->name,
            'keterangan' => $row->keterangan,
            'waktu' => $row->waktu,
            'jumlah_lampu' => $row->jumlah_lampu,
            'status' => $row->status,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $row = LampuRuangan::findOrFail($id);
        $user = User::all();
        return view('main.lampu_ruangan.edit', [
            'title' => 'Edit Data Penggantian Lampu',
            'user_id' => $row->user_id,
            'user' => $user,
            'id' => $row->id,
            'keterangan' => $row->keterangan,
            'waktu' => $row->waktu,
            'jumlah_lampu' => $row->jumlah_lampu,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = LampuRuangan::find($id);
        if ($row) {
            $row->user_id = $request->user_id;
            $row->keterangan = $request->keterangan;
            $row->waktu = $request->waktu;
            $row->jumlah_lampu = $request->jumlah_lampu;
            $row->status = $request->status;
            $row->save();

            return redirect('main/lampu_ruangan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = LampuRuangan::findOrFail($id);
        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

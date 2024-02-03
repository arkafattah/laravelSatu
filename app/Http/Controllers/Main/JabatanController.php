<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Hak Akses';
        $jabatan = Jabatan::all();
        $data['result'] = $jabatan->sortDesc();
        return view('main.jabatan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Akses";
        return view("main.jabatan.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'nama' => 'required',
            ],
            [
                'nama.required' => 'hak akses tidak boleh kosong',
            ]
        );

        Jabatan::create([
            'nama' => $request->nama,
        ]);

        return redirect('main/jabatan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Jabatan::findOrFail($id);
        return view('main.jabatan.show', [
            'title' => 'Detail Data Hak Akses',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Jabatan::findOrFail($id);

        return view('main.jabatan.edit', [
            'title' => 'Edit Data Hak Akses',
            'id' => $row->id,
            'nama' => $row->nama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = Jabatan::find($id);
        if ($row) {
            $row->nama = $request->nama;
            // Simpan perubahan
            $row->save();

            return redirect('main/jabatan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

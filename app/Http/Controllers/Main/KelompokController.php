<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kelompok;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Tim Kerja';
        $kelompok = Kelompok::all();
        $data['result'] = $kelompok->sortDesc();
        return view('main.kelompok.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Tim Kerja";
        return view("main.kelompok.create", $data);
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
                'nama.required' => 'Tim Kerja tidak boleh kosong',
            ]
        );

        Kelompok::create([
            'nama' => $request->nama,
        ]);

        return redirect('main/kelompok')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Kelompok::findOrFail($id);
        return view('main.kelompok.show', [
            'title' => 'Detail Data Tim Kerja',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Kelompok::findOrFail($id);

        return view('main.kelompok.edit', [
            'title' => 'Edit Data Tim Kerja',
            'id' => $row->id,
            'nama' => $row->nama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Kelompok::find($id);
        if ($row) {
            $row->nama = $request->nama;
            $row->save();

            return redirect('main/kelompok')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kelompok::findOrFail($id);
        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Ruang';
        $user = Ruang::all();
        $data['result'] = $user->sortDesc();
        return view('main.ruang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Tambah Data Ruang";
        return view("main.ruang.create", $data);
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
                'nama.required' => 'Nama ruang tidak boleh kosong',
            ]
        );

        $produk = Ruang::create([
            'nama' => $request->nama,
        ]);

        return redirect('main/ruang')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Ruang::findOrFail($id);
        return view('main.ruang.show', [
            'title' => 'Detail Data Ruang',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $row = Ruang::findOrFail($id);

        return view('main.ruang.edit', [
            'title' => 'Edit Data Ruang',
            'id' => $row->id,
            'nama' => $row->nama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data produk berdasarkan ID
        $row = Ruang::find($id);
        if ($row) {
            $row->nama = $request->nama;


            // Simpan perubahan
            $row->save();

            return redirect('main/ruang')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ruang = Ruang::findOrFail($id);
        $ruang->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

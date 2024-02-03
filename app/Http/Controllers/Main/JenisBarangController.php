<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['title'] = 'Data Jenis Barang';
        $jenis_barang = JenisBarang::all();
        $data['result'] = $jenis_barang->sortDesc();
        return view('main.jenis_barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $data['title'] = "Tambah Data Jenis Barang";
        return view("main.jenis_barang.create", $data);
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
                'nama.required' => 'Nama produk tidak boleh kosong',
            ]
        );

         JenisBarang::create([
            'nama' => $request->nama,
        ]);

        return redirect('main/jenis_barang')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = JenisBarang::findOrFail($id);
        return view('main.jenis_barang.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = JenisBarang::findOrFail($id);
       
        return view('main.jenis_barang.edit', [
            'title' => 'Edit Data Jenis Barang',
            'id' => $row->id,
            'nama' => $row->nama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $row= JenisBarang::find($id);
        if ($row) {
            $row->nama = $request->nama;
            // Simpan perubahan
            $row->save();

            return redirect('main/jenis_barang')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $jenis_barang = JenisBarang::findOrFail($id);
        $jenis_barang->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

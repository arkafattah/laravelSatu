<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\JenisKebutuhan;
use Illuminate\Http\Request;

class JenisKebutuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data['title'] = 'Data Jenis Kebutuhan';
        $jeniskebutuhan = JenisKebutuhan::all();
        $data['result'] = $jeniskebutuhan->sortDesc();
        return view('main.jeniskebutuhan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $data['title'] = "Tambah Data Jenis Kebutuhan";
        return view("main.jeniskebutuhan.create", $data);
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

         JenisKebutuhan::create([
            'nama' => $request->nama,
        ]);

        return redirect('main/jenis_kebutuhan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = JenisKebutuhan::findOrFail($id);
        return view('main.jeniskebutuhan.show', [
            'title' => 'Detail Data Jenis Kebutuhan',
            'nama' => $row->nama,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = JenisKebutuhan::findOrFail($id);
       
        return view('main.jeniskebutuhan.edit', [
            'title' => 'Edit Data Jenis Kebutuhan',
            'id' => $row->id,
            'nama' => $row->nama,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row= JenisKebutuhan::find($id);
        if ($row) {
            $row->nama = $request->nama;
            // Simpan perubahan
            $row->save();

            return redirect('main/jenis_kebutuhan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $jenis_kebutuhan = JenisKebutuhan::findOrFail($id);
        $jenis_kebutuhan->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

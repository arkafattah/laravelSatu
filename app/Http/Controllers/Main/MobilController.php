<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Mobil';
        $user = Mobil::all();
        $data['result'] = $user->sortDesc();
        return view('main.mobil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Tambah Data Mobil";
        return view("main.mobil.create", $data);
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
                'stok' => 'required',
            ],
            [
                'nama.required' => 'Nama produk tidak boleh kosong',
                'stok.required' => 'slug produk tidak boleh kosong',
            ]
        );

        $produk = Mobil::create([
            'nama' => $request->nama,
            'stok' => $request->stok, // Simpan gambar di direktori storage/app/public/images
        ]);

        return redirect('main/mobil')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Mobil::findOrFail($id);
        return view('main.mobil.show', [
            'title' => 'Detail Data Mobil',
            'nama' => $row->nama,
            'stok' => $row->stok,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        
        $row = Mobil::findOrFail($id);
       
            return view('main.mobil.edit', [
                'title' => 'Edit Data Mobil',
                'id' => $row->id,
                'nama' => $row->nama,
                'stok' => $row->stok,
            ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data produk berdasarkan ID
        $row= Mobil::find($id);
        if ($row) {
            $row->nama = $request->nama;
            $row->stok = $request->stok;

            
            // Simpan perubahan
            $row->save();

            return redirect('main/mobil')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mobil = Mobil::findOrFail($id);
        $mobil->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

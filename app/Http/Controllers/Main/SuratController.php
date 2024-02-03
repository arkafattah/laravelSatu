<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Surat';
        $user = Surat::all();
        $data['result'] = $user->sortDesc();
        return view('main.surat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Tambah Data Surat";
        return view("main.surat.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'jenis' => 'required',
            ],
            [
                'jenis.required' => 'Jenis surat tidak boleh kosong',
            ]
        );

        $produk = Surat::create([
            'jenis' => $request->jenis,
        ]);

        return redirect('main/surat')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Surat::findOrFail($id);
        return view('main.surat.show', [
            'title' => 'Detail Data Surat',
            'jenis' => $row->jenis,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $row = Surat::findOrFail($id);

        return view('main.surat.edit', [
            'title' => 'Edit Data Surat',
            'id' => $row->id,
            'jenis' => $row->jenis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data produk berdasarkan ID
        $row = Surat::find($id);
        if ($row) {
            $row->jenis = $request->jenis;


            // Simpan perubahan
            $row->save();

            return redirect('main/surat')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

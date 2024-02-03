<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Kendaraan';
        $user = Kendaraan::all();
        $data['result'] = $user->sortDesc();
        return view('main.kendaraan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Tambah Data Kendaraan";
        return view("main.kendaraan.create", $data);
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
                'nopol' => 'required',
                'tipe' => 'required',
                'warna' => 'required',
                'tahun' => 'required',
            ],
            [
                'jenis.required' => 'jenis produk tidak boleh kosong',
                'nopol.required' => 'nopol produk tidak boleh kosong',
                'tipe.required' => 'tipe produk tidak boleh kosong',
                'warna.required' => 'warna produk tidak boleh kosong',
                'tahun.required' => 'tahun produk tidak boleh kosong',
            ]
        );

        $produk = Kendaraan::create([
            'jenis' => $request->jenis,
            'nopol' => $request->nopol,
            'tipe' => $request->tipe,
            'warna' => $request->warna,
            'tahun' => $request->tahun, // Simpan gambar di direktori storage/app/public/images
        ]);

        return redirect('main/kendaraan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Kendaraan::findOrFail($id);
        return view('main.kendaraan.show', [
            'title' => 'Detail Data Kendaraan',
            'jenis' => $row->jenis,
            'nopol' => $row->nopol,
            'tipe' => $row->tipe,
            'warna' => $row->warna,
            'tahun' => $row->tahun,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $row = Kendaraan::findOrFail($id);

        return view('main.kendaraan.edit', [
            'title' => 'Edit Data Kendaraan',
            'id' => $row->id,
            'jenis' => $row->jenis,
            'nopol' => $row->nopol,
            'tipe' => $row->tipe,
            'warna' => $row->warna,
            'tahun' => $row->tahun,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data produk berdasarkan ID
        $row = Kendaraan::find($id);
        if ($row) {
            $row->jenis = $request->jenis;
            $row->nopol = $request->nopol;
            $row->tipe = $request->tipe;
            $row->warna = $request->warna;
            $row->tahun = $request->tahun;


            // Simpan perubahan
            $row->save();

            return redirect('main/kendaraan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

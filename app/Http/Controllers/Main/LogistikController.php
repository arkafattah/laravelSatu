<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Logistik;
use Illuminate\Http\Request;

class LogistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['title'] = 'Data Logistik';
        $logistik = Logistik::all();
        $data['result'] = $logistik->sortDesc();
        return view('main.logistik.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['title'] = "Tambah Data Logistik";
        return view("main.logistik.create", $data);
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
                'daftar' => 'required',
            ],
            [
                'nama.required' => 'nama tidak boleh kosong',
                'daftar.required' => 'Daftar tidak boleh kosong',
            ]
        );

        $produk = Logistik::create([
            'nama' => $request->nama,
            'daftar' => $request->daftar,
        ]);

        return redirect('main/logistik')->with('success', 'Data berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Logistik::findOrFail($id);
        return view('main.logistik.show', [
            'title' => 'Detail Data Logistik',
            'nama' => $row->nama,
            'daftar' => $row->daftar,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $row = Logistik::findOrFail($id);

        return view('main.logistik.edit', [
            'title' => 'Edit Data Logistik',
            'id' => $row->id,
            'nama' => $row->nama,
            'daftar' => $row->daftar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Logistik::find($id);
        if ($row) {
            $row->nama = $request->nama;
            $row->daftar = $request->daftar;
            // Simpan perubahan
            $row->save();

            return redirect('main/logistik')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $logistik = Logistik::findOrFail($id);
        $logistik->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

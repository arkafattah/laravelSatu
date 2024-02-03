<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Sarana;
use Illuminate\Http\Request;

class SaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Sarana';
        $user = Sarana::all();
        $data['result'] = $user->sortDesc();
        return view('main.sarana.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Tambah Data Sarana";
        return view("main.sarana.create", $data);
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
                'model' => 'required',
            ],
            [
                'nama.required' => 'Nama produk tidak boleh kosong',
                'model.required' => 'model produk tidak boleh kosong',
            ]
        );

        $produk = Sarana::create([
            'nama' => $request->nama,
            'model' => $request->model, // Simpan gambar di direktori storage/app/public/images
        ]);

        return redirect('main/sarana')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Sarana::findOrFail($id);
        return view('main.sarana.show', [
            'title' => 'Detail Data Sarana',
            'nama' => $row->nama,
            'model' => $row->model,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $row = Sarana::findOrFail($id);

        return view('main.sarana.edit', [
            'title' => 'Edit Data Sarana',
            'id' => $row->id,
            'nama' => $row->nama,
            'model' => $row->model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data produk berdasarkan ID
        $row = Sarana::find($id);
        if ($row) {
            $row->nama = $request->nama;
            $row->model = $request->model;


            // Simpan perubahan
            $row->save();

            return redirect('main/sarana')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sarana = Sarana::findOrFail($id);
        $sarana->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

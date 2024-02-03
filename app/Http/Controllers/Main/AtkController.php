<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Atk;
use Illuminate\Http\Request;

class AtkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Alat Tulis Kantor';
        $user = Atk::all();
        $data['result'] = $user->sortDesc();
        return view('main.atk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Tambah Data Alat Tulis Kantor";
        return view("main.atk.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'uraian' => 'required',
                'spesifikasi' => 'required',
                'satuan' => 'required',
            ],
            [
                'uraian.required' => 'Uraian tidak boleh kosong',
                'spesifikasi.required' => 'Spesifikasi tidak boleh kosong',
                'satuan.required' => 'Satuan tidak boleh kosong',
            ]
        );

        Atk::create([
            'uraian' => $request->uraian,
            'spesifikasi' => $request->spesifikasi,
            'satuan' => $request->satuan,
        ]);

        return redirect('main/atk')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = Atk::findOrFail($id);
        return view('main.atk.show', [
            'title' => 'Detail Data Atk',
            'uraian' => $row->uraian,
            'spesifikasi' => $row->spesifikasi,
            'satuan' => $row->satuan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $row = Atk::findOrFail($id);

        return view('main.atk.edit', [
            'title' => 'Edit Data Alat Tulis Kantor',
            'id' => $row->id,
            'uraian' => $row->uraian,
            'spesifikasi' => $row->spesifikasi,
            'satuan' => $row->satuan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil data produk berdasarkan ID
        $row = Atk::find($id);
        if ($row) {
            $row->uraian = $request->uraian;
            $row->spesifikasi = $request->spesifikasi;
            $row->satuan = $request->satuan;


            // Simpan perubahan
            $row->save();

            return redirect('main/atk')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mobil = Atk::findOrFail($id);
        $mobil->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

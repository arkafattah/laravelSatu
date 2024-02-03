<?php

namespace App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\User;
use Illuminate\Http\Request;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Barang';
        $barang =  Barang::with('jenis_barang','users')->get();
     $data['result'] = $barang->sortDesc();
     
        return view('main.barang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $data['result'] =  JenisBarang::all();
        $data['pengguna'] =  User::all();
        $data['title'] = "Tambah Data Barang";
        return view("main.barang.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'jenis_id' => 'required',
                'pengguna_id' => 'required',
                'nama' => 'required',
                'jumlah' => 'required',
            ],
            [
                'jenis_id.required' => 'jenis id tidak boleh kosong',
                'pengguna_id.required' => 'pengguna id tidak boleh kosong',
                'nama.required' => 'nama tidak boleh kosong',
                'jumlah.required' => 'jumlah tidak boleh kosong',
            ]
        );
        Barang::create([
            'jenis_id' => $request->jenis_id,
            'pengguna_id' => $request->pengguna_id, 
            'nama' => $request->nama, 
            'jumlah' => $request->jumlah, 
        ]);

        return redirect('main/barang')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Barang::findOrFail($id);
        return view('main.barang.show', [
            'title' => 'Detail Data Barang',
            'nama' => $row->nama,
            'jumlah' => $row->jumlah,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Barang::findOrFail($id);
        return view('main.barang.edit', [
            'title' => 'Edit Data Barang',
            'id' => $row->id,
            'nama' => $row->nama,
            'jumlah' => $row->jumlah,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row= Barang::find($id);
        if ($row) {
            $row->nama = $request->nama;
            $row->jumlah= $request->jumlah;
            // Simpan perubahan
            $row->save();

            return redirect('main/barang')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mobil = Barang::findOrFail($id);
        $mobil->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

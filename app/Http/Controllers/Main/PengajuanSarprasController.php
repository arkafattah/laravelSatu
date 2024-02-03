<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\PemeliharaanSarpras;
use App\Models\User;
use Illuminate\Http\Request;

class PengajuanSarprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->jab_id == 4) {

            $user = auth()->user()->id;
            $data['title'] = 'Data pengajuan pemeliharaan sarpras';
            $data['result'] = PemeliharaanSarpras::with('user', 'barang')
                ->where('user_id', '=', $user)
                ->get();
            return view('main.pengajuan_sarpras.index', $data);
        } else {
            $data['title'] = 'Data pengajuan pemeliharaan sarpras';
            $data['result'] = PemeliharaanSarpras::with('user', 'barang')
                ->get();
            return view('main.pengajuan_sarpras.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Tambah Data Pengajuan Pemeliharaan Sarpras";
        $user = User::all();
        $barang = Barang::all();
        $data['result'] = $user->sortDesc();
        $data['barang'] = $barang->sortDesc();
        return view('main.pengajuan_sarpras.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validasi = $this->validate(
            $request,
            [
                'user_id' => 'required',
                'barang_id' => 'required',
                'jumlah' => 'required',
                'keterangan' => 'required',
                'status' => 'required',
            ],
            [
                'user_id.required' => 'jenis id tidak boleh kosong',
                'barang_id.required' => 'pengguna id tidak boleh kosong',
                'jumlah.required' => 'jumlah tidak boleh kosong',
                'keterangan.required' => 'keterangan tidak boleh kosong',
                'status.required' => 'status tidak boleh kosong',
            ]
        );
        PemeliharaanSarpras::create([
            'user_id' => $request->user_id,
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
        ]);

        return redirect('main/pemeliharaan_sarpras')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = PemeliharaanSarpras::findOrFail($id);
        return view('main.pengajuan_sarpras.edit', [
            'title' => 'Edit Data Pengajuan Pemeliharaan Sarpras',
            'id' => $row->id,
            'user_id' => $row->user_id,
            'barang_id' => $row->barang_id,
            'user' => User::all(),
            'barang' => Barang::all(),
            'nama' => $row->nama,
            'jumlah' => $row->jumlah,
            'keterangan' => $row->keterangan,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = PemeliharaanSarpras::find($id);
        if ($row) {
            $row->user_id = $request->user_id;
            $row->barang_id = $request->barang_id;
            $row->jumlah = $request->jumlah;
            $row->keterangan = $request->keterangan;
            $row->status = $request->status;
            // Simpan perubahan
            $row->save();

            return redirect('main/pemeliharaan_sarpras')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = PemeliharaanSarpras::findOrFail($id);
        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

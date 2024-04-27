<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\PeminjamanKendaraan;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data pengajuan kendaraan';
        $user = PeminjamanKendaraan::with('users', 'kendaraan')->get();
        $data['result'] = $user->sortDesc();
        return view('main.peminjaman_kendaraan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::all();
        $data['kendaraan'] = Kendaraan::all();
        $data['peminjaman_kendaraan'] = PeminjamanKendaraan::all();
        $data['title'] = "Tambah Data Pengajuan Kendaraan";
        return view("main.peminjaman_kendaraan.create", $data);
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
                'kendaraan_id' => 'required',
                'kegiatan' => 'required',
                'tanggal_pinjam' => 'required',
                'jam_pinjam' => 'required',
                'tanggal_kembali' => 'required',
                'jam_kembali' => 'required',
                'status' => 'required',

            ],
            [
                'user_id.required' => 'user_id tidak boleh kosong',
                'kendaraan_id.required' => 'kendaraan_id tidak boleh kosong',
                'kegiatan.required' => 'kegiatan tidak boleh kosong',
                'tanggal_pinjam.required' => 'tanggal_pinjam tidak boleh kosong',
                'jam_pinjam.required' => 'jam_pinjam tidak boleh kosong',
                'tanggal_kembali.required' => 'tanggal_kembali tidak boleh kosong',
                'jam_kembali.required' => 'jam_kembali tidak boleh kosong',
                'status.required' => 'status tidak boleh kosong',
            ]
        );

        PeminjamanKendaraan::create([
            'user_id' => $request->user_id,
            'kendaraan_id' => $request->kendaraan_id,
            'kegiatan' => $request->kegiatan,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jam_pinjam' => $request->jam_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'jam_kembali' => $request->jam_kembali,
            'status' => $request->status,
        ]);

        return redirect('main/peminjaman_kendaraan')->with('success', 'Data berhasil disimpan!');
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
        $row = PeminjamanKendaraan::findOrFail($id);
        $user = User::all();
        $kendaraan = Kendaraan::all();
        return view('main.peminjaman_kendaraan.edit', [
            'title' => 'Edit Data Pengajuan Kendaraan',
            'user_id' => $row->user_id,
            'user' => $user,
            'id' => $row->id,
            'kendaraan_id' => $row->kendaraan_id,
            'kendaraan' => $kendaraan,
            'kegiatan' => $row->kegiatan,
            'tanggal_pinjam' => $row->tanggal_pinjam,
            'jam_pinjam' => $row->jam_pinjam,
            'tanggal_kembali' => $row->tanggal_kembali,
            'jam_kembali' => $row->jam_kembali,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = PeminjamanKendaraan::find($id);
        if ($row) {
            $row->user_id = $request->user_id;
            $row->kendaraan_id = $request->kendaraan_id;
            $row->kegiatan = $request->kegiatan;
            $row->tanggal_pinjam = $request->tanggal_pinjam;
            $row->jam_pinjam = $request->jam_pinjam;
            $row->tanggal_kembali = $request->tanggal_kembali;
            $row->jam_kembali = $request->jam_kembali;
            $row->status = $request->status;

            $row->save();


            return redirect('main/peminjaman_kendaraan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PeminjamanKendaraan::findOrFail($id);

        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

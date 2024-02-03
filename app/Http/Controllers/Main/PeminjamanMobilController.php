<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\PeminjamanMobil;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($user = auth()->user()->jab_id == 4) {
            $user = auth()->user()->id;
            $data['title'] = 'Data pengajuan peminjaman mobil';
            $user = PeminjamanMobil::with('users', 'mobil')
                ->where('user_id', $user)
                ->get();
            $data['result'] = $user->sortDesc();
            return view('main.peminjaman_mobil.index', $data);
        } else {
            $data['title'] = 'Data pengajuan peminjaman mobil';
            $user = PeminjamanMobil::with('users', 'mobil')
                ->get();
            $data['result'] = $user->sortDesc();
            return view('main.peminjaman_mobil.index', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::all();
        $data['mobil'] = Mobil::all();
        $data['jenis_kebutuhan'] = PeminjamanMobil::all();
        $data['title'] = "Tambah Data Peminjaman Mobil";
        return view("main.peminjaman_mobil.create", $data);
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
                'mobil_id' => 'required',
                'kegiatan' => 'required',
                'jam_pinjam' => 'required',
                'jam_kembali' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required',
                'status' => 'required',

            ],
            [
                'user_id.required' => 'user_id produk tidak boleh kosong',
                'mobil_id.required' => 'mobil_id tidak boleh kosong',
                'kegiatan.required' => 'kegiatan tidak boleh kosong',
                'jam_pinjam.required' => 'jam_pinjam tidak boleh kosong',
                'jam_kembali.required' => 'jam_kembali tidak boleh kosong',
                'tanggal_pinjam.required' => 'tanggal_pinjam tidak boleh kosong',
                'tanggal_kembali.required' => 'tanggal_kembali tidak boleh kosong',
                'status.required' => 'status tidak boleh kosong',
            ]
        );

        PeminjamanMobil::create([
            'user_id' => $request->user_id,
            'mobil_id' => $request->mobil_id,
            'kegiatan' => $request->kegiatan,
            'jam_pinjam' => $request->jam_pinjam,
            'jam_kembali' => $request->jam_kembali,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $request->status,
        ]);

        return redirect('main/peminjaman_mobil')->with('success', 'Data berhasil disimpan!');
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
        $row = PeminjamanMobil::findOrFail($id);
        $user = User::all();
        $mobil = Mobil::all();
        return view('main.peminjaman_mobil.edit', [
            'title' => 'Edit Data Pengajuan Peminjaman Mobil',
            'user' => $user,
            'id' => $row->id,
            'nama' => $row->nama,
            'mobil' => $mobil,
            'kegiatan' => $row->kegiatan,
            'jam_pinjam' => $row->jam_pinjam,
            'jam_kembali' => $row->jam_kembali,
            'tanggal_pinjam' => $row->tanggal_pinjam,
            'tanggal_kembali' => $row->tanggal_kembali,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = PeminjamanMobil::find($id);
        if ($row) {
            $row->user_id = $request->user_id;
            $row->mobil_id = $request->mobil_id;
            $row->kegiatan = $request->kegiatan;
            $row->jam_pinjam = $request->jam_pinjam;
            $row->jam_kembali = $request->jam_kembali;
            $row->tanggal_pinjam = $request->tanggal_pinjam;
            $row->tanggal_kembali = $request->tanggal_kembali;
            $row->status = $request->status;

            $row->save();

            return redirect('main/peminjaman_mobil')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PeminjamanMobil::findOrFail($id);

        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

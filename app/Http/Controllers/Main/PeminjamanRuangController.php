<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Ruang;
use App\Models\PeminjamanRuang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class PeminjamanRuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data pengajuan ruangan';
        $user = PeminjamanRuang::with('users', 'ruang')->get();
        $data['result'] = $user->sortDesc();
        return view('main.peminjaman_ruang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::all();
        $data['ruang'] = Ruang::all();
        $data['peminjaman_ruang'] = PeminjamanRuang::all();
        $data['title'] = "Tambah Data Ruang";
        return view("main.peminjaman_ruang.create", $data);
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
                'ruang_id' => 'required',
                'kegiatan' => 'required',
                'mulai' => 'required',
                'selesai' => 'required',
                'tanggal' => 'required',
                'status' => 'required',

            ],
            [
                'user_id.required' => 'user_id produk tidak boleh kosong',
                'ruang_id.required' => 'ruang_id tidak boleh kosong',
                'kegiatan.required' => 'kegiatan tidak boleh kosong',
                'mulai.required' => 'mulai tidak boleh kosong',
                'selesai.required' => 'selesai tidak boleh kosong',
                'tanggal.required' => 'tanggal tidak boleh kosong',
                'status.required' => 'status tidak boleh kosong',
            ]
        );

        PeminjamanRuang::create([
            'user_id' => $request->user_id,
            'ruang_id' => $request->ruang_id,
            'kegiatan' => $request->kegiatan,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect('main/peminjaman_ruang')->with('success', 'Data berhasil disimpan!');
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
        $row = PeminjamanRuang::findOrFail($id);
        $user = User::all();
        $ruang = Ruang::all();
        return view('main.peminjaman_ruang.edit', [
            'title' => 'Edit Data Pengajuan Ruang',
            'user_id' => $row->user_id,
            'user' => $user,
            'id' => $row->id,
            'ruang_id' => $row->ruang_id,
            'ruang' => $ruang,
            'kegiatan' => $row->kegiatan,
            'mulai' => $row->mulai,
            'selesai' => $row->selesai,
            'tanggal' => $row->tanggal,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = PeminjamanRuang::find($id);
        if ($row) {
            $row->user_id = $request->user_id;
            $row->ruang_id = $request->ruang_id;
            $row->kegiatan = $request->kegiatan;
            $row->mulai = $request->mulai;
            $row->selesai = $request->selesai;
            $row->tanggal = $request->tanggal;
            $row->status = $request->status;

            $row->save();

            return redirect('main/peminjaman_ruang')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PeminjamanRuang::findOrFail($id);

        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

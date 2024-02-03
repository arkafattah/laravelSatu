<?php

namespace App\Http\Controllers\Main\Laporan;

use App\Http\Controllers\Controller;
use App\Models\PeminjamanKendaraan;
use App\Models\User;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class LaporanPeminjamanKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Laporan Pengajuan Kendaraan';
        $peminjaman_kendaraan = PeminjamanKendaraan::with('users', 'kendaraan')->get();
        $data['result'] = $peminjaman_kendaraan->sortDesc();
        return view('main.peminjaman_kendaraan.laporan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }
    public function print(Request $request)
    {
        $validasi = $this->validate(
            $request,
            [
                'tgl_a' => 'required',
                'tgl_b' => 'required',
            ],
            [
                'tgl_a.required' => 'tanggal tidak boleh kosong',
                'tgl_b.required' => 'tanggal tidak boleh kosong',
            ]
        );
        $tgl_a = $request->tgl_a;
        $tgl_b = $request->tgl_b;

        $row = PeminjamanKendaraan::whereBetween(FacadesDB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), [$tgl_a, $tgl_b])->get();;
        return view('main.peminjaman_kendaraan.print', [
            'title' => 'Laporan Data Pengajuan Kendaraan',
            'result' => $row,
            'tgl_a' => $tgl_a,
            'tgl_b' => $tgl_b,
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}

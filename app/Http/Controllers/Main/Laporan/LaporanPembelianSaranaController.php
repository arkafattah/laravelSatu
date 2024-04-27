<?php

namespace App\Http\Controllers\Main\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Sarana;
use App\Models\PembelianSarana;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class LaporanPembelianSaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Laporan Pembelian Sarana';
        $pembelian_sarana = PembelianSarana::with('users', 'sarana')->get();
        $data['result'] = $pembelian_sarana->sortDesc();
        return view('main.pembelian_sarana.laporan', $data);
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

        $row = PembelianSarana::whereBetween(FacadesDB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), [$tgl_a, $tgl_b])->get();;
        return view('main.pembelian_sarana.print', [
            'title' => 'Laporan Data Pembelian Sarana',
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

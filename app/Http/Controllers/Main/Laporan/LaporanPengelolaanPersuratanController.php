<?php

namespace App\Http\Controllers\Main\Laporan;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\Pegawai;
use App\Models\PengelolaanPersuratan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class LaporanPengelolaanPersuratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Laporan Pengelolaan Persuratan';
        $pengelolaan_persuratan = PengelolaanPersuratan::with('users', 'surat')->get();
        $data['result'] = $pengelolaan_persuratan->sortDesc();
        return view('main.pengelolaan_persuratan.laporan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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

        $row = PengelolaanPersuratan::whereBetween(FacadesDB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), [$tgl_a, $tgl_b])->get();;
        return view('main.pengelolaan_persuratan.print', [
            'title' => 'Laporan Data Pengelolaan Persuratan',
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

        //
    }
}

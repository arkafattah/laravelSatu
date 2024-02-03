<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Atk;
use App\Models\PengelolaanAtk;
use App\Models\User;
use Illuminate\Http\Request;

class PengelolaanAtkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data pengajuan pengelolaan atk';
        $user = PengelolaanAtk::with('users', 'atk')->get();
        $data['result'] = $user->sortDesc();
        return view('main.pengelolaan_atk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::all();
        $data['atk'] = Atk::all();
        $data['pengelolaan_atk'] = PengelolaanAtk::all();
        $data['title'] = "Tambah Data Pengelolaan Atk";
        return view("main.pengelolaan_atk.create", $data);
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
                'atk_id' => 'required',
                'keterangan' => 'required',
                'tanggal' => 'required',
                'status' => 'required',

            ],
            [
                'user_id.required' => 'user_id produk tidak boleh kosong',
                'atk_id.required' => 'atk_id tidak boleh kosong',
                'keterangan.required' => 'keterangan tidak boleh kosong',
                'tanggal.required' => 'tanggal tidak boleh kosong',
                'status.required' => 'status tidak boleh kosong',
            ]
        );

        PengelolaanAtk::create([
            'user_id' => $request->user_id,
            'atk_id' => $request->atk_id,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);

        return redirect('main/pengelolaan_atk')->with('success', 'Data berhasil disimpan!');
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
        $row = PengelolaanAtk::findOrFail($id);
        $user = User::all();
        $atk = Atk::all();
        return view('main.pengelolaan_atk.edit', [
            'title' => 'Edit Data Pengajuan Pengelolaan atk',
            'user_id' => $row->user_id,
            'user' => $user,
            'id' => $row->id,
            'atk_id' => $row->atk_id,
            'atk' => $atk,
            'keterangan' => $row->keterangan,
            'tanggal' => $row->tanggal,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = PengelolaanAtk::find($id);
        if ($row) {
            $row->user_id = $request->user_id;
            $row->keterangan = $request->keterangan;
            $row->tanggal = $request->tanggal;
            $row->status = $request->status;

            $row->save();

            return redirect('main/pengelolaan_atk')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PengelolaanAtk::findOrFail($id);

        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

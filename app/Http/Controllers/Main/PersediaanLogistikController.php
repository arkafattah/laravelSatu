<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Logistik;
use App\Models\PersediaanLogistik;
use App\Models\User;
use Illuminate\Http\Request;

class PersediaanLogistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Pengajuan Logistik';
        $user = PersediaanLogistik::with('users', 'logistik')->get();
        $data['result'] = $user->sortDesc();
        return view('main.persediaan_logistik.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['logistik'] = Logistik::all();
        $data['user'] = User::all();
        $data['title'] = "Tambah Data Pengajuan Logistik";
        return view("main.persediaan_logistik.create", $data);
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
                'logistik_id' => 'required',
                'jumlah' => 'required',
                'tanggal_pengambilan' => 'required',
                'status' => 'required',
            ],
            [
                'user_id.required' => 'user_id produk tidak boleh kosong',
                'logistik_id.required' => 'logistik_id produk tidak boleh kosong',
                'jumlah.required' => 'jumlah tidak boleh kosong',
                'tanggal_pengambilan.required' => 'tanggal_pengambilan produk tidak boleh kosong',
                'status.required' => 'status produk tidak boleh kosong',
            ]
        );

        PersediaanLogistik::create([
            'user_id' => $request->user_id,
            'logistik_id' => $request->logistik_id,
            'jumlah' => $request->jumlah,
            'tanggal_pengambilan' => $request->tanggal_pengambilan,
            'status' => $request->status,
        ]);

        return redirect('main/permintaan_logistik')->with('success', 'Data berhasil disimpan!');
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

        $row = PersediaanLogistik::findOrFail($id);
        $user = User::all();
        $logistik = Logistik::all();
        return view('main.persediaan_logistik.edit', [
            'title' => 'Edit Data Pengajuan Logistik',
            'user_id' => $row->user_id,
            'user' => $user,
            'id' => $row->id,
            'logistik_id' => $row->logistik_id,
            'logistik' => $logistik,
            'jumlah' => $row->jumlah,
            'tanggal_pengambilan' => $row->tanggal_pengambilan,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = PersediaanLogistik::find($id);
        $row->user_id = $request->user_id;
        $row->logistik_id = $request->logistik_id;
        $row->jumlah = $request->jumlah;
        $row->tanggal_pengambilan = $request->tanggal_pengambilan;
        $row->status = $request->status;
        $row->save();

        return redirect('main/permintaan_logistik')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PersediaanLogistik::findOrFail($id);
        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

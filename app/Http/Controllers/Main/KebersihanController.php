<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Kebersihan;
use App\Models\User;
use Illuminate\Http\Request;

class KebersihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data kebersihan';
        $user = Kebersihan::with('users')->get();
        $data['result'] = $user->sortDesc();
        return view('main.kebersihan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::all();
        $data['kebersihan'] = Kebersihan::all();
        $data['title'] = "Tambah Data Kebersihan";
        return view("main.kebersihan.create", $data);
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
                'keluhan' => 'required',
                'saran' => 'required',
                'tanggal' => 'required',
                'status' => 'required',

            ],
            [
                'user_id.required' => 'user_id tidak boleh kosong',
                'keluhan.required' => 'keluhan tidak boleh kosong',
                'saran.required' => 'saran tidak boleh kosong',
                'tanggal.required' => 'tanggal tidak boleh kosong',
                'status.required' => 'status tidak boleh kosong',
            ]
        );

        Kebersihan::create([
            'user_id' => $request->user_id,
            'keluhan' => $request->keluhan,
            'saran' => $request->saran,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ]);
        return redirect('main/kebersihan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $row = Kebersihan::findOrFail($id);
        return view('main.kebersihan.show', [
            'title' => 'Detail Data Kebersihan',
            'user_id' => $row->user_id,
            'keluhan' => $row->keluhan,
            'saran' => $row->saran,
            'tanggal' => $row->tanggal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Kebersihan::findOrFail($id);
        $user = User::all();
        return view('main.kebersihan.edit', [
            'title' => 'Edit Data Pengajuan Kebersihan',
            'user_id' => $row->user_id,
            'user' => $user,
            'id' => $row->id,
            'keluhan' => $row->keluhan,
            'saran' => $row->saran,
            'tanggal' => $row->tanggal,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = Kebersihan::find($id);

        $row->user_id = $request->user_id;
        $row->keluhan = $request->keluhan;
        $row->saran = $request->saran;
        $row->tanggal = $request->tanggal;
        $row->status = $request->status;

        $row->save();


        return redirect('main/kebersihan')->with('success', 'Data berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kebersihan::findOrFail($id);

        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Sarana;
use App\Models\PengelolaSarana;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class PengelolaSaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data Pengelola Sarana';
        $user = PengelolaSarana::with('users', 'sarana')->get();
        $data['result'] = $user->sortDesc();
        return view('main.pengelola_sarana.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::all();
        $data['sarana'] = Sarana::all();
        $data['pengelola_sarana'] = PengelolaSarana::all();
        $data['title'] = "Tambah Data Pengelola Sarana";
        return view("main.pengelola_sarana.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file1' => 'required|mimes:jpg,png,pdf|max:5048',
            'user_id' => 'required',
            'sarana_id' => 'required',
            'keterangan' => 'required',
            'jumlah_unit' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ]);
        // Proses pengunggahan berkas pertama
        $file1 = $request->file('file1');
        $file1Name = time() . '_' . $file1->getClientOriginalName();
        $file1->move(public_path('uploads'), $file1Name);


        $fileModel = new PengelolaSarana();

        $fileModel->user_id = $request->user_id;
        $fileModel->sarana_id = $request->sarana_id;
        $fileModel->keterangan = $request->keterangan;
        $fileModel->unit = $file1Name;
        $fileModel->jumlah_unit = $request->jumlah_unit;
        $fileModel->tanggal = $request->tanggal;
        $fileModel->status = $request->status;

        $fileModel->save();
        return redirect('main/pengelola_sarana')->with('success', 'Data berhasil di simpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $row = PengelolaSarana::findOrFail($id);
        return view('main.pengelola_sarana.show', [
            'title' => 'Detail Data Pengelola Sarana',
            'sarana_id' => $row->sarana_id,
            'keterangan' => $row->keterangan,
            'unit' => $row->unit,
            'jumlah_unit' => $row->jumlah_unit,
            'tanggal' => $row->tanggal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $row = PengelolaSarana::findOrFail($id);
        $user = User::all();
        $sarana = Sarana::all();
        return view('main.pengelola_sarana.edit', [
            'title' => 'Edit Data Sarana',
            'user_id' => $row->user_id,
            'user' => $user,
            'id' => $row->id,
            'sarana_id' => $row->sarana_id,
            'sarana' => $sarana,
            'keterangan' => $row->keterangan,
            'jumlah_unit' => $row->jumlah_unit,
            'tanggal' => $row->tanggal,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'file1' => 'required|mimes:jpg,png|max:5048',
            // 'file2' => 'required|mimes:jpg,png|max:5048',
            // 'file3' => 'required|mimes:jpg,png|max:5048',
            'user_id' => 'required',
            'sarana_id' => 'required',
            'keterangan' => 'required',
            'jumlah_unit' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ]);
        // // Proses pengunggahan berkas pertama
        // $file1 = $request->file('file1');
        // $file1Name = time() . '_' . $file1->getClientOriginalName();
        // $file1->move(public_path('uploads'), $file1Name);


        $fileModel = PengelolaSarana::find($id);
        $fileModel->user_id = $request->user_id;
        $fileModel->sarana_id = $request->sarana_id;
        $fileModel->keterangan = $request->keterangan;
        $fileModel->jumlah_unit = $request->jumlah_unit;
        $fileModel->tanggal = $request->tanggal;
        $fileModel->status = $request->status;

        $fileModel->save();

        return redirect('main/pengelola_sarana')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = PengelolaSarana::findOrFail($id);
        $file_path = "/uploads/" . $data->unit;

        if (file_exists($file_path)) {
            @unlink($file_path);
        }
        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Surat;
use App\Models\PengelolaanPersuratan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class PengelolaanPersuratanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Data pengajuan pengelolaan persuratan';
        $user = PengelolaanPersuratan::with('users', 'surat')->get();
        $data['result'] = $user->sortDesc();
        return view('main.pengelolaan_persuratan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['user'] = User::all();
        $data['surat'] = Surat::all();
        $data['pengelolaan_persuratan'] = PengelolaanPersuratan::all();
        $data['title'] = "Tambah Data Pengelolaan Persuratan";
        return view("main.pengelolaan_persuratan.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file1' => 'required|mimes:jpg,png,pdf|max:5048',
            'user_id' => 'required',
            'surat_id' => 'required',
            'pegawai' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ]);
        // Proses pengunggahan berkas pertama
        $file1 = $request->file('file1');
        $file1Name = time() . '_' . $file1->getClientOriginalName();
        $file1->move(public_path('uploads'), $file1Name);


        $fileModel = new PengelolaanPersuratan();

        $fileModel->user_id = $request->user_id;
        $fileModel->surat_id = $request->surat_id;
        $fileModel->pegawai =  json_encode($request->pegawai);
        $fileModel->keterangan = $request->keterangan;
        $fileModel->lampiran = $file1Name;
        $fileModel->tanggal = $request->tanggal;
        $fileModel->status = $request->status;
        $fileModel->pegawai = implode("+", $request->pegawai);

        $fileModel->save();
        return redirect('main/pengelolaan_persuratan')->with('success', 'Data berhasil di simpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $row = PengelolaanPersuratan::findOrFail($id);
        return view('main.pengelolaan_persuratan.show', [
            'title' => 'Detail Data Pengelolaan Persuratan',
            'surat_id' => $row->surat_id,
            'pegawai' => $row->pegawai,
            'keterangan' => $row->keterangan,
            'lampiran' => $row->lampiran,
            'tanggal' => $row->tanggal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $row = PengelolaanPersuratan::findOrFail($id);
        $user = User::all();
        $surat = Surat::all();
        return view('main.pengelolaan_persuratan.edit', [
            'title' => 'Edit Data Surat',
            'user_id' => $row->user_id,
            'user' => $user,
            'id' => $row->id,
            'surat_id' => $row->surat_id,
            'surat' => $surat,
            'pegawai' => $row->pegawai,
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
        $request->validate([
            // 'file1' => 'required|mimes:jpg,png|max:5048',
            // 'file2' => 'required|mimes:jpg,png|max:5048',
            // 'file3' => 'required|mimes:jpg,png|max:5048',
            'user_id' => 'required',
            'surat_id' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'status' => 'required',
        ]);
        // // Proses pengunggahan berkas pertama
        // $file1 = $request->file('file1');
        // $file1Name = time() . '_' . $file1->getClientOriginalName();
        // $file1->move(public_path('uploads'), $file1Name);


        $fileModel = PengelolaanPersuratan::find($id);
        $fileModel->user_id = $request->user_id;
        $fileModel->surat_id = $request->surat_id;
        $fileModel->keterangan = $request->keterangan;
        $fileModel->tanggal = $request->tanggal;
        $fileModel->status = $request->status;

        $fileModel->save();

        return redirect('main/pengelolaan_persuratan')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = PengelolaanPersuratan::findOrFail($id);
        $file_path = "/uploads/" . $data->lampiran;

        if (file_exists($file_path)) {
            @unlink($file_path);
        }
        $data->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
    }
}

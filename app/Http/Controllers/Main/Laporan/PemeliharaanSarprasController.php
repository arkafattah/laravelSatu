<?php

namespace App\Http\Controllers\Main\Laporan;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\PemeliharaanSarpras;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class PemeliharaanSarprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Laporan Pemeliharaan Sarpras';
        $pemeliharaan = PemeliharaanSarpras::with('user','barang')->get();
        $data['result'] = $pemeliharaan->sortDesc();
        return view('main.pemeliharaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $data['title'] = "Tambah Data Pemeliharaan";
        $user = User::all();
        $barang = Barang::all();
        $data['result'] = $user->sortDesc();
        $data['barang'] = $barang->sortDesc();
        return view('main.pemeliharaan.create', $data);
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
                'barang_id' => 'required',
                'jumlah' => 'required',
                'keterangan' => 'required',
                'status' => 'required',
            ],
            [
                'user_id.required' => 'jenis id tidak boleh kosong',
                'barang_id.required' => 'pengguna id tidak boleh kosong',
                'jumlah.required' => 'jumlah tidak boleh kosong',
                'keterangan.required' => 'keterangan tidak boleh kosong',
                'status.required' => 'status tidak boleh kosong',
            ]
        );
        PemeliharaanSarpras::create([
            'user_id' => $request->user_id,
            'barang_id' => $request->barang_id, 
            'jumlah' => $request->jumlah, 
            'keterangan' => $request->keterangan, 
            'status' => $request->status, 
        ]);

        return redirect('main/laporan/pemeliharaan')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $row = PemeliharaanSarpras::findOrFail($id);
        return view('main.pemeliharaan.show', [
            'title' => 'Detail Data Pemeliharaan Sarpras',
            'nama' => $row->nama,
            'jumlah' => $row->jumlah,
            'keterangan' => $row->keterangan,
            'status' => $row->status,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = PemeliharaanSarpras::findOrFail($id);
        return view('main.pemeliharaan.edit', [
            'title' => 'Edit Data Pemeliharaan Sarpras',
            'id' => $row->id,
            'user_id' => $row->user_id,
            'barang_id' => $row->barang_id,
            'user'=>User::all(),
            'barang'=>Barang::all(),
            'nama' => $row->nama,
            'jumlah' => $row->jumlah,
            'keterangan' => $row->keterangan,
            'status' => $row->status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $row= PemeliharaanSarpras::find($id);
        if ($row) {
            $row->user_id = $request->user_id;
            $row->barang_id= $request->barang_id;
            $row->jumlah= $request->jumlah;
            $row->keterangan= $request->keterangan;
            $row->status= $request->status;
            // Simpan perubahan
            $row->save();

            return redirect('main/laporan/pemeliharaan')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $mobil = PemeliharaanSarpras::findOrFail($id);
        $mobil->delete();
        return back()->with('hapus', 'Data sudah di Hapus!');
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
        $tgl_a= $request->tgl_a;
        $tgl_b= $request->tgl_b;
        $row = PemeliharaanSarpras::whereBetween(FacadesDB::raw("DATE_FORMAT(created_at,'%Y-%m-%d')"), [$tgl_a, $tgl_b])->get();;
        return view('main.pemeliharaan.print', [
            'title' => 'Laporan Data Pemeliharaan Sarpras',
            'result' => $row,
            'tgl_a'=>$tgl_a,
            'tgl_b'=>$tgl_b,
        ]);
    }
}

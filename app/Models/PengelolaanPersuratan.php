<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengelolaanPersuratan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'surat_id',
        'pegawai',
        'keterangan',
        'lampiran',
        'tanggal',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }
}

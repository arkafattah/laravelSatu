<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanMobil extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'mobil_id',
        'kegiatan',
        'jam_pinjam',
        'jam_kembali',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id', 'id');
    }
}

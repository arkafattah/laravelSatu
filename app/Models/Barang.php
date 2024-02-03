<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_id',
        'pengguna_id',
        'nama',
        'jumlah',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'pengguna_id', 'id');
    }
    
    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_id', 'id');
    }
}

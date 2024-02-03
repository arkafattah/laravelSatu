<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKebutuhan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
    ];
    public function barang()
    {
        return $this->hasMany(PembelianSarpras::class, 'jenis_kebutuhan', 'id');
    }
}

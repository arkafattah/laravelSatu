<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianSarana extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sarana_id',
        'katalog',
        'keterangan',
        'tanggal',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function sarana()
    {
        return $this->belongsTo(Sarana::class, 'sarana_id', 'id');
    }
}

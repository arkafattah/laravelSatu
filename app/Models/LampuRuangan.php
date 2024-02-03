<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LampuRuangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'keterangan',
        'waktu',
        'jumlah_lampu',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengelolaanAtk extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'atk_id',
        'keterangan',
        'tanggal',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function Atk()
    {
        return $this->belongsTo(Atk::class, 'atk_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebersihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'keluhan',
        'saran',
        'tanggal',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

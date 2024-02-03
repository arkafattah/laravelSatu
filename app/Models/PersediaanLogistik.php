<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanLogistik extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'logistik_id',
        'jumlah',
        'tanggal_pengambilan',
        'status',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function logistik()
    {
        return $this->belongsTo(Logistik::class, 'logistik_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'jabatans';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany(User::class, 'jab_id', 'id');
    }
}

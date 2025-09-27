<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    protected $fillable = [
        'user_id',
        'judul_penelitian',
        'instansi',
        'tujuan_penelitian',
        'waktu_mulai',
        'waktu_selesai',
        'file_proposal',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'judul_penelitian',
        'instansi',
        'tujuan_penelitian',
        'file_proposal',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

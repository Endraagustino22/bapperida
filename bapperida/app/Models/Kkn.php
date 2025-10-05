<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kkn extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'judul_kkn',
        'instansi',
        'tujuan_kkn',
        'file_proposal',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

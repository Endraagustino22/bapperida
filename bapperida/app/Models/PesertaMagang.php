<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesertaMagang extends Model
{
    use HasFactory;

    protected $table = 'peserta_magang';

    protected $fillable = [
        'user_id', 'nim', 'universitas', 'jurusan', 'no_hp', 
        'alamat', 'cv_file', 'surat_pengantar', 'foto', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

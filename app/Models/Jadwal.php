<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'name',
        'email',
        'id_matkul',
        'tanggal',
        'start_time',
        'end_time',
        'lokasi',
        'kelas',
        'jurusan',
        'deskripsi'
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class, 'id_matkul');
    }
}


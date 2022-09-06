<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tkompetisi2 extends Model
{
    use HasFactory;
    protected $table = 'tkompetisi2';
    protected $guarded = [];
    protected $fillable = [
        'nama_kompetisi',
        'nama_ketua',
        'dosen_pembimbing',
        'nama_kelompok',
        'anggota1',
        'anggota2',
        'anggota3',
        'tingkatan',
        'pendanaan',
        'waktu_pelaksanaan',
        'prodi',
        'proposal',
        'status',

    ];
}
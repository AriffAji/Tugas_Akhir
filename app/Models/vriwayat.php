<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vriwayat extends Model
{
    use HasFactory;
    protected $table = 'vriwayat';
    protected $guarded = [];
    protected $fillable =[
        
        'nama_kompetisi',
        'nama_ketua',
        'dosen_pembimbing',
        'anggota1',
        'anggota2',
        'anggota3',
        'nama_kelompok',
        'tingkatan',
        'pendanaan',
        'waktu_pelaksanaan',
        'user_id',
    ];
    public function anggota(){
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $fillable = [
       'sebagai',
       
    ];

    public function users(){
        return $this->belongsTo(User::class, 'role_id','id');
    }
}
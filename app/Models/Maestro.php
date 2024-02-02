<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    use HasFactory;
    protected $table = 'maestros';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function grupos(){
        return $this->hasMany(MaestroGrupo::class,'maestro_id');
    }
    
    public function materias(){
        return $this->hasMany(MaestroMateria::class,'maestro_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupos';

    public function materias(){
        return $this->hasMany(GrupoMateria::class,'grupo_id');
    }
    
    public function alumnos(){
        return $this->hasMany(AlumnoGrupo::class,'grupo_id');
    }
}

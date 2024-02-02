<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos';
    
    public function grupos(){
        return $this->hasMany(AlumnoGrupo::class,'alumno_id');
    }

    public function padre(){
        return $this->hasOne(PadreAlumno::class,'alumno_id');
    }
}

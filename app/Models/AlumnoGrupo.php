<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoGrupo extends Model
{
    use HasFactory;
    protected $table = 'alumnos_grupos';

    public function alumno(){
        return $this->belongsTo(Alumno::class,'alumno_id');
    }
    
    public function grupo(){
        return $this->belongsTo(Grupo::class,'grupo_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoAsistencia extends Model
{
    use HasFactory;
    protected $table = 'alumnos_asistencias';

    public function alumno(){
        return $this->belongsTo(Alumno::class,'alumno_id');
    }
}

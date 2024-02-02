<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PadreAlumno extends Model
{
    use HasFactory;
    protected $table = 'padres_alumnos';

    public function padre(){
        return $this->belongsTo(Padre::class,'padre_id');
    }

    public function alumno(){
        return $this->belongsTo(Alumno::class,'alumno_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaestroMateria extends Model
{
    use HasFactory;
    protected $table = 'maestros_materias';
    
    public function materia(){
        return $this->belongsTo(Materia::class,'materia_id');
    }
    
    public function maestro(){
        return $this->belongsTo(Maestro::class,'maestro_id');
    }
}

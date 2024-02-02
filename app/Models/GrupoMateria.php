<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMateria extends Model
{
    use HasFactory;
    protected $table = 'grupos_materias';
    
    public function materia(){
        return $this->belongsTo(Materia::class,'materia_id');
    }
}

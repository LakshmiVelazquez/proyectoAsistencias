<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaestroGrupo extends Model
{
    use HasFactory;
    protected $table = 'maestros_grupos';

    
    public function maestro(){
        return $this->belongsTo(Maestro::class,'maestro_id');
    }

    public function grupo(){
        return $this->belongsTo(Grupo::class,'grupo_id');
    }
}

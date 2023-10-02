<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = "citas";
    protected $fillable = [
        "codigo",
        "descripcion",
    ] ;
    

    protected $hidden=[
        "especialidad_id",
        "paciente_id",
        "id",
        "created_at",
        "updated_at"
    ];
    
    //relaciones de uno a uno
    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function especialidad(){
    return $this->belongsTo(Especialidad::class);
    }
 
}

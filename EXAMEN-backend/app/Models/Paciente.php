<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table = "pacientes";

    protected $fillable = [
        "nombre",
        "apellido",
        "cedula",
        "fecha_nacimiento",    
        "genero",
        "ciudad",
        "direccion",
        "telefono",
        "email",
    ] ;
    

    //informacion que no requiere el fronend
    protected $hidden=[
        "created_at",
        "updated_at"
    ];
 
    //relacion de uno a muchos
    public function citas(){
        return $this->hasMany(Cita::class);
    }

//relacion de muchos a muchos

}

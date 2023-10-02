<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    
    protected $table = "clientes";

    protected $fillable = [
        "cedula",
        "nombre",
        "apellido",
        "ciudad",    
        "email",
        "direccion",
        "telefono",
        "fecha_nacimiento",
    ] ;
    

    //informacion que no requiere el fronend
    protected $hidden=[
        "created_at",
        "updated_at"
    ];
 
    //relacion de uno a muchos
    public function reservas(){
        return $this->hasMany(Reservas::class);
    }

}

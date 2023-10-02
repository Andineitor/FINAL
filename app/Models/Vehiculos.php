<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    
    use HasFactory;
    
    protected $table = "vehiculos";

    protected $fillable = [
        "marca",
        "modelo",
        "año_fabricacion",
        "placa",    
        "color",
        "tipo_vehiculo",
        "kilometraje",
        "descripcion",
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

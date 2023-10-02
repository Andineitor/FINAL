<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $table = "reservas";
    protected $fillable = [
        "codigo",
        "descripcion",
    ] ;
    

    protected $hidden=[
        "vehiculo_id",
        "cliente_id",
        "id",
        "created_at",
        "updated_at"
    ];
    
    //relaciones de uno a uno
    public function cliente(){
        return $this->belongsTo(Clientes::class);
    }

    public function vehiculo(){
    return $this->belongsTo(Vehiculos::class);
    }
 
}

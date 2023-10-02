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
        "vehiculos_id",
        "clientes_id",
        "id",
        "created_at",
        "updated_at"
    ];
    
    //relaciones de uno a uno
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function vehiculo(){
    return $this->belongsTo(Vehiculo::class);
    }
 
}

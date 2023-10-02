<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

  protected $table = "especialidades";
  protected $fillable = [
    "codigo",
    "nombre",
    "descripcion",
  ];

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

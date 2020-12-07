<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meseros extends Model
{
    use HasFactory;

    // Campos para insert
    protected $fillable = [
        'nombre', 'edad', 'telefono', 'correo', 'mesa_asignada'
    ];

    // Mesa asignada al mesero
    public function mesaAsignada(){
        return $this->belongsTo(Mesa::class, 'mesa_asignada');
    }
}

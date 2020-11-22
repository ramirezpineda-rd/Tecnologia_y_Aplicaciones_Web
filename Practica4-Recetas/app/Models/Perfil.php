<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    //Relación uno a uno de perfíl con usuario.
    //Es una relación inversa
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

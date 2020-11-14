<?php

namespace App\Models;
//namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta2 extends Model
{
    use HasFactory;

    //Campos que se agregan
    /*protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];

    //Obtiene la categoria de la receta via Foreign Key (FK)
    public function categoria()
    {
        //belongsTo se refiere a una relacion 1:1 donde una receta esta asociada a una categoria
        return $this->belongsTo(CategoriaReceta::class);
    }

    //Obtiene la información del usuario via FK
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');//FK de esta tabla
    }*/

}

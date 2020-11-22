<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //Campos que se agregaran

    protected $fillable = [
        'titulo',
        'preparacion',
        'ingredientes',
        'imagen',
        'categoria_id'
    ];
    

    //Obtiene la categoria de la receta via llave foranea
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class); 

    }

    //Obtener la información de usuario por medio de una llave foranea
    public function autor(){
        return $this->belongsTo(User::class,'user_id');//Es la llave foranea de la tabla
    } 

    //Likes que ha recibido una receta
    public function likes()
    {
        return $this->belongsToMany(User::class);
    }

}

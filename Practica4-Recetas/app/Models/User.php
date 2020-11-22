<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Evento que se ejecuta cuando un usuario es creado
    protected static function boot()
    {
        parent::boot();
        //Asignar perfil una vez que se halla creado un usuario nuevo
        static::created(function($user){
            $user->perfil()->create();
        });//Métodos de elocuent
    }

    //Relacion de uno a muchos  deusuario a recetas
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
    //Un usuario va a tener un perfil
    //Relacion uno a uno de usuario y perfil.
    public function perfil()
    {
       return $this->hasOne(Perfil::class); 
    }

    //Recetas a las cuales el usuario le a dado like
    public function meGusta()
    {
        return $this->belongsToMany(Receta::class,'likes_receta');
        //Poner especificamente el lugar donde se va a aguardar.
        //El segundo parametro es la tabla pivote.
    }
}

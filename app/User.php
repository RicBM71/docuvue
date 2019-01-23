<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] =  Hash::make($password);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
    * @param 
    * $this es una instancia del usuario actual
    */
    public function scopePermitidos($query)
    {

        //dd(auth()->user()->can('view', $this));

        if (auth()->user()->can('view', $this)){ // busca la política e UserPolicy, pasar instancia
            return $query; // retorna el query builder sin restricciones
        }else{
            return $query->where('id', auth()->id());  
        }
    }
}

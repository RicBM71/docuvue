<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates =['fecha_publi'];
    protected $guarded=[];

    // establecemos la relación única post->categoría, un post solo pertenece a una categoría
    public function categoria()
    {
    	return $this->belongsTo(Categoria::class);
    }

    // establecemos la relación muchos a muchos
    public function etiquetas()
    {
    	return $this->belongsToMany(Etiqueta::class);
    }

    // TODO: ver por qué se añade scope

    public function scopePublicados($query)
    {
        // $posts = $this::whereNotNull('fecha_publi')
        //             ->where('fecha_publi', '<=', Carbon::now() )
        //             ->latest('fecha_publi') // orden descendente
        //             ->get(); 

        $query->whereNotNull('fecha_publi')
                    ->where('fecha_publi', '<=', Carbon::now() )
                    ->latest('fecha_publi'); 

    }
    // creamos la relación uno a muchos, un post tendrá una o varias fotos
    public function fotos()
    {
        return $this->hasMany(Photo::class);
    }
}

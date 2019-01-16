<?php

namespace App;

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
}

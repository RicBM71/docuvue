<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates =['fecha_publi'];

    // establecemos la relación única post->categoría, un post solo pertenece a una categoría
    public function categoria()
    {
    	return $this->belongsTo(Categoria::class);
    }
}

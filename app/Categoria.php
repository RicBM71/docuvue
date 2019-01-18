<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	// una categoría puede tener muchos posts. 
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
}
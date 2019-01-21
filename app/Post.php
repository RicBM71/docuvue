<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates =['fecha_publi'];
    //protected $guarded=[];

    // con esto le decimos al formulario que solo se puede actualizar estos campos
    protected $fillable = [
        'titulo', 'cuerpo', 'extracto', 'fecha_publi', 'categoria_id',
    ];


    protected static function boot(){

        parent::boot();

        static::deleting(function($post){
            
            $post->etiquetas()->detach();   
            $post->fotos->each->delete();
            //$post->delete();
        });
    }    

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

    public function setFechaPubliAttribute($fecha_publi)
    {
        $this->attributes['fecha_publi'] = $fecha_publi  
            ? Carbon::createFromFormat('d/m/Y', $fecha_publi)
            : null;
    }

    public function setCategoriaIdAttribute($categoria)
    {
        // asigna la categoría si existe, si no existe, la crea!

        $this->attributes['categoria_id'] = Categoria::find($categoria)
            ? $categoria 
            : Categoria::create(['nombre' => $categoria])->id;

    }

    public function syncEtiquetas($etiquetas)
    {
         $etiquetasIds = collect($etiquetas)->map(function($etiqueta){
            return Etiqueta::find($etiqueta) ? $etiqueta : Etiqueta::create(['nombre' => $etiqueta])->id;
        });


         return $this->etiquetas()->sync($etiquetasIds);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //deshabiltamos protección de asignación masiva al asignar los campos
    //uno por uno en create
    protected $guarded=[];
}

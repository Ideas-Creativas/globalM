<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = ['id','categoria','user_id'];


    public function categoriasList(){
        return $this->hasMany('App\Categorias');
    }


    public function author()
    {
        return $this->belongsTo('App\User','user_id');
    }


}

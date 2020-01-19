<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $fillable = ['id','marca','image_url','user_id'];


     public function marcasList(){
        return $this->hasMany('App\Marcas');
    }


     public function author()
    {
        return $this->belongsTo('App\User','user_id');
    }



}




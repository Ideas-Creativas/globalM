<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motos extends Model
{
    protected $fillable = ['id','umage_url','marca_id','categoria_id','description','user_id'];




    public function motosList(){
        return $this->hasMany('App\Motos');
    }


    public function marca()//hago la relacion de 1:n de 1 moto puede tener 1 marca pero una marca puede tener muchas motos  $motos->marca->marca
    {
        //pertenece a
        return $this->belongsTo(Marcas::class);
    }


    public function categoria()//hago la relacion de 1:n de 1 moto puede tener 1 categoria pero una categoria puede tener muchas motos  $motos->categoria->categoria
     {
     	//pertenece a
     	return $this->belongsTo(Categorias::class);
     }





    public function author()
    {
        return $this->belongsTo('App\User','user_id');
    }




}

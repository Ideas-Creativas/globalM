<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Marcas;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
use Input;



class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marcas::all();
        return view('admin.marcas.index', ["marca" => $marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marca = new Marcas;
        return view('admin.marcas.create',["marca" => $marca]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image_url');
        $nombre = '';
        if( !is_null($file) ){
            if( $file->isValid() ){
                $archivo = $file;
                $imagen = Image::make($archivo);
                $random = Str::random(10);
                $nombre = $random.'-'.$archivo->getClientOriginalName();
                $anchoOriginal = $imagen->width();
                $altoOriginal = $imagen->height();
                $anchoNuevo = 1920;
                $altoNuevo = ($altoOriginal * $anchoNuevo)/$anchoOriginal;// Resimensionar en Altura
                $path = '/images/marcas/';
                $imagen->resize($anchoNuevo, $altoNuevo);
                $imagen->save( public_path($path.$nombre), 100 );
            }
        }
        $marca = new Marcas;
        $marca->marca = $request->name;
        $marca->image_url = $nombre; //$request->image_url;
        $marca->user_id = Auth::user()->id;

        if( $marca->save() ){
            return redirect("/admin/marcas");
        }else{
            return redirect("/admin/marcas/create",["marca" => $marca]);
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = Marcas::find($id);
        return view('admin.marcas.show',["marca" => $marca]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca = Marcas::find($id);
        return view('admin.marcas.edit',["marca" => $marca]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marca = Marcas::find($id);
        $file = $request->file('image_url');
        $nombre = $marca->image_url;
        
        if( !is_null($file) ){
            if( $file->isValid() ){
                $archivo = $request->file('image_url');
                $imagen = Image::make($archivo);
                $random = Str::random(10);
                $nombre = $random.'-'.$archivo->getClientOriginalName();
                $anchoOriginal = $imagen->width();
                $altoOriginal = $imagen->height();
                $anchoNuevo = 1920;
                $altoNuevo = ($altoOriginal * $anchoNuevo)/$anchoOriginal;// Resimensionar en Altura
                $path = '/images/marcas/';
                $imagen->resize($anchoNuevo, $altoNuevo);
                $imagen->save( public_path($path.$nombre), 100 );

                    if( file_exists(public_path($path.$marca->image_url) ) ){
                        unlink( public_path($path.$marca->image_url) );
                    }   
            }
        }

            $marca->marca = $request->name;
            $marca->image_url = $nombre; //$request->image_url;
            $marca->user_id = Auth::user()->id;

            if( $marca->save() ){
                return redirect("/admin/marcas");
            }else{
                return redirect("/admin/marcas/".$id."/edit");
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marcas::find($id);
        if (@getimagesize(public_path().'/images/marcas/'.$marca->image_url)) 
        {
            unlink(public_path().'/images/marcas/'.$marca->image_url);
        }
        Marcas::destroy($id);
        return redirect('/admin/marcas');

    }
}

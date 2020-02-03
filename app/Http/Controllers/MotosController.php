<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motos;

class MotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$motos = Motos::firstOrFail();
        //return response()->json($motos->load('marcas'), 200);

        $motos = Motos::all();
        return view('admin.motos.index', ["moto" => $motos]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moto = new Motos;
        return view('admin.motos.create',["moto" => $moto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('umage_url');
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
                $path = '/images/motos/';
                $imagen->resize($anchoNuevo, $altoNuevo);
                $imagen->save( public_path($path.$nombre), 100 );
            }
        }
        $moto = new Motos;
        $moto->umage_url = $nombre; //$request->image_url;
        $moto->marca_id = $request->marca;
        $moto->categoria_id = $request->categoria;

        $info = array(['modelo' => $request->modelo,
        'cilindrada'=> $request->cilindrada,
        'precio'=> $request->precio,
        'disponible'=> $request->disponible,
        'dimensiones'=> $request->dimensiones,
        'peso'=> $request->peso,
        'potencia'=> $request->potencia,
        'neumaticos'=> $request->neumaticos
        
        ]);


        $moto->description = array_add($info);



        $moto->user_id = Auth::user()->id;





        if( $moto->save() ){
            return redirect("/admin/motos");
        }else{
            return redirect("/admin/motos/create",["moto" => $moto]);
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
        $moto = Motos::find($id);
        return view('admin.motos.show',["moto" => $moto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moto = Motos::find($id);
        return view('admin.motos.edit',["moto" => $moto]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moto = Motos::find($id);
        if (@getimagesize(public_path().'/images/motos/'.$moto->umage_url)) 
        {
            unlink(public_path().'/images/motos/'.$moto->umage_url);
        }
        Motos::destroy($id);
        return redirect('/admin/motos');
    }
}

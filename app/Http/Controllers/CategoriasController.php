<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorias;

use Illuminate\Support\Facades\Auth;


class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categorias::all();
        return view('admin.categorias.index', ["categoria" => $categorias]);
    }


    public function create()
    {
        $categoria = new Categorias;
        return view('admin.categorias.create',["categoria" => $categoria]);
    }

    public function store(Request $request)
    {
        $categoria = new Categorias;
        $categoria->categoria = $request->name;
        $categoria->user_id = Auth::user()->id;

        if( $categoria->save() ){
            return redirect("/admin/categorias");
        }else{
            return redirect("/admin/categorias/create",["categoria" => $categoria]);
        }
        

    }



    public function show($id)
    {
        $categoria = Categorias::find($id);
        return view('admin.categorias.show',["categoria" => $categoria]);
    }



    public function edit($id)
    {
        $categoria = Categorias::find($id);
        return view('admin.categorias.edit',["categoria" => $categoria]);
    }



    public function update(Request $request, $id)
    {
            $categoria = Categorias::find($id);
            $categoria->categoria = $request->name;
            $categoria->user_id = Auth::user()->id;

            if( $categoria->save() ){
                return redirect("/admin/categorias");
            }else{
                return redirect("/admin/categorias/".$id."/edit");
            }
    }




    public function destroy($id)
    {
        $categoria = Categorias::find($id);
        Categorias::destroy($id);
        return redirect('/admin/categorias');

    }






}

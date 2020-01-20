<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     public function listadoUsuarios()
     {

        $usuarios = User::all();

        return view ('admin.usuarios.listado',compact('usuarios'));

       


     }

     public function salir()
    {
        Auth::Logout();
        \Session::flush();
        return redirect('/admin');
    }

}

@extends('layout.adminlte')
@section('titulo')
Productos
@endsection


@section('styles')
<link href="{{ asset('css/appAdmin.css') }}" rel="stylesheet">
@endsection

@section('content')




    <div class="banner-container">
    <div>
    </div>
        <div>
            <!-- <div id='banners-preview'></div> -->
        </div>
        <div class="banner-listado">
            <table >
                <tr>
                    <td>Categoria</td>
                    <td>Creación</td>
                    <td>Acciones</td>
                </tr>
            @foreach ($categoria as $categoria)
                <tr>
                   
                    <td>{{ $categoria->categoria }}</td>
                    <td>{{ $categoria->created_at }}</td>
                    <td>
                        <a href="/admin/categorias/{{ $categoria->id }}/edit">Editar</a>
                        @include('admin.categorias.delete',['categoria' => $categoria])
                    </td>
                </tr>
            @endforeach
            </table>
            
            </ul>
        </div>
    </div>





@endsection


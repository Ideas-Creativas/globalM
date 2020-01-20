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
                    <td>Marca</td>
                    <td>Nombre</td>
                    <td>Creación</td>
                    <td>Acciones</td>
                </tr>
            @foreach ($marca as $marca)
                <tr>
                    <td>
                        <a href="{{ $marca->image_url }}" target="_blank">
                            <img src="{{ asset('/images/marcas/'.$marca->image_url) }}" alt="{{ $marca->image_url }}">
                        </a>
                    </td>
                    <td>{{ $marca->marca }}</td>
                    <td>{{ $marca->created_at }}</td>
                    <td>
                        <a href="/admin/marcas/{{ $marca->id }}/edit">Editar</a>
                        @include('admin.marcas.delete',['marca' => $marca])
                    </td>
                </tr>
            @endforeach
            </table>
            
            </ul>
        </div>
    </div>





@endsection


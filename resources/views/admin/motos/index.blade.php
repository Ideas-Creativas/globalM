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
                    <td>Moto</td>
                    <td>Marca</td>
                    <td>Categoria</td>
                    <td>Creación</td>
                    <td>Acciones</td>
                </tr>
            @foreach ($moto as $moto)
                <tr>
                    <td>
                        <a href="{{ $moto->umage_url }}" target="_blank">
                            <img src="{{ asset('/images/motos/'.$moto->umage_url) }}" alt="{{ $moto->umage_url }}">
                        </a>
                    </td>
                    <td>{{ $moto->marca->marca }}</td>
                    <td>{{ $moto->categoria->categoria }}</td>
                    <td>{{ $moto->created_at }}</td>
                    <td>
                        <a href="/admin/motos/{{ $moto->id }}/edit">Editar</a>
                        @include('admin.motos.delete',['moto' => $moto])
                    </td>
                </tr>
            @endforeach
            </table>
            
            </ul>
        </div>
    </div>





@endsection


@extends('layout.admin')

@section('content')
    <div class="index-container">
        @include('admin.marcas.form',['marca'=>$marca,"titulo"=>"Nueva Marca", 'url'=>'/admin/marcas', 'method'=>'POST'])
    </div>
@endsection
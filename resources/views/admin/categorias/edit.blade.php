@extends('layout.adminlte')
@section('titulo')
Productos
@endsection


@section('content')
    <div class="index-container">
        @include('admin.categorias.form', ['categoria'=>$categoria, 'titulo'=>"Editar", 'url'=>'/admin/categorias/'.$categoria->id, 'method'=>'PATCH'])
    </div>
@endsection
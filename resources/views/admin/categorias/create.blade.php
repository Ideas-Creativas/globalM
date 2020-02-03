@extends('layout.adminlte')
@section('titulo')
Productos
@endsection

@section('content')
    <div class="index-container">
        @include('admin.categorias.form',['categoria'=>$categoria,"titulo"=>"Nueva Categoria", 'url'=>'/admin/categorias', 'method'=>'POST'])
    </div>
@endsection
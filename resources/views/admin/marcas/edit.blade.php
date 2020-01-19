@extends('layout.admin')

@section('content')
    <div class="index-container">
        @include('admin.marcas.form', ['marca'=>$marca, 'titulo'=>"Editar", 'url'=>'/admin/marcas/'.$marca->id, 'method'=>'PATCH'])
    </div>
@endsection
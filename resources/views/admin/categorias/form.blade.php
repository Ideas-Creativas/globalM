    {!! Form::open(['url' => $url, 'method' => $method, 'files' => true]) !!}
        {{ Form::token() }}
        <div class="form-container">
        <h1>{{ $titulo }}</h1>
        <div class="form-group">
        {{ Form::label('Nombre') }}
        {{ Form::text('name',$categoria->categoria,['class'=>'form-control','placeholder'=>'Ingresa el Nombre']) }}
        </div>
        
        <div class="form-group">
            <a href="/admin/categorias">Regresar al listado</a>
            <input type="submit" value="Guardar" class="btn btn-success">
        </div>
        </div>
    {!! Form::close() !!}
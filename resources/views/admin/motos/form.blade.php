    {!! Form::open(['url' => $url, 'method' => $method, 'files' => true]) !!}
        {{ Form::token() }}
        <div class="form-container">
        <h1>{{ $titulo }}</h1>
        <div class="form-group">
        {{ Form::label('Nombre') }}
        {{ Form::text('name',$marca->marca,['class'=>'form-control','placeholder'=>'Ingresa el Nombre']) }}
        </div>
        
        {{--<div class="form-group">
        {{ Form::label('Ingresar enlace') }}
        {{ Form::text('link',$marca->image_url,['class'=>'form-control','placeholder'=>'Enlace']) }}
        </div>--}}
 
      
        <div class="form-group">
            {{ Form::label('Seleccionar archivo de marca') }}
            {{ Form::file('image_url') }}
        </div>
        <div class="form-group">
            <a href="/admin/marcas">Regresar al listado</a>
            <input type="submit" value="Guardar" class="btn btn-success">
        </div>
        </div>
    {!! Form::close() !!}
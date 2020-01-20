@extends('layout.adminlte')
@section('titulo')
Usuarios
@endsection


@section('styles')
<link href="{{ asset('css/appAdmin.css') }}" rel="stylesheet">
<link href='//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel="stylesheet">
@endsection

@section('content')




<section class="content">
      <div class="container-fluid">
       
        <!-- /.row -->
    
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Usuarios</h3>

              
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <table class="table table-head-fixed text-nowrap" id="myTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Usuario</th>
                      <th>Creacion</th>
                      <th>Actualizacion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($usuarios as $usuario)
                    <tr>
                      <td>{{$usuario->id}}</td>
                      <td>{{$usuario->name}}</td>
                      <td>{{$usuario->created_at}}</td>
                      <td>{{$usuario->updated_at}}</td>
                      
                      <td>
                          <a href="" style="    color: #ab8a28;"><i class="fas fa-edit "></i></a>
                        <a href="" style="    color: red;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                    </tr>

                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>





@endsection

@section('scripts')


<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );



</script>
@endsection
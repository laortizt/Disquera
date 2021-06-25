@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3>Listado de albumes registrados</h3>

   

    @if(Session::has('msn'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{Session::get('msn')}}!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="mb-3">
    <a class="btn btn-primary" href="{{url('/album/create')}}" role="button">Nuevo</a>
    </div>
    <table class="table table-dark table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <!-- <th scope="col">Foto</th> -->
                <th scope="col">Nombre</th>
                <th scope="col">Año publicación</th>
                 <th scope="col">Artista</th>
                <th scope="col">Género</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($albums as $a)
            <tr>
                <th scope="row">{{$a->id}}</th>
                <td><img src="{{asset('storage').'/'.$a->photo}}" width="80px"class="img-fluid rounded-circle border border-5 border-light"></td>
                <td>{{$a->nombre}}</td>
                <td>{{$a->anioPublicacion}}</td>
                <td>{{$a->idartista}}</td>
                <td>{{$a->idgenero}}</td>
                <td>{{$a->estado}}</td>
                <td>
                    <a class="btn btn-primary" href="{{url('/album/'.$a->id.'/edit')}}" role="button">Editar</a>
                </td>
                <td>
                    <form action="{{url('/album/'.$a->id)}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" value="Borrar" onclick="return confirm('¿Esta seguro de eliminar el registro?')" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
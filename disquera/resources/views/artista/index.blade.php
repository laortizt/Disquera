@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3>Listado de artistas registrados</h3>

   

    @if(Session::has('msn'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{Session::get('msn')}}!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="mb-3">
    <a class="btn btn-primary" href="{{url('/artista/create')}}" role="button">Nuevo</a>
    </div>
    <table class="table table-dark table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Foto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Documento</th>
                <th scope="col">Email</th>
                <th scope="col">Año de nacimiento</th>
                 <th scope="col">Disquera</th>
                <th scope="col">Nombre artístico</th>
                <th scope="col">tipo de documento</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artistas as $a)
            <tr>
                <th scope="row">{{$a->id}}</th>
                <td><img src="{{asset('storage').'/'.$a->foto}}" width="80px"class="img-fluid rounded-circle border border-5 border-light"></td>
                <td>{{$a->nombre}}</td>
                <td>{{$a->apellido}}</td>
                <td>{{$a->documento}}</td>
                <td>{{$a->email}}</td>
                <td>{{$a->fechaNacimiento}}</td>
                <td>{{$a->iddisqueraFK}}</td>
                <td>{{$a->tipoDocumento}}</td>
               <td>
                    <a class="btn btn-primary" href="{{url('/artista/'.$a->id.'/edit')}}" role="button">Editar</a>
                </td>
                <td>
                    <form action="{{url('/artista/'.$a->id)}}" method="post">
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
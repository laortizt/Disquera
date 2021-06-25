@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h3>Registrar albúm</h3>

    <div class="card" style="width: 15rem; margin: 20px auto;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
            <form action="{{url('/album')}}" method="post" enctype="multipart/form-data" novalidate class="needs-validation">
               
                <!-- se incluye la vista del formulario  -->
                @csrf
                @include('album.form')
                
                </form>
        </div>

        
    </div>
</div>




@endsection
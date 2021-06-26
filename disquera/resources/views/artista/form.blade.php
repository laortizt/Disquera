
<div class="mb-3">

    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($artista->nombre)?$artista->nombre:old('nombre')}}"aria-describedby="nombrehelp" required alpha  minlength="5">

    @error('nombre')
        <small id="nombrehelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
        
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio minimo 5 letras
    </div>
</div>

<div class="mb-3">
    <label for="apellido" class="form-label">Apellido</label>
    <input type="text" name="apellido" id="apellido" class="form-control" value="{{isset($artista->apellido)?$artista->apellido:old('apellido')}}"aria-describedby="apellidohelp" required alpha  minlength="5">

    @error('apellido')
        <small id="apellidohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
        
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio minimo 5 letras
    </div>

</div>
<div class="mb-3">
    <label for="documento" class="form-label">Documento</label>
    <input type="text" name="documento" id="documento" class="form-control" value="{{isset($artista->documento)? $artista->documento : old('documento')}}"aria-describedby="documentohelp" required alpha  minlength="5">

    @error('documento')
        <small id="documentohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
        
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio minimo 5 letras
    </div>

</div>
<div class="mb-3">
    <label for="email" class="form-label">Correo</label>
    <input type="email" name="email" id="email" class="form-control" value="{{isset($artista->email)?$artista->email:old('email')}} "aria-describedby="emailhelp" required >
    @error('correo')
        <small id="emailhelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
       
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio
    </div>

</div>

<div class="mb-3">
    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="{{isset($artista->fechaNacimiento)?$artista->fechaNacimiento:old('fechaNacimiento')}} "aria-describedby="fechaNacimientohelp" required >
    @error('fechaNacimiento')
        <small id="fechaNacimientohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
       
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio
    </div>

</div>

<label for="iddisqueraFK" class="form-label">Seleccione la Disquera</label>
    <!-- <input type="text" name="iddisqueraFK" id="iddisqueraFK" class="form-control" value="{{isset($artista->iddisqueraFK)?$artista->iddisqueraFK:old('idartista')}}"aria-describedby="iddisquerahelp" required > -->
    <select class="form-select" aria-label="Default select example" name='iddisqueraFK' id="iddisqueraFK"
        value = "{{isset($artista->iddisqueraFK)? $artista->iddisqueraFK : old('iddisqueraFK')}}"
        aria-describedby="iddisqueraFKhelp" required>
        <option selected>Selecione una opción</option>

        @foreach($disqueras as $d)
        <option value="{{$d->id}}">{{$d->nombre}}</option>
        @endforeach
    </select>

    @error('idartistaFK')
        <small id="iddisqueraFKhelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
        
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio minimo 5 letras
    </div>



    <div class="mb-3">
    <label for="nombreaArtistico" class="form-label">Nombre artístico</label>
    <input type="text" name="nombreaArtistico" id="nombreaArtistico" class="form-control" value="{{isset($artista->nombreaArtistico)?$artista->nombreaArtistico:old('nombreaArtistico')}}" aria-describedby="nombreaArtisticohelp" required alpha  minlength="5">

    @error('nombreaArtistico')
        <small id="nombreaArtisticohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
        
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio minimo 5 letras
    </div>
</div>

<div class="mb-3">
    <label for="tipoDocumento" class="form-label">tipo de documento</label>
    <input type="text" name="tipoDocumento" id="tipoDocumento" class="form-control" value="{{isset($artista->tipoDocumento)?$artista->tipoDocumento:old('tipoDocumento')}}"aria-describedby="tipoDocumentohelp" required numeric minlength="10" >
    @error('tipoDocumento')
        <small id="tipoDocumentohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
       
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio
    </div>
</div>


<div class="mb-3">
    <label for="foto" class="form-label">Ingrese una foto</label>
    <input type="file" name="foto" id="foto" class="form-control" value="{{isset($artista->foto)?$artista->foto:old('foto')}}"aria-describedby="fotohelp" required mimes:jpg,jpeg,png>
    @error('foto')
        <small id="fotohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    
</div>



<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <input type="submit" value="Guardar" class="btn btn-primary">
</div>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
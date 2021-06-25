
<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($cancion->nombre)?$cancion->nombre:old('nombre')}}"aria-describedby="nombrehelp" required alpha  minlength="5">

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
    <label for="duracion" class="form-label">Duración</label>
    <input type="text" name="duracion" id="duracion" class="form-control" value="{{isset($cancion->duracion)?$cancion->duracion:old('duracion')}}"aria-describedby="duracionhelp" required alpha  minlength="5">

    @error('nombre')
        <small id="duracionhelp" class="form-text text-muted">
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
    <label for="fechaGrabacion" class="form-label">Fecha de grabación</label>
    <input type="date" name="fechaGrabacion" id="fechaGrabacion" class="form-control" value="{{isset($cancion->fechaGrabacion)?$cancion->fechaGrabacion:old('fechaGrabacion')}} "aria-describedby="fechaGrabacionhelp" required >
    @error('fechaGrabacion')
        <small id="fechaGrabacionhelp" class="form-text text-muted">
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
    <label for="idAlbumFK" class="form-label">Album</label>
    <input type="text" name="idAlbumFK" id="idAlbumFK" class="form-control" value="{{isset($cancion->idAlbumFK)?$cancion->idAlbumFK:old('idAlbum')}}"aria-describedby="idAlbumhelp" required >
    @error('idAlbum')
        <small id="idAlbumhelp" class="form-text text-muted">
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
    <label for="estado" class="form-label">Estado</label>
    <input type="text" name="estado" id="estado" class="form-control" value="{{isset($cancion->estado)?$cancion->estado:old('cancion')}}"aria-describedby="$estadohelp" required>

    @error('$estado')
        <small id="$estadohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
        
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio minimo 5 letras
    </div>
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
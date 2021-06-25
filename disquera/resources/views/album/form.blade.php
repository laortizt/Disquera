
<div class="mb-3">
    <label for="nombre" class="form-label">Nombre del album</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{isset($album->nombre)?$album->nombre:old('nombre')}}"aria-describedby="nombrehelp" required alpha  minlength="5">

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
    <label for="anioPublicacion" class="form-label">Año de publicación</label>
    <input type="year" name="anioPublicacion" id="anioPublicacion" class="form-control" value="{{isset($album->anioPublicacion)?$album->anioPublicacion:old('anioPublicacion')}} "aria-describedby="anioPublicacionhelp" required >
    @error('anioPublicacion')
        <small id="anioPublicacionhelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
       
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio
    </div>

</div>
<label for="idartista" class="form-label">Artista</label>
    <input type="text" name="idartista" id="idartista" class="form-control" value="{{isset($album->idartista)?$album->idartista:old('idartista')}}"aria-describedby="idartistahelp" required >

    @error('idartista')
        <small id="idartistahelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
        
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio minimo 5 letras
    </div>

<div class="mb-3">
    <label for="idgenero" class="form-label">Género</label>
    <input type="text" name="idgenero" id="idgenero" class="form-control" value="{{isset($album->idgenero)?$album->idgenero:old('idgenero')}}"aria-describedby="idgenerohelp" required minlength="5" >
    @error('idgenero')
        <small id="idgenerohelp" class="form-text text-muted">
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
    <input type="text" name="estado" id="estado" class="form-control" value="{{isset($album->estado)?$album->estado:old('estado')}}"aria-describedby="estadohelp" required minlength="5" >
    @error('estado')
        <small id="estadohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
       
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio minimo 5 letras
    </div>
</div>
<!-- 
<div class="mb-3">
    <label for="photo" class="form-label">Ingrese una foto</label>
    <input type="file" name="photo" id="photo" class="form-control" value="{{isset($album->photo)?$album->photo:old('photo')}}"aria-describedby="photohelp" required mimes:jpg,jpeg,png>
    @error('foto')
        <small id="photohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    
</div> -->

<!-- <div class="mb-3">
    <label for="accept_terms" class="form-check-label">Aceptar téminos y condiciones</label>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="accept_terms" name="accept_terms">
    </div>
</div> -->

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
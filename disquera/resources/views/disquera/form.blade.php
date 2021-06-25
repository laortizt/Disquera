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
    <label for="direccion" class="form-label">Dirección</label>
    <input type="text" name="direccion" id="direccion" class="form-control" value="{{isset($disquera->direccion)?$disquera->direccion:old('disquera')}}"aria-describedby="$direccionhelp" required>

    @error('$direccion')
        <small id="$direccionhelp" class="form-text text-muted">
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
    <input type="text" name="estado" id="estado" class="form-control" value="{{isset($disquera->estado)?$disquera->estado:old('disquera')}}"aria-describedby="$estadohelp" required>

    @error('$disquera')
        <small id="$disquerahelp" class="form-text text-muted">
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
    <label for="telefono" class="form-label">Telefono</label>
    <input type="text" name="telefono" id="telefono" class="form-control" value="{{isset($disquera->telefono)?$disquera->telefono:old('disquera')}}"aria-describedby="$telefonohelp" required>

    @error('telefono')
        <small id="$telefonohelp" class="form-text text-muted">
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

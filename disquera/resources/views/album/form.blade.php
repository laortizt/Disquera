
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
       *El campo es obligatorio 
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

<div class="mb-3">
    <label for="idartistaFK" class="form-label">Seleccione el artista</label>
    <!-- <input type="text" name="idartistaFK" id="idartistaFK" class="form-control" value="{{isset($album->idartistaFK)?$album->idartistaFK:old('idartistaFK')}}"aria-describedby="idartistahelp" required > -->
    <select class="form-select" aria-label="Default select example" name='idartistaFK' id="idartistaFK"
        value = "{{isset($album->idartistaFK)? $album->idartistaFK : old('idartistaFK')}}"
        aria-describedby="idartistaFKhelp"  required>
        <option selected>Selecione una opción</option>

        @foreach($artistas as $a)
        <option value="{{$a->id}}">{{$a->nombre}} {{$a->apellido}}"</option>
        @endforeach
    
    </select>


    @error('idartistaFK')
        <small id="idartistaFKhelp" class="form-text text-muted">
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
    <label for="idgeneroFK" class="form-label">Seleccione el Género</label>
    <!-- <input type="text" name="idgeneroFK" id="idgeneroFK" class="form-control" value="{{isset($album->idgeneroFK)?$album->idgeneroFK:old('idgeneroFK')}}"aria-describedby="idgenerohelp" required minlength="5" > -->
    <select class="form-select" aria-label="Default select example" name='idgeneroFK' id="idgeneroFK"
        value = "{{isset($album->idgeneroFK)? $album->idgeneroFK : old('idgeneroFK')}}"
        aria-describedby="idgeneroFK"  required>
        <option selected>Selecione una opción</option>

        @foreach($generos as $a)
        <option value="{{$a->id}}">{{$a->nombre}}"</option>
        @endforeach
    
    </select>
    
    
    @error('idgenero')
        <small id="idgenerohelp" class="form-text text-muted">
            *{{$message}}
        </small>
    @enderror
    <div class="valid-feedback">
       
    </div>
    <div class="invalid-feedback">
       *El campo es obligatorio seleccione una opción
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
       *El campo es obligatorio seleccione una opción
    </div>
</div>

<div class="mb-3">
    <label for="foto" class="form-label">Ingrese una foto</label>
    <input type="file" name="foto" id="foto" class="form-control" value="{{isset($album->foto)?$album->foto:old('foto')}}"aria-describedby="fotohelp" required mimes:jpg,jpeg,png>
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
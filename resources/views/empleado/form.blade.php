

@if (count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
    
@endif

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escribe tu nombre...">
</div>

<div class="mb-3">
    <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" placeholder="Escribe tu apellido paterno...">
</div>

<div class="mb-3">
    <label for="apellido_materno" class="form-label">Apellido Materno</label>
    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" placeholder="Escribe tu apellido materno...">
</div>

<div class="mb-3">
    <label for="correo" class="form-label">Correo</label>
    <input type="email" class="form-control" id="correo" name="correo" placeholder="Escribe tu correo...">
</div>

<div class="mb-3">
    <label for="foto" class="form-label">Foto</label>
    <input type="text" class="form-control" id="foto" name="foto">
</div>
<input type="submit" value="Agregar" class="btn btn-primary btn-block">


<a href="{{ url('empleado/') }}" class="btn btn-secondary">Regresar</a>

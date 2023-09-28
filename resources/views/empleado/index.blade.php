
@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <a href="{{ url('empleado/create') }}" class="btn btn-success">Registrar nuevo empleado</a>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->apellido_paterno }}</td>
                <td>{{ $empleado->apellido_materno }}</td>
                <td>{{ $empleado->correo }}</td>
                <td class="text-center"> <!-- Alinea la imagen al centro -->
                    <img src="{{ $empleado->foto }}" alt="Foto del empleado" class="img-thumbnail" width="100">
                </td>
                {{-- <td>
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-primary">Editar</a>
                    |
                    <form action="{{ url('/empleado/'.$empleado->id) }}" method="post" style="display: inline-block;">
                        @csrf
                        {{ method_field('DELETE')  }}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar?')">Borrar</button>
                    </form>
                </td> --}}
                <td>
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-primary">Editar</a>
                    
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $empleado->id }}">Borrar</button>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Centra el paginador horizontalmente -->
    <div class="d-flex justify-content-center">
        {!! $empleados->links() !!}
    </div>
</div>
@endsection


<!-- Modal -->
<!-- Modal de Confirmación de Borrado -->
@foreach ($empleados as $empleado)
<div class="modal fade" id="confirmDeleteModal{{ $empleado->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmación de Borrado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres borrar al empleado: <strong>{{ $empleado->nombre }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="{{ url('/empleado/'.$empleado->id) }}" method="post" style="display: inline-block;">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Fin Modal de Confirmación de Borrado -->

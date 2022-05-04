@extends('layouts.app')
@section('content')
<div class="container">
    @if(Session::has('mensaje'))    
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>    
        </div>
    @endif

    <div class="d-flex bd-highlight mb-3">
        <div class="me-auto p-2 bd-highlight">
            <a href="{{url('jugador/create')}}" class="btn btn-primary">Registrar nuevo jugador</a>
        </div>
        <div class="p-2 bd-highlight"><a href="/exportar_jugadores_excel" class="btn btn-success">Exportar a Excel</a></div>
        <div class="p-2 bd-highlight"><a href="/exportar_jugadores_PDF" class="btn btn-dark">Exportar a PDF</a></div>
    </div>
    <br>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Nro</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Equipo Favorito</th>
                <th>Posicion Preferida</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jugadores as $jugador)
            <tr>
                <td>{{$jugador->id}}</td>
                <td><img src="{{asset('storage').'/'.$jugador->Foto}}" width="150" heigth="250" alt="" class="img-thumbnail img-fluid"></td>
                <td>{{$jugador->Nombre}}</td>
                <td>{{$jugador->Apellido}}</td>
                <td>{{$jugador->FechaDeNacimiento}}</td>
                <td>{{$jugador->Edad}}</td>
                <td>{{$jugador->Sexo}}</td>
                <td>
                    @if($jugador->EquipoFavorito!="Otro")
                        {{$jugador->EquipoFavorito}}
                    @else
                        {{$jugador->OtroEquipo}}
                    @endif
                </td>
                <td>{{$jugador->PosicionPreferida}}</td>
                <td>{{$jugador->Direccion}}</td>
                <td>{{$jugador->Telefono}}</td>
                <td>
                    <a href="{{url('/jugador/'.$jugador->id)}}" class="btn btn-info" id="btn_read">Ver</a>
                    <p></p>
                    <a href="{{url('/jugador/'.$jugador->id.'/edit')}}" class="btn btn-warning">Editar</a>
                    <p></p>
                    <form action="{{url('/jugador/'.$jugador->id)}}" method="post" class="d-inline">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" onclick="return confirm('¿Deseas borrar?')" value="Borrar" class="btn btn-danger"></input>
                    </form>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$jugadores->links()}}
</div>
@endsection
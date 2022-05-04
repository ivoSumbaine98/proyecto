<!DOCTYPE html>
<html>
    <head>
        <title>Generate Pdf</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
            integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    </head>
    <style>
        table {
            font-size: 13px;
        }
        .contain {
            object-fit: contain;
        }
    </style>
    <body>
        <h5 style=><strong>Lista de Jugadores</strong></h5>
        <table class="table table-striped table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Equipo Favorito</th>
                    <th scope="col">Posicion Preferida</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Telefono</th>
                </tr>
            </thead>
            <tbody>
            @foreach($jugadores as $jugador)
                <tr>
                    <td><img src="../public/storage/{{$jugador->Foto}}" width="150" heigth="250" alt=""class="contain"></td>
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
                </tr>
            @endforeach
            </tbody>
        </table>
        
    </body>
</html>
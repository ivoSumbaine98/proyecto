@extends('layouts.app')
@section('content')
<div class="container">
    <body onload="deshabilitar()">    
        <form action="{{url('/jugador/'.$jugador->id)}}" method="post" enctype="multipart/form-data" class="formInscripcionRead" id="formInscripcionRead">
            @csrf
            @include('jugador.form',['modo'=> 'Ver'])
        </form>
    </body>
</div>
@endsection                
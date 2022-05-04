@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{url('/jugador')}}" method="post" enctype="multipart/form-data" class="formInscripcionCreate" id="formInscripcionCreate">
        @csrf
        @include('jugador.form',['modo'=> 'Crear'])
    </form>
</div>
@endsection                
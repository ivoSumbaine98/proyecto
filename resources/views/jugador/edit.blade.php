@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{url('/jugador/'.$jugador->id)}}" method="post" enctype="multipart/form-data" class="formInscripcionEdit" id="formInscripcionEdit">
        @csrf
        {{method_field('PATCH')}}
        @include('jugador.form',['modo'=> 'Editar'])
    </form>
</div>
@endsection     
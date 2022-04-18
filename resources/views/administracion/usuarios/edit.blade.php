@extends('layouts.plantilla')

@section('title')
    Usuarios
@endsection
@section('action')
    <a href="{{route('usuario.index')}}" class="hover:underline ">Usuario</a>
@endsection

@section('content')
    @livewire('administracion.usuario.lw-edit',['id' => $id])
@endsection

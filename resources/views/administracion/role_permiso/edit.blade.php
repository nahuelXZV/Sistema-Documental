@extends('layouts.plantilla')

@section('title')
    Roles y permisos
@endsection
@section('action')
    <a href="{{route('roles.index')}}" class="hover:underline ">Role y permisos</a>
@endsection

@section('content')
    @livewire('administracion.role.lw-edit', ['id' => $id])
@endsection

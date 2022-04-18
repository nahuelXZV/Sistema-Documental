@extends('layouts.plantilla')

@section('title')
    Clinica
@endsection
@section('action')
    <a href="{{route('clinica.index')}}" class="hover:underline ">Clinica</a>
@endsection

@section('content')
    @livewire('medico.clinica.lw-edit', ['id' => $id])
@endsection

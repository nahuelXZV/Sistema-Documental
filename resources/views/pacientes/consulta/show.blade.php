@extends('layouts.plantilla')

@section('title')
    Consultas
@endsection
@section('action')
    <a href="{{ route('consultas.index') }}" class="hover:underline ">Consulta</a>
@endsection

@section('content')
    @livewire('paciente.consulta.lw-show', ['id' => $id])
@endsection

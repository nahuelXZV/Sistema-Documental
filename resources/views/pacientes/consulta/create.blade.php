@extends('layouts.plantilla')

@section('title')
    Consultas
@endsection
@section('action')
    <a href="{{ route('consultas_historial.index') }}" class="hover:underline ">Consultas</a>
@endsection

@section('content')
    @livewire('paciente.consulta.lw-create')
@endsection

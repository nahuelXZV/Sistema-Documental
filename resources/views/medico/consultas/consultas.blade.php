@extends('layouts.plantilla')

@section('title')
    Consultas
@endsection
@section('action')
    <a href="{{ route('consultas.index') }}" class="hover:underline ">Consultas</a>
@endsection

@section('content')
    @livewire('medico.consulta.lw-index')
@endsection

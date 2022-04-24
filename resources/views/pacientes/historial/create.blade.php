@extends('layouts.plantilla')

@section('title')
    Historial
@endsection
@section('action')
    <a href="{{ route('historial.index', $id) }}" class="hover:underline ">Historial</a>
@endsection

@section('content')
    @livewire('paciente.historial.lw-create', ['id' => $id,'reservaid' => $reservaid])
@endsection

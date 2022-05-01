@extends('layouts.plantilla')

@section('title')
    Reservas
@endsection
@section('action')
    <a href="{{ route('paciente.index') }}" class="hover:underline ">Reservas</a>
@endsection

@section('content')
    @livewire('paciente.paciente-reserva.lw-index')
@endsection

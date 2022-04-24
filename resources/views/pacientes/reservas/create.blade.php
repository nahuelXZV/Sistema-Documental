@extends('layouts.plantilla')

@section('title')
    Reservas
@endsection
@section('action')
    <a href="{{ route('reservas.index') }}" class="hover:underline ">Reservas</a>
@endsection

@section('content')
    @livewire('paciente.reserva.lw-create')
@endsection

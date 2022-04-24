@extends('layouts.plantilla')

@section('title')
    Medico Horarios
@endsection
@section('action')
    <a href="{{ route('medico_horario.index') }}" class="hover:underline ">Medicos Horarios</a>
@endsection

@section('content')
    @livewire('medico.medicohorario.lw-create')
@endsection

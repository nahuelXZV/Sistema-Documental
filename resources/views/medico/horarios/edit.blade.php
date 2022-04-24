@extends('layouts.plantilla')

@section('title')
    Horarios
@endsection
@section('action')
    <a href="{{ route('horarios.index') }}" class="hover:underline ">Horarios</a>
@endsection

@section('content')
    @livewire('medico.horario.lw-edit',['id' => $id])
@endsection

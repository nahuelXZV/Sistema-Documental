@extends('layouts.plantilla')

@section('title')
    Especialidades
@endsection
@section('action')
    <a href="{{ route('especialidades.index') }}" class="hover:underline ">Especialidades</a>
@endsection

@section('content')
    @livewire('medico.especialidades.lw-edit', ['id' => $id])
@endsection

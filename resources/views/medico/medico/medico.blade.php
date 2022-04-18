@extends('layouts.plantilla')

@section('title')
Médico
@endsection
@section('action')
    <a href="{{route('medicos.index')}}" class="hover:underline ">Médico</a>
@endsection

@section('content')
    @livewire('medico.medico.lw-index')
@endsection

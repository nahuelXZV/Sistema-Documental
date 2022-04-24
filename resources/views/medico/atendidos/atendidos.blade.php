@extends('layouts.plantilla')

@section('title')
    Atendidos
@endsection
@section('action')
    <a href="{{ route('atendidos.index') }}" class="hover:underline ">Atendidos</a>
@endsection

@section('content')
    @livewire('medico.atendidos.lw-index')
@endsection

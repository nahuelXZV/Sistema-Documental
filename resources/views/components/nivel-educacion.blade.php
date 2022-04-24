@props(['nivelestudio'])
@switch($nivelestudio)
    @case('EI')
        Educación Inicial
    @break

    @case('P')
        Primaria
    @break

    @case('S')
        Secundaria
    @break

    @case('U')
        Universitario
    @break

    @default
        No aplica
@endswitch

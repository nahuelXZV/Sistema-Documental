@props(['estadonutricional'])
@switch($estadonutricional)
    @case('NTD')
        No tiene desnutricion
    @break

    @case('RD')
        Riego de desnutricion
    @break

    @case('DM')
        Desnutricion moderada
    @break

    @case('DG')
        Desnutricion grave
    @break

    @case('SP')
        Sobre peso
    @break

    @default
        Obesidad
@endswitch

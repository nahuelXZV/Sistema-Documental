@props(['tipodocumento'])
@switch($tipodocumento)
    @case('ci')
        C. Identidad
    @break

    @case('pasaporte')
        Pasaporte
    @break

    @case('no porta')
        No porta
    @break

    @case('no tiene')
        No tiene
    @break

    @default
        No se conoce
@endswitch

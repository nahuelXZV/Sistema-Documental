@props(['estadocivil'])
@switch($estadocivil)
    @case('soltero')
        Soltero/a
    @break

    @case('casado')
        Casado/a
    @break

    @case('viudo')
        Viudo/a
    @break

    @case('separado')
        Separado/a
    @break

    @case('divorciado')
        Divorciado/a
    @break

    @default
        Se desconoce
@endswitch

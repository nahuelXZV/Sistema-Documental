<div>
    <x-header-multi>
        <h6 class="font-bold leading-tight text-base text-black">Historial clinico</h6>
        <div>
            @role('medico')
                <a type="button" href="{{ route('historial.edit', $paciente->id) }}"
                    class="mr-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Editar
                </a>
            @endrole
            <a type="button" href="{{ route('pdfs.historial', $paciente->id) }}"
                class="mr-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Descargar
            </a>
        </div>
    </x-header-multi>

    <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
        Datos Generales</h1>
    <div class="grid grid-cols-2 gap-4">
        <div class="form-group  mb-6">
            <label class="form-label inline-block text-gray-900">Apellido y
                Nombre: </label>
            <input type="text" value="{{ $paciente->nombre }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
        <div class="form-group  mb-6 ">
            <label class="form-label inline-block text-gray-900">Fecha
                Nacimiento: </label>
            <input type="text" value="{{ $paciente->fecha_nacimiento }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                Tipo de Documento:</label>
            <input type="text" value="<x-tipo-documento :tipodocumento='$paciente->tipo_documento'></x-tipo-documento>" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
        <div class="form-group  mb-6">
            <label class="form-label inline-block mb-2 text-gray-700">Documento: </label>
            <input type="text" value="{{ $paciente->documento }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
        <div class="form-group mb-6">
            <label class="form-label inline-block mb-2 text-gray-700">
                Telefono: </label>
            <input type="text" value="{{ $paciente->telefono }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                Sexo: </label>
            @if ($paciente->sexo == 'M')
                <input type="text" value="Masculino" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            @else
                <input type="text" value="Femenino" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            @endif
        </div>

        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                Estado civil: </label>
            <input type="text" value="<x-estado-civil :estadocivil='$paciente->estado_civil'></x-estado-civil>" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
        <div class="form-group mb-6">
            <label class="form-label inline-block mb-2 text-gray-700">Situación
                Laboral: </label>
            <input type="text" value="{{ $paciente->situacion_laboral }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
    </div>

    <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-2 text-gray-900">Lugar
        de Nacimiento</h1>
    <div class="grid grid-cols-3 gap-4">
        <div class="form-group mb-6">
            <label class="form-label inline-block mb-2 text-gray-700">País: </label>
            <input type="text" value="{{ $paciente->pais }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

        </div>
        <div class="form-group mb-6">
            <label class="form-label inline-block mb-2 text-gray-700">Departamento:</label>
            <input type="text" value="{{ $paciente->departamento }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">


        </div>
        <div class="form-group mb-6">
            <label class="form-label inline-block mb-2 text-gray-700">Nacionalidad:</label>
            <input type="text" value="{{ $paciente->nacionalidad }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

        </div>
    </div>

    <h1 class="form-label inline-block font-bold mb-2 mt-2 text-gray-900">
        Nivel educativo
    </h1>
    <div class="grid grid-cols-2 gap-4">
        <div class="form-group mb-6">
            <label class="form-label inline-block mb-2 text-gray-700">
                Nivel de estudio:</label>
            <input type="text" value=" <x-nivel-educacion :nivelestudio='$paciente->nivel_educativo'></x-nivel-educacion>" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">


        </div>
        <div class="form-group mb-6">
            <label class="form-label inline-block mb-2 text-gray-700">Año
                cursado:</label>
            <input type="text" value="{{ $paciente->año_cursado }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">

        </div>
    </div>

    <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-2 text-black">
        Datos Residenciales</h1>
    <div class="grid grid-cols-3 gap-4">
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Pais</label>
            <input type="text" value="{{ $residencia->pais }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Departamento</label>
            <input type="text" value="{{ $residencia->departamento }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Barrio</label>
            <input type="text" value="{{ $residencia->barrio }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4">
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Direccion</label>
            <input type="text" value="{{ $residencia->direccion }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Nro Casa</label>
            <input type="text" value="{{ $residencia->nro_casa }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Referencia</label>
            <input type="text" value="{{ $residencia->referencia }}" readonly
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
        </div>
    </div>

    @if ($parentales)
        <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-2 text-black">
            Datos del padre</h1>
        <div class="grid grid-cols-3 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Vinculo: </label>
                <input type="text" value="{{ $parentales->vinculo }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Apellido y
                    nombre: </label>
                <input type="text" value="{{ $parentales->apellido }} {{ $parentales->nombre }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Edad: </label>
                <input type="text" value="{{ $parentales->edad }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Tipo documento:
                </label>
                <input type="text" value="<x-tipo-documento :tipodocumento='$parentales->tipo_documento'></x-tipo-documento>" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Documento: </label>
                <input type="text" value="{{ $parentales->documento }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Estado Civil:
                </label>
                <input type="text" value="<x-estado-civil :estadocivil='$parentales->estado_civil'></x-estado-civil>" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Nivel de estudio:
                </label>
                <input type="text" value="<x-nivel-educacion :nivelestudio='$parentales->nivel_educativo'></x-nivel-educacion>" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Ocupacion: </label>
                <input type="text" value="{{ $parentales->ocupacion }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>
        @if ($parentales->otros)
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                    Otros</label>
                <textarea class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Otros">{{ $parentales->otros }}</textarea>
            </div>
        @endif
    @endif

    @if ($maternales)
        <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-2 text-black">
            Datos de la madre</h1>
        <div class="grid grid-cols-3 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Vinculo: </label>
                <input type="text" value="{{ $maternales->vinculo }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Apellido y
                    nombre: </label>
                <input type="text" value="{{ $maternales->apellido }} {{ $maternales->nombre }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Edad: </label>
                <input type="text" value="{{ $maternales->edad }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Tipo documento:
                </label>
                <input type="text" value="<x-tipo-documento :tipodocumento='$maternales->tipo_documento'></x-tipo-documento>" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Documento: </label>
                <input type="text" value="{{ $maternales->documento }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Estado Civil:
                </label>
                <input type="text" value="<x-estado-civil :estadocivil='$maternales->estado_civil'></x-estado-civil>" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Nivel de estudio:
                </label>
                <input type="text" value="<x-nivel-educacion :nivelestudio='$maternales->nivel_educativo'></x-nivel-educacion>" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Ocupacion: </label>
                <input type="text" value="{{ $maternales->ocupacion }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>
        @if ($maternales->otros)
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                    Otros</label>
                <textarea class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Otros">{{ $maternales->otros }}</textarea>
            </div>
        @endif
    @endif

    @if ($fisicos)
        <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-2 text-black">
            Datos fisicos</h1>
        <div class="grid grid-cols-3 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Pulsos: </label>
                <input type="text" value="{{ $fisicos->pulsos }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">FR: </label>
                <input type="text" value="{{ $fisicos->FR }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">FC: </label>
                <input type="text" value="{{ $fisicos->FC }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">T° Axilar: </label>
                <input type="text" value="{{ $fisicos->t_axilar }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Peso: </label>
                <input type="text" value="{{ $fisicos->peso }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Talla: </label>
                <input type="text" value="{{ $fisicos->talla }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">IMC: </label>
                <input type="text" value="{{ $fisicos->imc }}" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Estado Nutricional:
                </label>
                <input type="text" value="<x-estado-nutricional :estadonutricional='$fisicos->estado_nutricional'></x-estado-nutricional>" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>

        </div>
    @endif
</div>

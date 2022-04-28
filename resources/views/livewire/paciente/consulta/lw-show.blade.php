<div>
    <x-header-multi>
        <h6 class="font-bold leading-tight text-base text-black">Consulta de la fecha {{ $consulta->fecha }}</h6>
        <div>
            @if ($habilitar)
                <a type="button" href="{{ route('consultas_historial.edit', $consulta->id) }}"
                    class="mr-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Iniciar consulta
                </a>
            @else
                <a type="button" href="#"
                    class="mr-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Descargar
                </a>
            @endif
        </div>
    </x-header-multi>

    <ul class="nav nav-pills flex flex-col md:flex-row flex-wrap list-none pl-0 mb-4 mt-4" id="pills-tab3"
        role="tablist">
        <li class="nav-item" role="presentation">
            <button type="button"
                class="nav-link block font-medium text-xs leading-tight uppercase rounded px-6 py-3 my-2 md:mr-2 focus:outline-none focus:ring-0 active"
                id="pills-home-tab3" data-bs-toggle="pill" data-bs-target="#pills-home3" role="tab"
                aria-controls="pills-home3" aria-selected="true">
                Datos generales
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button"
                class="nav-link block font-medium text-xs leading-tight uppercase rounded px-6 py-3 my-2 md:mr-2 focus:outline-none focus:ring-0 "
                id="pills-profile-tab3" data-bs-toggle="pill" data-bs-target="#pills-profile3" role="tab"
                aria-controls="pills-profile3" aria-selected="false">
                Diagnostico y tratamiento
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button"
                class="nav-link block font-medium text-xs leading-tight uppercase rounded px-6 py-3 my-2 md:mr-2 focus:outline-none focus:ring-0 "
                id="pills-contact-tab3" data-bs-toggle="pill" data-bs-target="#pills-contact3" role="tab"
                aria-controls="pills-contact3" aria-selected="false">
                Analisis
            </button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent3">

        <!--  Datos generales -->
        <div class="tab-pane fade show active" id="pills-home3" role="tabpanel" aria-labelledby="pills-home-tab3">
            <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                Datos de la consulta</h1>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group  mb-6">
                    <label class="form-label inline-block text-gray-900">Medico encargado: </label>
                    <input type="text"
                        value="{{ $consulta->ficha->medico->nombre }} {{ $consulta->ficha->medico->apellido }}"
                        readonly
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Especialidad: </label>
                    <input type="text" value="{{ $consulta->ficha->especialidad->nombre }}" readonly
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group  mb-6">
                    <label class="form-label inline-block text-gray-900">Dia: </label>
                    <input type="text" value="{{ $consulta->ficha->horario->dia }}" readonly
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Hora: </label>
                    <input type="text"
                        value="{{ $consulta->ficha->horario->hora_inicio }} - {{ $consulta->ficha->horario->hora_fin }}"
                        readonly
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
            </div>

            @if ($anamnesis)
                <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                    Anamnesis</h1>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Motivo de ingreso: </label>
                    <textarea readonly class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4">{{ $anamnesis->motivo_ingreso }}</textarea>
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Motivo de consulta: </label>
                    <textarea readonly class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4">{{ $anamnesis->motivo_consulta }}</textarea>
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Antecedentes de la enfermedad actual: </label>
                    <textarea readonly class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4">{{ $anamnesis->antecedentes_actuales }}</textarea>
                </div>
            @endif


            @if ($anamnesis_patologicos)
                <label for="exampleInputEmail2"
                    class="col-span-3 form-label inline-block mb-2 text-gray-700">Antecedentes
                    patologicos</label>
                <div class="form-group mb-6  grid grid-cols-3 gap-4">
                    @foreach ($anamnesis_patologicos as $patologico)
                        <label class="mb-2">
                            <input type="text" value="{{ $patologico->antecedentes_patologicos->nombre }}" readonly
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        </label>
                    @endforeach
                </div>
            @endif


            @if ($habitos)
                <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                    Habitos</h1>
                <div class="grid grid-cols-3 gap-4">
                    <div class="form-group  mb-6">
                        <label class="form-label inline-block text-gray-900">Alimentarios: </label>
                        <input type="text" readonly value="{{ $habitos->alimenticio }}"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                    <div class="form-group  mb-6 ">
                        <label class="form-label inline-block text-gray-900">Defecatorios: </label>
                        <input type="text" readonly value="{{ $habitos->defecatorio }}"
                            class="form-control block  w-full px-3 py-1.5  text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                    <div class="form-group  mb-6 ">
                        <label class="form-label inline-block text-gray-900">Urinarios: </label>
                        <input type="text" readonly value="{{ $habitos->urinario }}"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="form-group  mb-6">
                        <label class="form-label inline-block text-gray-900">Actividad fisica: </label>
                        <input type="text" readonly value="{{ $habitos->actividad_fisica }}"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                    <div class="form-group  mb-6 ">
                        <label class="form-label inline-block text-gray-900">Tiempo: </label>
                        <input type="text" readonly value="{{ $habitos->tiempo }}"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                    <div class="form-group  mb-6 ">
                        <label class="form-label inline-block text-gray-900">Frecuencia: </label>
                        <input type="text" readonly value="{{ $habitos->frecuencia }}"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Otros: </label>
                    <textarea class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4" placeholder="Otros"> {{ $habitos->otros }} </textarea>
                </div>
            @endif

            @if ($causa_traumatismo)
                <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                    Causa externa de traumatismo</h1>
                <div class="grid grid-cols-3 gap-4">
                    <div class="form-group  mb-6">
                        <label class="form-label inline-block text-gray-900">Tipo de causa: </label>
                        <input type="text" readonly value="{{ $causa_traumatismo->tipo_causa }}"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                    <div class="form-group  mb-6 ">
                        <label class="form-label inline-block text-gray-900">Causa: </label>
                        <input type="text" readonly value="{{ $causa_traumatismo->descripcion }}"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                    <div class="form-group  mb-6 ">
                        <label class="form-label inline-block text-gray-900">Sitio de ocurrencia: </label>
                        <input type="text" readonly value="{{ $causa_traumatismo->sitio_recurrencia }}"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                </div>
            @endif
        </div>

        <!--  Diagnostico y tratamiento -->

        <div class="tab-pane fade" id="pills-profile3" role="tabpanel" aria-labelledby="pills-profile-tab3">
            <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                Diagnostico y Tratamiento</h1>
            @if ($diagnostico)
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Principal: </label>
                    <textarea class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4" placeholder="Otros"> {{ $diagnostico->principal }} </textarea>
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Secundarios: </label>
                    <textarea class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4" placeholder="Otros"> {{ $diagnostico->secundario }} </textarea>
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Justificacion: </label>
                    <textarea class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4" placeholder="Otros"> {{ $diagnostico->justificacion }} </textarea>
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Plan de trabajo: </label>
                    <textarea class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4" placeholder="Otros"> {{ $diagnostico->plan_trabajo }} </textarea>
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Tratamiento: </label>
                    <textarea class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4" placeholder="Otros"> {{ $diagnostico->tratamiento }} </textarea>
                </div>
            @endif
        </div>
        <!--  Analisis -->
        <div class="tab-pane fade" id="pills-contact3" role="tabpanel" aria-labelledby="pills-contact-tab3">

            <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                Analisis</h1>
            @if ($analisis)
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group  mb-6">
                        <label class="form-label inline-block text-gray-900">Tipo de analisis: </label>
                        <input type="text" value="{{ $analisis->tipo }}" readonly
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                    <div class="form-group  mb-6 ">
                        <label class="form-label inline-block text-gray-900">Fecha: </label>
                        <input type="text" value="{{ $analisis->fecha }}" readonly
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    </div>
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Observaciones: </label>
                    <textarea class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        cols="50" rows="4" placeholder="Otros"> {{ $analisis->descripcion }}</textarea>
                </div>
            @endif

            @if ($pdfs || $imagenes)
                <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                    Archivos PDF</h1><br>
                @foreach ($pdfs as $pdf)
                    <a href="{{ asset($pdf->dir) }}" target="_blank">{{ $pdf->nombre }}</a> <br>
                @endforeach
                <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                    Archivos de imagen</h1><br>
                <div class="flex">
                    @foreach ($imagenes as $imagen)
                        <div class="ml-8">
                            <label class="form-label mr-4 inline-block text-gray-900">{{ $imagen->nombre }}
                            </label><br>
                            <img src="{{ asset($imagen->dir) }}" class="img-fluid" alt="" height="200"
                                width="300" />
                        </div>
                    @endforeach
                </div>
            @endif


        </div>
    </div>
</div>

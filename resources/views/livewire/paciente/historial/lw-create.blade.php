<div>

    <x-header-multi>
        <h6 class="font-bold leading-tight text-base text-black">Crear historial clinico</h6>
    </x-header-multi>
    <div class="accordion mt-4" id="accordionExample5">

        <div class="accordion-item bg-white border border-gray-200">
            <h2 class="accordion-header mb-0" id="headingOne5">
                <button
                    class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left  bg-white border-0 rounded-none transition focus:outline-none"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne5" aria-expanded="true"
                    aria-controls="collapseOne5">
                    Datos Generales del Paciente
                </button>
            </h2>
            <div id="collapseOne5" class="accordion-collapse collapse show" aria-labelledby="headingOne5">
                <div class="accordion-body py-4 px-5">

                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Apellido y
                                Nombre</label>
                            <input type="text" wire:model.defer='generales.nombre' name="apellido"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Apellido y Nombre">
                            <x-jet-input-error for="generales.nombre" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Fecha
                                Nacimiento</label>
                            <input type="date" wire:model.defer='generales.fecha_nacimiento' name="fecha_nacimiento"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Fecha nacimiento">
                            <x-jet-input-error for="generales.fecha_nacimiento" />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Selecciona un tipo de documento</label>
                            <select wire:model.defer='generales.tipo_documento' name="tipo_documento"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona un documento</option>
                                <option value="ci">C. Identidad</option>
                                <option value="pasaporte">Pasaporte</option>
                                <option value="no porta">No porta</option>
                                <option value="no tiene">No tiene</option>
                                <option value="no se conoce">No se conoce</option>
                            </select>
                            <x-jet-input-error for="generales.tipo_documento" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Documento</label>
                            <input type="text" wire:model.defer='generales.documento' name="documento"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Documento">
                            <x-jet-input-error for="generales.documento" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Telefono</label>
                            <input type="text" wire:model.defer='generales.telefono' name="telefono"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Telefono">
                            <x-jet-input-error for="generales.telefono" />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Selecciona el sexo</label>
                            <select wire:model.defer='generales.sexo' name="sexo"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona el sexo</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                            <x-jet-input-error for="generales.sexo" />
                        </div>

                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Selecciona el estado civil</label>
                            <select wire:model.defer='generales.estado_civil' name="estado_civil"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona el estado civil</option>
                                <option value="soltero">Soltero/a</option>
                                <option value="casado">Casado/a</option>
                                <option value="viudo">Viudo/a</option>
                                <option value="separado">Separado/a</option>
                                <option value="divorciado">Divorciado/a</option>
                                <option value="desconoce">Se desconoce</option>
                            </select>
                            <x-jet-input-error for="generales.estado_civil" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Situación
                                Laboral</label>
                            <input type="text" wire:model.defer='generales.situacion_laboral' name="situacion_laboral"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Situación Laboral">
                            <x-jet-input-error for="generales.situacion_laboral" />
                        </div>

                    </div>

                    <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-2 text-gray-900">Lugar
                        de Nacimiento</h1>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">País</label>
                            <input type="text" wire:model.defer='generales.pais' name="pais"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Pais">
                            <x-jet-input-error for="generales.pais" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Departamento</label>
                            <input type="text" wire:model.defer='generales.departamento' name="departamento"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Departamento">
                            <x-jet-input-error for="generales.departamento" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Nacionalidad</label>
                            <input type="text" wire:model.defer='generales.nacionalidad' name="nacionalidad"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Nacionalidad">
                            <x-jet-input-error for="generales.nacionalidad" />
                        </div>
                    </div>

                    <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-2 text-gray-900">
                        Nivel educativo
                    </h1>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Nivel de estudio</label>
                            <select wire:model.defer='generales.nivel_educativo' name="nivel_educativo"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona el nivel de estudio</option>
                                <option value="EI">Educación Inicial</option>
                                <option value="P">Primaria</option>
                                <option value="S">Secundaria</option>
                                <option value="U">Universitario</option>
                                <option value="NA">No aplica</option>
                            </select>
                            <x-jet-input-error for="nivel_educativo" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Año
                                cursado</label>
                            <input type="text" wire:model.defer='generales.año_cursado' name="año_cursado"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Año cursado">
                            <x-jet-input-error for="año_cursado" />
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="accordion-item bg-white border border-gray-200">
            <h2 class="accordion-header mb-0" id="headingThree5">
                <button
                    class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left  bg-white border-0 rounded-none transition focus:outline-none"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree5" aria-expanded="false"
                    aria-controls="collapseThree5">
                    Residencia
                </button>
            </h2>
            <div id="collapseThree5" class="accordion-collapse collapse" aria-labelledby="headingThree5">
                <div class="accordion-body py-4 px-5">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Pais</label>
                            <input type="text" wire:model.defer='residencia.pais' name="pais"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Pais">
                            <x-jet-input-error for="residencia.pais" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Departamento</label>
                            <input type="text" wire:model.defer='residencia.departamento' name="departamento"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Departamento">
                            <x-jet-input-error for="residencia.departamento" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Barrio</label>
                            <input type="text" wire:model.defer='residencia.barrio' name="barrio"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Nacionalidad">
                            <x-jet-input-error for="residencia.barrio" />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Direccion</label>
                            <input type="text" wire:model.defer='residencia.direccion' name="direccion"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Direccion">
                            <x-jet-input-error for="residencia.direccion" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Nro
                                Casa</label>
                            <input type="number" wire:model.defer='residencia.nro_casa' name="nro_casa"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Nro Casa">
                            <x-jet-input-error for="residencia.nro_casa" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Referencia</label>
                            <input type="text" wire:model.defer='residencia.referencia' name="referencia"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Referencia">
                            <x-jet-input-error for="residencia.referencia" />
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="accordion-item bg-white border border-gray-200">
            <h2 class="accordion-header mb-0" id="headingTwo5">
                <button
                    class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left  bg-white border-0 rounded-none transition focus:outline-none"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="false"
                    aria-controls="collapseTwo5">
                    Datos Parentales
                </button>
            </h2>
            <div id="collapseTwo5" class="accordion-collapse collapse" aria-labelledby="headingTwo5">
                <div class="accordion-body py-4 px-5">

                    <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-2 text-gray-900">
                        Datos Padre</h1>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Apellido</label>
                            <input type="text" wire:model.defer='parentales.apellido' name="apellido"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Last name">
                            <x-jet-input-error for="parentales.apellido" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Nombre</label>
                            <input type="text" wire:model.defer='parentales.nombre' name="nombre"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="First name">
                            <x-jet-input-error for="parentales.nombre" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Edad</label>
                            <input type="number" wire:model.defer='parentales.edad' name="edad"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Edad">
                            <x-jet-input-error for="parentales.edad" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Selecciona un tipo de documento</label>
                            <select wire:model.defer='parentales.tipo_documento' name="tipo_documento"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona un documento</option>
                                <option value="ci">C. Identidad</option>
                                <option value="pasaporte">Pasaporte</option>
                                <option value="no porta">No porta</option>
                                <option value="no tiene">No tiene</option>
                                <option value="no se conoce">No se conoce</option>
                            </select>
                            <x-jet-input-error for="parentales.tipo_documento" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Documento</label>
                            <input type="text" wire:model.defer='parentales.documento' name="documento"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Documento">
                            <x-jet-input-error for="parentales.documento" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Selecciona el estado civil</label>
                            <select wire:model.defer='parentales.estado_civil' name="estado_civil"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona el estado civil</option>
                                <option value="soltero">Soltero/a</option>
                                <option value="casado">Casado/a</option>
                                <option value="viudo">Viudo/a</option>
                                <option value="separado">Separado/a</option>
                                <option value="divorciado">Divorciado/a</option>
                                <option value="desconoce">Se desconoce</option>
                            </select>
                            <x-jet-input-error for="parentales.estado_civil" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Nivel de estudio</label>
                            <select wire:model.defer='parentales.nivel_educativo' name="nivel_educativo"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona el nivel de estudio</option>
                                <option value="EI">Educación Inicial</option>
                                <option value="P">Primaria</option>
                                <option value="S">Secundaria</option>
                                <option value="U">Universitario</option>
                                <option value="NA">No aplica</option>
                            </select>
                            <x-jet-input-error for="parentales.nivel_educativo" />
                        </div> 
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Ocupacion</label>
                            <input type="text" wire:model.defer='parentales.ocupacion' name="ocupacion"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Ocupacion">
                            <x-jet-input-error for="parentales.ocupacion" />
                        </div>
                    </div>
                    <div class="form-control mb-6 ">
                        <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Otros datos
                            de interes</label>
                        <textarea wire:model.defer='parentales.otros' name="otros"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            cols="50" rows="4" placeholder="Otros"></textarea>
                        <x-jet-input-error for="parentales.otros" />
                    </div>
                    <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-2 text-gray-900">
                        Datos Madre</h1>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Apellido</label>
                            <input type="text" wire:model.defer='maternales.apellido' name="apellido"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Last name">
                            <x-jet-input-error for="maternales.apellido" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Nombre</label>
                            <input type="text" wire:model.defer='maternales.nombre' name="nombre"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="First name">
                            <x-jet-input-error for="maternales.nombre" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Edad</label>
                            <input type="number" wire:model.defer='maternales.edad' name="edad"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Edad">
                            <x-jet-input-error for="maternales.edad" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Selecciona un tipo de documento</label>
                            <select wire:model.defer='maternales.tipo_documento' name="tipo_documento"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona un documento</option>
                                <option value="ci">C. Identidad</option>
                                <option value="pasaporte">Pasaporte</option>
                                <option value="no porta">No porta</option>
                                <option value="no tiene">No tiene</option>
                                <option value="no se conoce">No se conoce</option>
                            </select>
                            <x-jet-input-error for="maternales.tipo_documento" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Documento</label>
                            <input type="text" wire:model.defer='maternales.documento' name="documento"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Documento">
                            <x-jet-input-error for="maternales.documento" />
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Selecciona el estado civil</label>
                            <select wire:model.defer='maternales.estado_civil' name="estado_civil"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona el estado civil</option>
                                <option value="soltero">Soltero/a</option>
                                <option value="casado">Casado/a</option>
                                <option value="viudo">Viudo/a</option>
                                <option value="separado">Separado/a</option>
                                <option value="divorciado">Divorciado/a</option>
                                <option value="desconoce">Se desconoce</option>
                            </select>
                            <x-jet-input-error for="maternales.estado_civil" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Nivel de estudio</label>
                            <select wire:model.defer='maternales.nivel_educativo' name="nivel_educativo"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona el nivel de estudio</option>
                                <option value="EI">Educación Inicial</option>
                                <option value="P">Primaria</option>
                                <option value="S">Secundaria</option>
                                <option value="U">Universitario</option>
                                <option value="NA">No aplica</option>
                            </select>
                            <x-jet-input-error for="maternales.nivel_educativo" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Ocupacion</label>
                            <input type="text" wire:model.defer='maternales.ocupacion' name="ocupacion"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Ocupacion">
                            <x-jet-input-error for="maternales.ocupacion" />
                        </div>
                    </div>
                    <div class="form-control mb-6 ">
                        <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Otros datos
                            de interes</label>
                        <textarea wire:model.defer='maternales.otros' name="otros"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            cols="50" rows="4" placeholder="Otros"></textarea>
                        <x-jet-input-error for="maternales.otros" />
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item bg-white border border-gray-200">
            <h2 class="accordion-header mb-0" id="headingfour5">
                <button
                    class="accordion-button relative flex items-center w-full py-4 px-5 text-base text-gray-800 text-left  bg-white border-0 rounded-none transition focus:outline-none"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree6" aria-expanded="false"
                    aria-controls="collapseThree6">
                    Exámen Físico
                </button>
            </h2>
            <div id="collapseThree6" class="accordion-collapse collapse" aria-labelledby="headingfour5">
                <div class="accordion-body py-4 px-5">

                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Pulsos</label>
                            <input type="text" wire:model.defer='fisicos.pulsos' name="pulsos"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Pulsos">
                            <x-jet-input-error for="fisicos.pulsos" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                FR</label>
                            <input type="text" wire:model.defer='fisicos.FR' name="FR"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="FR">
                            <x-jet-input-error for="fisicos.FR" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">FC</label>
                            <input type="text" wire:model.defer='fisicos.FC' name="FC"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="FC">
                            <x-jet-input-error for="fisicos.FC" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">T°
                                Axilar</label>
                            <input type="text" wire:model.defer='fisicos.t_axilar' name="t_axilar"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="T° Axilar">
                            <x-jet-input-error for="fisicos.t_axilar" />
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Peso</label>
                            <input type="text" wire:model.defer='fisicos.peso' name="peso"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Peso">
                            <x-jet-input-error for="fisicos.peso" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Talla</label>
                            <input type="text" wire:model.defer='fisicos.talla' name="talla"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Talla">
                            <x-jet-input-error for="fisicos.talla" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">IMC</label>
                            <input type="text" wire:model.defer='fisicos.imc' name="imc"
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="IMC">
                            <x-jet-input-error for="fisicos.imc" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                                Estado Nutricional</label>
                            <select wire:model.defer='fisicos.estado_nutricional' name="estado_nutricional"
                                class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona el estado nutricional</option>
                                <option value="NTD">No tiene desnutricion</option>
                                <option value="RD">Riego de desnutricion</option>
                                <option value="DM">Desnutricion moderada</option>
                                <option value="DG">Desnutricion grave</option>
                                <option value="SP">Sobre peso</option>
                                <option value="O">Obesidad</option>
                            </select>
                            <x-jet-input-error for="fisicos.estado_nutricional" />
                        </div>
                    </div>

                    <div class="form-control mb-6 ">
                        <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Otros datos
                            de interes</label>
                        <textarea wire:model.defer='fisicos.otros' name="otros"
                            class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            cols="50" rows="4" placeholder="Otros"></textarea>
                        <x-jet-input-error for="fisicos.otros" />
                    </div>

                </div>
            </div>
        </div>

        <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start p-4 border-t border-gray-200 rounded-b-md">
            <a type="button" href="{{ route('consultas.index') }}"
                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">Cerrar</a>
            <button type="button" wire:click="limpiar" wire:loading.attr="disabled"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                Limpiar</button>
            <button type="button" wire:click="add()" wire:loading.attr="disabled"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                Guardar Todo</button>
        </div>

    </div>

</div>

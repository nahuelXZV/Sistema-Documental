<div>
    <x-header-multi>
        <h6 class="font-bold leading-tight text-base text-black">Editar Consulta</h6>
        <div class="m-1 flex flex-row text-right">
            <a type="button" wire:click='add()'
                class="mr-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                Terminar
            </a>
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
                Anamnesis</h1>
            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Motivo de ingreso* </label>
                <textarea wire:model.defer='anamnesis.motivo_ingreso' name="motivo_ingreso"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Motivo de ingreso"></textarea>
                <x-jet-input-error for="anamnesis.motivo_ingreso" />
            </div>
            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Motivo de consulta* </label>
                <textarea wire:model.defer='anamnesis.motivo_consulta' name="motivo_consulta"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Motivo de consulta"></textarea>
                <x-jet-input-error for="anamnesis.motivo_consulta" />
            </div>
            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Antecedentes de la enfermedad actual* </label>
                <textarea wire:model.defer='anamnesis.antecedentes_actuales' name="antecedentes_actuales"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Antecedentes de la enfermedad actual"></textarea>
                <x-jet-input-error for="anamnesis.antecedentes_actuales" />
            </div>

            <div class="form-group mb-6  grid grid-cols-1 md:grid-cols-2">
                <label for="exampleInputEmail2"
                    class="col-span-1 md:col-span-2 form-label inline-block mb-2 text-gray-700">Seleccione los
                    antecedentes*</label>
                @foreach ($antecedentes as $antecedente)
                    <label class="w-72">
                        <input wire:model.defer='anamnesis_patologicos' type="checkbox"
                            value="{{ $antecedente->id }}">
                        {{ $antecedente->nombre }}
                    </label>
                @endforeach
                <x-jet-input-error for="anamnesis_patologicos" />
            </div>

            <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                Habitos</h1>

            <div class="grid grid-cols-3 gap-4">
                <div class="form-group  mb-6">
                    <label class="form-label inline-block text-gray-900">Alimentarios: </label>
                    <input type="text" wire:model.defer='habitos.alimenticio' name="alimenticio"
                        placeholder="Alimentarios"
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <x-jet-input-error for="habitos.alimenticio" />
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Defecatorios: </label>
                    <input type="text" wire:model.defer='habitos.defecatorio' name="defecatorio"
                        placeholder="Defecatorios"
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <x-jet-input-error for="habitos.defecatorio" />
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Urinarios: </label>
                    <input type="text" wire:model.defer='habitos.urinario' name="urinario" placeholder="Urinarios"
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <x-jet-input-error for="habitos.urinario" />
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                        Actividad fisica</label>
                    <select wire:model.defer='habitos.actividad_fisica' name="actividad_fisica"
                        class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label=".form-select-sm example">
                        <option selected value="">Selecciona un opcion</option>
                        <option value="Si">Si</option>
                        <option value="No">No</option>
                    </select>
                    <x-jet-input-error for="habitos.actividad_fisica" />
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Tiempo: </label>
                    <input type="text" wire:model.defer='habitos.tiempo' name="tiempo" placeholder="Tiempo"
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <x-jet-input-error for="habitos.tiempo" />
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Frecuencia: </label>
                    <input type="text" wire:model.defer='habitos.frecuencia' name="frecuencia" placeholder="Frecuencia"
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <x-jet-input-error for="habitos.frecuencia" />
                </div>
            </div>
            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Otros: </label>
                <textarea wire:model.defer='habitos.otros' name="otros"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Otros"></textarea>
            </div>


            <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                Causa externa de traumatismo</h1>

            <div class="grid grid-cols-3 gap-4">
                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                        Tipo de causa*</label>
                    <select wire:model.defer='causa_traumatismo.tipo_causa' name="tipo_causa"
                        class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label=".form-select-sm example">
                        <option selected value="">Selecciona un opcion</option>
                        <option value="Accidente de transito">Acciodente de transito</option>
                        <option value="Agresión">Agresion</option>
                        <option value="Lesión autoinflingida">Lesion autoinflingida</option>
                        <option value="Quemadura">Quemadura</option>
                    </select>
                    <x-jet-input-error for="causa_traumatismo.tipo_causa" />
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Causa* </label>
                    <input type="text" wire:model.defer='causa_traumatismo.descripcion' name="descripcion"
                        placeholder="Causa"
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <x-jet-input-error for="causa_traumatismo.descripcion" />
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Sitio de ocurrencia* </label>
                    <select wire:model.defer='causa_traumatismo.sitio_recurrencia' name="sitio_recurrencia"
                        class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label=".form-select-sm example">
                        <option selected value="">Selecciona un opcion</option>
                        <option value="Hogar">Hogar</option>
                        <option value="Escuela">Escuela</option>
                        <option value="Trabajo">Trabajo</option>
                        <option value="Lugar de recreo">Lugar de recreo</option>
                        <option value="Via publica">Via publica</option>
                    </select>
                    <x-jet-input-error for="causa_traumatismo.sitio_recurrencia" />
                </div>
            </div>
        </div>


        <!--  Diagnostico y tratamiento -->
        <div class="tab-pane fade" id="pills-profile3" role="tabpanel" aria-labelledby="pills-profile-tab3">
            <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                Diagnostico y Tratamiento</h1>

            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Principal* </label>
                <textarea wire:model.defer='diagnostico.principal' name="principal"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Principal"></textarea>
                <x-jet-input-error for="diagnostico.principal" />
            </div>

            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Secundarios: </label>
                <textarea wire:model.defer='diagnostico.secundario' name="secundario"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Secundarios"></textarea>
                <x-jet-input-error for="diagnostico.secundario" />
            </div>
            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Justificacion: </label>
                <textarea wire:model.defer='diagnostico.justificacion' name="justificacion"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Justificacion"></textarea>
                <x-jet-input-error for="diagnostico.justificacion" />
            </div>
            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Plan de trabajo* </label>
                <textarea wire:model.defer='diagnostico.plan_trabajo' name="plan_trabajo"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Plan de trabajo"></textarea>
                <x-jet-input-error for="diagnostico.plan_trabajo" />
            </div>
            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Tratamiento* </label>
                <textarea wire:model.defer='diagnostico.tratamiento' name="tratamiento"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Tratamiento"></textarea>
                <x-jet-input-error for="diagnostico.tratamiento" />
            </div>
        </div>

        <!--  Analisis -->
        <div class="tab-pane fade" id="pills-contact3" role="tabpanel" aria-labelledby="pills-contact-tab3">

            <h1 for="exampleInputEmail2" class="form-label inline-block font-bold mb-2 mt-4 text-black">
                Analisis</h1>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group  mb-6">
                    <label class="form-label inline-block text-gray-900">Tipo de analisis* </label>
                    <input type="text" wire:model.defer='analisis.tipo' name="tipo" placeholder="Tipo de analisis"
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <x-jet-input-error for="analisis.tipo" />
                </div>
                <div class="form-group  mb-6 ">
                    <label class="form-label inline-block text-gray-900">Fecha* </label>
                    <input type="date" wire:model.defer='analisis.fecha' name="fecha" placeholder="Tipo de analisis"
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <x-jet-input-error for="analisis.fecha" />
                </div>
            </div>
            <div class="form-group  mb-6 ">
                <label class="form-label inline-block text-gray-900">Observaciones* </label>
                <textarea wire:model.defer='analisis.descripcion' name="descripcion"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    cols="50" rows="4" placeholder="Observaciones"></textarea>
                <x-jet-input-error for="analisis.descripcion" />
            </div>
            <div class="form-group  mb-6 ">
                <div class="flex justify-start">
                    <div class="mb-3 w-96">
                        <label for="formFileMultiple" class="form-label inline-block mb-2 text-gray-700">
                            Subir Imagenes</label>
                        <input wire:model='imagenes'
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            type="file" id="formFileMultiple" multiple>
                        <div class="flex flex-col">
                            @foreach ($imagenes as $imagen)
                                <img src="{{ $imagen->temporaryURL() }}" width="200" height="200"
                                    class="img-fluid">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group  mb-6 ">
                <div class="flex justify-start">
                    <div class="mb-3 w-96">
                        <label for="formFileMultiple" class="form-label inline-block mb-2 text-gray-700">
                            Subir PDF</label>
                        <input wire:model='pdfs'
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            type="file" id="formFileMultiple" multiple>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom scripts -->
    <script type="text/javascript">
        const checkbox = document.getElementById("flexCheckIndeterminate");
        checkbox.indeterminate = true;
    </script>
</div>

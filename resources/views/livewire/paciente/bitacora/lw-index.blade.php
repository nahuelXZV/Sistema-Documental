<div class="m-1">
    <x-header-table>
        <div class="container-fluid flex flex-wrap">
            <div class="m-1">
                <select wire:model='pagination'
                    class="w-32 px-3 py-1.5 text-base font-normal text-gray-700  bg-white  border border-solid border-gray-300 focus:border-blue-600">
                    <option selected value="10">Paginar</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>


        </div>

    </x-header-table>
    <x-table>
        <table class="min-w-full">
            @if ($auditorias->count())
                <thead class="border-b bg-gray-800 ">
                    <tr>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Fecha y Hora
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Medico
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Evento
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($auditorias as $auditoria)
                        <tr class="bg-white border-b">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $auditoria->created_at }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $auditoria->Mnombre }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $auditoria->evento }}</td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <span>No hay resultados...</span>
            @endif
        </table>
        <x-pagination :modelo='$auditorias'> </x-pagination>
    </x-table>

</div>

<div>
    <div class="mt-1">
        <button type="button" wire:click.prevent="add({{$i}})" class="items-center mx-auto mb-5 px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
            Añadir Participante
        </button>
    </div>

    <table class="w-full text-sm text-left text-slate-500">
        <thead class="text-xs text-slate-700 uppercase bg-slate-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre completo
                </th>
                <th scope="col" class="px-6 py-3">
                    Rol
                </th>
                <th scope="col" class="px-6 py-3">
                    Actividad
                </th>
                <th scope="col" class="px-6 py-3">
                    Puesto
                </th>
                <th scope="col" class="px-6 py-3">
                    Codigo (si aplica)
                </th>
                <th scope="col" class="px-6 py-3"></th>
            </tr>
        </thead>

        <tbody>
            <!-- Primer Participante -->
            <tr class="bg-white border-b border-slate-200">
                <td class="px-6 py-4">
                    <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Nombre del participante" wire:model="nombre.0">
                </td>
                <td class="px-6 py-4">
                    <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Rol del participante" wire:model="rol.0">
                </td>
                <td class="px-6 py-4">
                    <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Actividad que realizara" wire:model="actividad.0">
                </td>
                <td class="px-6 py-4">
                    <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Puesto del participante" wire:model="puesto.0">
                </td>
                <td class="px-6 py-4">
                    <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Codigo de UDG" wire:model="codigo.0">
                </td>
            </tr>

            <!-- Participantes agregados -->
            @foreach ($inputs as $key => $value)
                <tr class="bg-white border-b border-slate-200">
                    <td class="px-6 py-4">
                        <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Nombre del participante" wire:model="nombre.{{ $value }}">
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Rol del participante" wire:model="rol.{{ $value }}">
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Actividad que realizara" wire:model="actividad.{{ $value }}">
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Puesto del participante" wire:model="puesto.{{ $value }}">
                    </td>
                    <td class="px-6 py-4">
                        <input type="text" class="bg-gray-50 border border-slate-300 text-slate-900 text-sm rounded-lg block w-full" placeholder="Codigo de UDG" wire:model="codigo.{{ $value }}">
                    </td>
                    <td class="px-6 py-4">
                        <button type="button" wire:click.prevent="remove({{$key}})" class="add-btn inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <!--
    <button type="button" wire:click="add" class="add-btn inline-flex items-center mt-4 px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
        Guardar
    </button>
    -->
</div>


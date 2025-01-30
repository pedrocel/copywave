<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Adicionar Domínio
        </h2>
    </x-slot>

    <div class="container mx-4">
        <form action="{{ route('cliente.domains.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
            @csrf

            {{-- Domínio --}}
            <div class="mb-4">
                <label for="domain" class="block text-gray-700 dark:text-gray-200 font-medium">Domínio</label>
                <input 
                    type="text" 
                    name="domain" 
                    id="domain" 
                    class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" 
                    value="{{ old('domain') }}" 
                    required>
                @error('domain')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botões --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    Salvar
                </button>
                <a href="{{ route('cliente.domains.index') }}" class="ml-4 text-gray-600 dark:text-gray-400 hover:underline">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
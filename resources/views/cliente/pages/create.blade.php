<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Nova Página
        </h2>
    </x-slot>

    <div class="container mx-4">
        <form action="{{ route('cliente.pages.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
            @csrf

            {{-- Nome --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-200 font-medium">Nome</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" 
                    value="{{ old('name') }}" 
                    required>
                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- URL da Página --}}
            <div class="mb-4">
                <label for="url_page" class="block text-gray-700 dark:text-gray-200 font-medium">URL da Página</label>
                <input 
                    type="url" 
                    name="url_page" 
                    id="url_page" 
                    class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" 
                    value="{{ old('url_page') }}" 
                    required>
                @error('url_page')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Modificações --}}
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 font-medium">Modificações</label>
                <div id="modifications-container">
                    <div class="modification mb-2">
                        <select name="modifications[0][type]" class="border border-gray-300 dark:border-gray-700 rounded px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                            <option value="link">Link</option>
                            <option value="image">Imagem</option>
                            <option value="script">Script</option>
                        </select>
                        <input type="text" name="modifications[0][old_value]" placeholder="Valor Antigo" class="border border-gray-300 dark:border-gray-700 rounded px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                        <input type="text" name="modifications[0][new_value]" placeholder="Novo Valor" class="border border-gray-300 dark:border-gray-700 rounded px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    </div>
                </div>
                <button type="button" id="add-modification" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">Adicionar Modificação</button>
            </div>

            {{-- ID Externo --}}
            <div class="mb-4">
                <label for="external_id" class="block text-gray-700 dark:text-gray-200 font-medium">ID Externo</label>
                <input 
                    type="number" 
                    name="external_id" 
                    id="external_id" 
                    class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:ring focus:ring-blue-500 focus:border-blue-500" 
                    value="{{ old('external_id') }}">
                @error('external_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hidden Fields --}}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="status" value="1">

            {{-- Botões --}}
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    Salvar
                </button>
                <a href="{{ route('cliente.pages.index') }}" class="ml-4 text-gray-600 dark:text-gray-400 hover:underline">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-modification').addEventListener('click', function() {
            const container = document.getElementById('modifications-container');
            const index = container.children.length;
            const div = document.createElement('div');
            div.classList.add('modification', 'mb-2');
            div.innerHTML = `
                <select name="modifications[${index}][type]" class="border border-gray-300 dark:border-gray-700 rounded px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                    <option value="link">Link</option>
                    <option value="image">Imagem</option>
                    <option value="script">Script</option>
                </select>
                <input type="text" name="modifications[${index}][old_value]" placeholder="Valor Antigo" class="border border-gray-300 dark:border-gray-700 rounded px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                <input type="text" name="modifications[${index}][new_value]" placeholder="Novo Valor" class="border border-gray-300 dark:border-gray-700 rounded px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
            `;
            container.appendChild(div);
        });
    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-lg leading-tight">
            Lista de Páginas
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4 space-y-4 md:space-y-0 md:space-x-4">
            <h2 class="text-lg font-medium">Gerenciamento de Páginas</h2>
            <a href="{{ route('cliente.pages.create') }}" class="bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] hover:bg-gradient-to-l text-white py-2 px-4 rounded">
                Criar Página
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($pages as $page)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $page->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>URL da Página:</strong> <a href="{{ $page->url_page }}" class="text-blue-500 hover:underline">{{ $page->url_page }}</a></p>
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>Visitas:</strong> {{ $page->visits }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-2">
                        <strong>Status:</strong>
                        <form action="{{ route('cliente.pages.toggleStatus', $page->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('PATCH')
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="1" {{ $page->status ? 'checked' : '' }} onchange="this.form.submit()">
                                <span class="ml-2 text-green-500"><i class="fas fa-check-circle"></i> Ativo</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" name="status" value="0" {{ !$page->status ? 'checked' : '' }} onchange="this.form.submit()">
                                <span class="ml-2 text-red-500"><i class="fas fa-times-circle"></i> Inativo</span>
                            </label>
                        </form>
                    </p>
                    <div class="flex justify-between mt-4 space-x-4">
    <!-- Botão Visualizar -->
    <a href="{{ route('cliente.pages.show', $page->name) }}" 
       class="flex items-center text-blue-500 hover:text-blue-600 transition duration-300">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"></path>
        </svg>
        Visualizar
    </a>

    <!-- Botão Detalhes -->
    <a href="{{ route('cliente.pages.detail', $page->name) }}" 
       class="flex items-center text-blue-500 hover:text-blue-600 transition duration-300">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        Detalhes
    </a>

    <!-- Botão Excluir -->
    <form action="{{ route('cliente.pages.destroy', $page->id) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="flex items-center text-red-500 hover:text-red-600 transition duration-300" 
                onclick="return confirm('Deseja excluir?')">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
            </svg>
            Excluir
        </button>
    </form>
</div>
                </div>
            @empty
                <p class="text-center py-4 text-gray-500 dark:text-gray-400 col-span-full">Nenhuma página cadastrada.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
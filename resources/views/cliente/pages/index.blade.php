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
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>URL de Checkout:</strong> <a href="{{ $page->url_checkout }}" class="text-blue-500 hover:underline">{{ $page->url_checkout }}</a></p>
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>ID Externo:</strong> {{ $page->external_id }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>ID do Usuário:</strong> {{ $page->user_id }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>Visitas:</strong> {{ $page->visits }}</p>
                    <p class="text-gray-600 dark:text-gray-400 mb-2"><strong>Pública:</strong> {{ $page->is_public ? 'Sim' : 'Não' }}</p>
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
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('cliente.pages.show', $page->name) }}" class="text-blue-500 hover:underline">Visualizar</a>
                        <a href="{{ route('cliente.pages.detail', $page->name) }}" class="text-blue-500 hover:underline">Detalhes</a>
                        <form action="{{ route('cliente.pages.destroy', $page->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center py-4 text-gray-500 dark:text-gray-400 col-span-full">Nenhuma página cadastrada.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
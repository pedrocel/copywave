<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex items-center">
            <i class="fas fa-globe mr-2"></i> <!-- Ícone adicionado -->
            Meus Domínios
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-medium">Gerenciamento de Domínios</h2>
            <a href="{{ route('domains.create') }}" class="bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] hover:bg-gradient-to-l text-white py-2 px-4 rounded">
                Adicionar Domínio
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($domains as $domain)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $domain->domain }}</h3>
                    <div class="flex justify-between mt-4">
                        <a href="{{ route('domains.edit', $domain->id) }}" class="text-blue-500 hover:underline">Editar</a>
                        <form action="{{ route('domains.destroy', $domain->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Deseja excluir?')">Excluir</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center py-4 text-gray-500 dark:text-gray-400 col-span-full">Nenhum domínio cadastrado.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
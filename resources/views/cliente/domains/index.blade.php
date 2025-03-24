@extends('layouts.app')

@section('title', 'Páginas')

@section('content')
<header class="glass-effect border-b border-gray-200/50 dark:border-gray-700/50 sticky top-0 z-20">
    <div class="flex justify-between items-center px-4 md:px-8 py-6">
        <div class="flex items-center">
            <button onclick="toggleSidebar()" class="md:hidden mr-4 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300">
                <i data-feather="menu" class="w-6 h-6"></i>
            </button>
            <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Lista de Domínios</h2>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('cliente.domains.create') }}" class="theme-gradient text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:opacity-90 transition-opacity duration-150">
                <i data-lucide="plus" class="w-5 h-5"></i>
                <span class="hidden md:inline">Criar Dominio</span>
            </a>
        </div>
    </div>
</header>

@if(session('success'))
<div class="bg-green-100 text-green-800 p-4 rounded mb-4">
    {{ session('success') }}
</div>
@endif
<div class="p-4 md:p-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        @forelse($domains as $domain)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden p-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate">
                        {{ $domain->domain }}
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 font-mono">
                        ID: {{ $domain->id }}
                    </p>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-gray-700">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-1 text-gray-600 dark:text-gray-400">
                        <i data-lucide="globe" class="w-4 h-4"></i>
                        <span class="text-sm">{{ $domain->domain }}</span>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('domains.edit', $domain->id) }}" class="p-1.5 text-gray-500 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-colors">
                        <i data-lucide="edit-2" class="w-5 h-5"></i>
                    </a>
                    <form action="{{ route('cliente.domains.destroy', $domain->id) }}" method="POST" onsubmit="return confirm('Deseja excluir?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1.5 text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700/50 transition-colors">
                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white dark:bg-gray-800 rounded-xl p-8 text-center">
            <div class="flex flex-col items-center justify-center">
                <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="file-text" class="w-8 h-8 text-gray-400 dark:text-gray-500"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Nenhum domínio cadastrado</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-4">Comece adicionando seu primeiro domínio</p>
                <a href="{{ route('cliente.domains.create') }}" class="theme-gradient hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center space-x-2 transition duration-200">
                    <i data-lucide="plus" class="w-5 h-5"></i>
                    <span>Criar Domínio</span>
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard do Cliente
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- Dashboard --}}
        <div class="p-6">
            {{-- 3 Cards Superiores --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-gradient-to-r from-[#D350F2] to-[#AB66FF] shadow rounded-lg p-4 text-center">
                    <h3 class="text-xl font-bold flex items-center justify-center text-white">
                        <i class="fas fa-file-alt mr-2"></i> Total de Páginas
                    </h3>
                    <p class="text-white text-3xl">{{ $totalPages }}</p>
                </div>
                <div class="bg-gradient-to-r from-[#D350F2] to-[#AB66FF] shadow rounded-lg p-4 text-center">
                    <h3 class="text-xl font-bold flex items-center justify-center text-white">
                        <i class="fas fa-globe mr-2"></i> Total de Domínios
                    </h3>
                    <p class="text-white text-3xl">{{ $totalDomains }}</p>
                </div>
                <div class="bg-gradient-to-r from-[#D350F2] to-[#AB66FF] shadow rounded-lg p-4 text-center">
                    <h3 class="text-xl font-bold flex items-center justify-center text-white">
                        <i class="fas fa-eye mr-2"></i> Total de Visualizações
                    </h3>
                    <p class="text-white text-3xl">{{ $totalVisits }}</p>
                </div>
            </div>

            {{-- Últimas 5 Páginas --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-6">
                <h3 class="text-xl font-bold mb-4">Últimas 5 Páginas</h3>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="p-2 text-gray-700 dark:text-gray-300">Nome</th>
                            <th class="p-2 text-gray-700 dark:text-gray-300">Visualizações</th>
                            <th class="p-2 text-gray-700 dark:text-gray-300">Status</th>
                            <th class="p-2 text-gray-700 dark:text-gray-300">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestPages as $page)
                            <tr class="border-b">
                                <td class="p-2 text-gray-600 dark:text-gray-400">{{ $page->name }}</td>
                                <td class="p-2 text-gray-600 dark:text-gray-400">{{ $page->visits }}</td>
                                <td class="p-2 text-gray-600 dark:text-gray-400 flex items-center">
                                    @if ($page->status)
                                        <span class="inline-block w-3 h-3 bg-green-500 rounded-full mr-2"></span> Online
                                    @else
                                        <span class="inline-block w-3 h-3 bg-red-500 rounded-full mr-2"></span> Offline
                                    @endif
                                </td>
                                <td class="p-2 text-gray-600 dark:text-gray-400">
                                    <a href="{{ route('cliente.pages.show', $page->name) }}" class="text-blue-500 hover:underline">Visualizar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
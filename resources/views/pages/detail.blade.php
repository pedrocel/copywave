@extends('admin.layout')

@section('title', 'Páginas')

@section('content')
    <header class="glass-effect border-b border-gray-200/50 dark:border-gray-700/50 sticky top-0 z-20">
        <div class="flex justify-between items-center px-4 md:px-8 py-6">
            <div class="flex items-center">
                <button onclick="toggleSidebar()" class="md:hidden mr-4 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300">
                    <i data-feather="menu" class="w-6 h-6"></i>
                </button>
                <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Detalhes da página</h2>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('pages.index') }}" class="theme-gradient text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:opacity-90 transition-opacity duration-150">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    <span class="hidden md:inline">Voltar</span>
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
        <div class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Nome</h3>
                <p class="text-gray-500 dark:text-gray-400">{{ $page->name }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">URL</h3>
                <p class="text-gray-500 dark:text-gray-400"><a href="{{ $page->url_page }}" class="text-blue-500 hover:underline">{{ $page->url_page }}</a></p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">URL de Checkout</h3>
                <p class="text-gray-500 dark:text-gray-400">{{ $page->url_checkout }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">ID Externo</h3>
                <p class="text-gray-500 dark:text-gray-400">{{ $page->external_id }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Visitas</h3>
                <p class="text-gray-500 dark:text-gray-400">{{ $page->visits }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Status</h3>
                <p class="text-gray-500 dark:text-gray-400">{{ $page->status ? 'Ativo' : 'Inativo' }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Conteúdo</h3>
                <a href="{{ route('pages.show', $page->name) }}" target="_blank" class="text-blue-500 hover:underline">
                    <i class="fas fa-eye"></i> Preview
                </a>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Links Modificados</h3>
                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Antigo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">Novo</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($modifications as $modification)
                                @if ($modification->type === 'link')
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $modification->old_value }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-200">{{ $modification->new_value }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="p-4 md:p-8">
        <div class="mb-4"><br>
            <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Vincular Domínio</h3>
            @if ($page->domain_id)
                <form action="{{ route('pages.detachDomain', $page->id) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
                    @csrf
                    @method('DELETE')
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-medium">Domínio Vinculado</label>
                        <input type="text" value="{{ $page->domain->domain }}" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200" disabled>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-red-300">
                            Desvincular
                        </button>
                    </div>
                </form>
            @else
                <form action="{{ route('pages.attachDomain', $page->id) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
                    @csrf
                    <div class="mb-4">
                        <label for="domain_id" class="block text-gray-700 dark:text-gray-200 font-medium">Selecionar Domínio</label>
                        <select name="domain_id" id="domain_id" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                            @foreach($domains as $domain)
                                <option value="{{ $domain->id }}">{{ $domain->domain }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="theme-gradient text-white px-4 py-2 rounded-lg flex items-center space-x-2 hover:opacity-90 transition-opacity duration-150">
                            Salvar
                        </button>
                    </div>
                </form>
            @endif
        </div>

        @if ($page->domain_id)
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Verificar CNAME</h3>
                <button type="button" id="check-cname" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                    Verificar CNAME
                </button>
                <p id="cname-result" class="mt-2 text-gray-500 dark:text-gray-400"></p>
            </div>
        @endif
    </div>

    <script>
        document.getElementById('check-cname')?.addEventListener('click', function() {
            const domain = document.getElementById('domain_id').selectedOptions[0].text;
            const pageName = "{{ $page->name }}";
            const cname = `${pageName}.minhaurl.io`;

            fetch(`/check-cname?domain=${domain}&cname=${cname}`)
                .then(response => response.json())
                .then(data => {
                    const resultElement = document.getElementById('cname-result');
                    if (data.exists) {
                        resultElement.textContent = 'O registro CNAME está configurado corretamente.';
                        resultElement.classList.remove('text-red-500');
                        resultElement.classList.add('text-green-500');
                    } else {
                        resultElement.textContent = 'O registro CNAME não foi encontrado.';
                        resultElement.classList.remove('text-green-500');
                        resultElement.classList.add('text-red-500');
                    }
                });
        });
    </script>
@endsection
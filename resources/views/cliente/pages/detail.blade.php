<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detalhes da Página
        </h2>
    </x-slot>

    <div class="container mx-4">
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
<br>
    <div class="container mx-4">
    <div class="mb-4">
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center gap-1">
            <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">Vincular Domínio</h3>
            <a href="{{ route('cliente.domains.create') }}" 
            class="bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] hover:bg-gradient-to-l text-white py-2 px-4 rounded transition-all duration-300 shadow hover:shadow-lg">
                Adicionar novo Domínio
            </a>
        </div>
    </div>

        @if ($page->domain_id)
            <form action="{{ route('cliente.pages.detachDomain', $page->id) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
                @csrf
                @method('DELETE')
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 font-medium">Domínio Vinculado</label>
                    <input type="text" value="{{ $page->domain->domain }}" class="border border-gray-300 dark:border-gray-700 rounded w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200" disabled>
                </div>
                @if($hasCname)
                    <div class="bg-green-500 text-white p-4 rounded-md">
                        ✅ O domínio está corretamente configurado para copywave.io
                    </div>
                @else
                    <div class="bg-red-500 text-white p-4 rounded-md">
                        ⚠️ O domínio não está apontando corretamente para copywave.io. Verifique as configurações de DNS.
                    </div>
                @endif<Br>
                <div class="flex justify-end">
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-red-300">
                        Desvincular dominio da página
                    </button>
                </div>
            </form>
        @else
            <form action="{{ route('cliente.pages.attachDomain', $page->id) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
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
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                        Salvar
                    </button>
                </div>
            </form>
        @endif

        <div class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg mt-6">
            <p class="text-gray-700 dark:text-gray-200 mb-4">
                Para que seu domínio funcione corretamente, você precisa criar um registro <strong>CNAME</strong> apontando para o nosso domínio. 
            </p>

            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg text-sm">
                <p class="text-gray-800 dark:text-gray-200">
                    <strong>Tipo do registro:</strong> CNAME - 
                    <strong>Nome:</strong> <span class="text-blue-500">@</span> -
                    <strong>Valor:</strong> <span class="text-blue-500">{{ $page->name.$page->id }}.copywave.io</span>
                </p>
            </div>

            <p class="text-gray-700 dark:text-gray-200 mt-4">
                Após configurar o apontamento, aguarde a propagação do DNS, que pode levar algumas horas.
            </p>
        </div>
    </div>
</div>


    <script>
        document.getElementById('check-cname')?.addEventListener('click', function() {
            const domain = document.getElementById('domain_id').selectedOptions[0].text;
            const pageName = "{{ $page->name }}";
            const cname = `${pageName}.copywave.io`;

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
</x-app-layout>
@extends('layouts.app')

@section('title', 'Detalhes da Página')

@section('content')
<header class="sticky top-0 z-20 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200/50 dark:border-gray-700/50">
    <div class="flex justify-between items-center px-4 md:px-8 py-4">
        <div class="flex items-center">
            <button onclick="toggleSidebar()" class="md:hidden mr-4 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 focus:outline-none">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Detalhes da Página</h2>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ route('pages.index') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-full flex items-center space-x-2 transition-all duration-200 shadow-md hover:shadow-lg">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
                <span class="hidden md:inline">Voltar</span>
            </a>
        </div>
    </div>
</header>

@if(session('success'))
<div class="mx-4 md:mx-8 mt-4 bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 p-4 rounded-lg flex items-center shadow-sm">
    <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
    <span>{{ session('success') }}</span>
    <button onclick="this.parentElement.remove()" class="ml-auto text-green-700 dark:text-green-400 hover:text-green-900 dark:hover:text-green-200">
        <i data-lucide="x" class="w-4 h-4"></i>
    </button>
</div>
@endif

<div class="p-4 md:p-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Informações Principais -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 pb-2 border-b border-gray-100 dark:border-gray-700">
                Informações da Página
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Nome</h4>
                        <p class="text-gray-900 dark:text-white font-medium">{{ $page->name }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">URL da Página</h4>
                        <a href="{{ $page->url_page }}" target="_blank" class="text-purple-600 dark:text-purple-400 hover:text-purple-800 dark:hover:text-purple-300 hover:underline flex items-center space-x-1 break-all">
                            <span>{{ $page->url_page }}</span>
                            <i data-lucide="external-link" class="w-4 h-4"></i>
                        </a>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">ID Externo</h4>
                        <p class="text-gray-900 dark:text-white font-mono text-sm">{{ $page->external_id }}</p>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">URL de Checkout</h4>
                        <p class="text-gray-900 dark:text-white break-all">{{ $page->url_checkout }}</p>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Visitas</h4>
                        <div class="flex items-center space-x-2">
                            <span class="bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300 px-3 py-1 rounded-full text-sm font-medium">
                                {{ $page->visits }}
                            </span>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Status</h4>
                        <span class="px-3 py-1 bg-{{ $page->status ? 'green' : 'red' }}-100 dark:bg-{{ $page->status ? 'green' : 'red' }}-900/30 
                            text-{{ $page->status ? 'green' : 'red' }}-700 dark:text-{{ $page->status ? 'green' : 'red' }}-400 
                            rounded-full text-sm font-medium">
                            {{ $page->status ? 'Ativo' : 'Inativo' }}
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Conteúdo</h4>
                <a href="{{ route('pages.show', $page->name) }}" target="_blank" class="inline-flex items-center space-x-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg transition-colors">
                    <i data-lucide="eye" class="w-4 h-4"></i>
                    <span>Visualizar Página</span>
                </a>
            </div>
        </div>
        
        <!-- Vincular Domínio -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 pb-2 border-b border-gray-100 dark:border-gray-700">
                Domínio
            </h3>
            
            @if ($page->domain_id)
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Domínio Vinculado</h4>
                    <div class="flex items-center bg-gray-50 dark:bg-gray-700 p-3 rounded-lg border border-gray-200 dark:border-gray-600">
                        <span class="text-gray-900 dark:text-white font-medium">{{ $page->domain->domain }}</span>
                    </div>
                </div>
                
                <form action="{{ route('pages.detachDomain', $page->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 flex items-center justify-center space-x-2">
                        <i data-lucide="unlink" class="w-4 h-4"></i>
                        <span>Desvincular Domínio</span>
                    </button>
                </form>
                
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Verificar CNAME</h4>
                    <div class="mb-3 bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg text-xs text-blue-700 dark:text-blue-300">
                        <p>Verifique se o CNAME <span class="font-mono font-medium">{{ $page->name }}.minhaurl.io</span> está configurado corretamente para o domínio <span class="font-mono font-medium">{{ $page->domain->domain }}</span></p>
                    </div>
                    <button type="button" id="check-cname" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 flex items-center justify-center space-x-2">
                        <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                        <span>Verificar CNAME</span>
                    </button>
                    <div id="cname-result" class="mt-3 text-sm p-3 rounded-lg hidden"></div>
                    <div id="cname-details" class="mt-3 text-xs p-3 rounded-lg hidden bg-gray-50 dark:bg-gray-700 font-mono overflow-x-auto"></div>
                </div>
            @else
                <form action="{{ route('pages.attachDomain', $page->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="domain_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Selecionar Domínio</label>
                        <select name="domain_id" id="domain_id" class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            @foreach($domains as $domain)
                                <option value="{{ $domain->id }}">{{ $domain->domain }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 flex items-center justify-center space-x-2">
                        <i data-lucide="link" class="w-4 h-4"></i>
                        <span>Vincular Domínio</span>
                    </button>
                </form>
            @endif
        </div>
    </div>
    
    <!-- Links Modificados -->
    <div class="mt-6 bg-white dark:bg-gray-800 rounded-xl shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 pb-2 border-b border-gray-100 dark:border-gray-700">
            Links Modificados
        </h3>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Link Original</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Link Modificado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($modifications as $modification)
                        @if ($modification->type === 'link')
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-750">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300 font-mono">{{ $modification->old_value }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-purple-600 dark:text-purple-400 font-mono">{{ $modification->new_value }}</td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                Nenhum link modificado encontrado
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Inicializar ícones Lucide
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
        
        // Auto-fechar mensagens de sucesso após 5 segundos
        const successMessage = document.querySelector('.bg-green-100');
        if (successMessage) {
            setTimeout(() => {
                successMessage.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                setTimeout(() => successMessage.remove(), 500);
            }, 5000);
        }
        
        // Verificação de CNAME usando Cloudflare DNS-over-HTTPS API
        const checkCnameButton = document.getElementById('check-cname');
        if (checkCnameButton) {
            checkCnameButton.addEventListener('click', function() {
                const resultElement = document.getElementById('cname-result');
                const detailsElement = document.getElementById('cname-details');
                
                resultElement.classList.remove('hidden', 'bg-green-100', 'text-green-800', 'bg-red-100', 'text-red-800');
                resultElement.innerHTML = '<div class="flex items-center justify-center"><svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg><span class="ml-2">Verificando...</span></div>';
                resultElement.classList.add('bg-gray-100', 'text-gray-800', 'dark:bg-gray-700', 'dark:text-gray-300');
                resultElement.classList.remove('hidden');
                
                detailsElement.classList.add('hidden');
                
                const domain = "{{ $page->domain->domain ?? '' }}";
                const expectedCname = "{{ $page->name }}.minhaurl.io";
                
                // Usando a API DNS-over-HTTPS do Cloudflare
                const url = `https://cloudflare-dns.com/dns-query?name=${domain}&type=CNAME`;
                
                fetch(url, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/dns-json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    resultElement.classList.remove('bg-gray-100', 'text-gray-800', 'dark:bg-gray-700', 'dark:text-gray-300');
                    detailsElement.classList.remove('hidden');
                    
                    // Exibir os detalhes da resposta para debug
                    detailsElement.innerHTML = `<div class="text-xs">Resposta da API DNS:</div><pre class="mt-2 overflow-x-auto">${JSON.stringify(data, null, 2)}</pre>`;
                    
                    let cnameFound = false;
                    let actualCname = '';
                    
                    if (data.Answer && data.Answer.length > 0) {
                        // Procurar por registros CNAME
                        for (const record of data.Answer) {
                            if (record.type === 5) { // 5 é o tipo para CNAME
                                cnameFound = true;
                                actualCname = record.data;
                                
                                // Verificar se o CNAME corresponde ao esperado
                                if (actualCname.includes(expectedCname) || expectedCname.includes(actualCname)) {
                                    resultElement.innerHTML = `<div class="flex items-center"><i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>O registro CNAME está configurado corretamente para <span class="font-mono font-medium ml-1">${actualCname}</span></div>`;
                                    resultElement.classList.add('bg-green-100', 'dark:bg-green-900/30', 'text-green-800', 'dark:text-green-300');
                                } else {
                                    resultElement.innerHTML = `<div class="flex items-center"><i data-lucide="alert-circle" class="w-5 h-5 mr-2"></i>O registro CNAME foi encontrado, mas aponta para <span class="font-mono font-medium ml-1">${actualCname}</span> em vez de <span class="font-mono font-medium ml-1">${expectedCname}</span></div>`;
                                    resultElement.classList.add('bg-yellow-100', 'dark:bg-yellow-900/30', 'text-yellow-800', 'dark:text-yellow-300');
                                }
                                break;
                            }
                        }
                    }
                    
                    if (!cnameFound) {
                        resultElement.innerHTML = '<div class="flex items-center"><i data-lucide="alert-circle" class="w-5 h-5 mr-2"></i>Nenhum registro CNAME foi encontrado para este domínio.</div>';
                        resultElement.classList.add('bg-red-100', 'dark:bg-red-900/30', 'text-red-800', 'dark:text-red-300');
                    }
                    
                    lucide.createIcons();
                })
                .catch(error => {
                    console.error('Erro ao verificar CNAME:', error);
                    resultElement.innerHTML = '<div class="flex items-center"><i data-lucide="alert-triangle" class="w-5 h-5 mr-2"></i>Erro ao verificar o CNAME. Tente novamente mais tarde.</div>';
                    resultElement.classList.add('bg-yellow-100', 'dark:bg-yellow-900/30', 'text-yellow-800', 'dark:text-yellow-300');
                    
                    detailsElement.innerHTML = `<div class="text-xs text-red-500">Erro: ${error.message}</div>`;
                    detailsElement.classList.remove('hidden');
                    
                    lucide.createIcons();
                });
                
                // Método alternativo usando a API do Google DNS
                // Este é um backup caso a API do Cloudflare não funcione
                if (false) { // Desativado por padrão, ative se necessário
                    const googleDnsUrl = `https://dns.google/resolve?name=${domain}&type=CNAME`;
                    
                    fetch(googleDnsUrl)
                    .then(response => response.json())
                    .then(data => {
                        // Lógica similar à do Cloudflare
                        console.log('Google DNS response:', data);
                    })
                    .catch(error => {
                        console.error('Erro ao verificar CNAME com Google DNS:', error);
                    });
                }
            });
        }
    });
</script>
@endsection
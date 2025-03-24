@extends('layouts.app')

@section('content')
<div class="p-6 md:p-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-2">Gerenciamento de Usuários</h1>
            <p class="text-gray-500 dark:text-gray-400">Gerencie todos os usuários do sistema</p>
        </div>
        
        <div class="flex items-center space-x-3 mt-4 md:mt-0">
            <div class="glass-effect rounded-xl p-2 flex items-center space-x-2">
                <i data-lucide="filter" class="w-5 h-5 text-gray-500 dark:text-gray-400"></i>
                <select id="role-filter" class="bg-transparent border-none text-sm text-gray-700 dark:text-gray-300 focus:ring-0">
                    <option value="all" selected>Todos os Perfis</option>
                    <option value="admin">Administradores</option>
                    <option value="client">Clientes</option>
                </select>
            </div>
            
            <button onclick="openCreateModal()" class="theme-gradient rounded-xl p-2 text-white shadow-sm hover:opacity-90 transition-opacity">
                <i data-lucide="user-plus" class="w-5 h-5"></i>
            </button>
        </div>
    </div>
    
    <!-- User Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total de Usuários -->
        <div class="glass-effect rounded-2xl p-6 hover:shadow-lg transition-all duration-200">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total de Usuários</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">{{ $users->count() }}</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="users" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                <i data-lucide="trending-up" class="w-4 h-4 mr-1 text-green-500"></i>
                Crescimento de 5% desde o último mês
            </div>
        </div>
        
        <!-- Administradores -->
        <div class="glass-effect rounded-2xl p-6 hover:shadow-lg transition-all duration-200">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Administradores</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">{{ $users->where('perfil_id', 1)->count() }}</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="shield" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                <i data-lucide="trending-flat" class="w-4 h-4 mr-1 text-yellow-500"></i>
                Sem alterações desde o último mês
            </div>
        </div>
        
        <!-- Clientes -->
        <div class="glass-effect rounded-2xl p-6 hover:shadow-lg transition-all duration-200">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Clientes</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">{{ $users->where('perfil_id', 2)->count() }}</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="user" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                <i data-lucide="trending-up" class="w-4 h-4 mr-1 text-green-500"></i>
                Crescimento de 8% desde o último mês
            </div>
        </div>
    </div>
    
    <!-- User Management -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Todos os Usuários</h3>
            
            <div class="flex items-center space-x-3 mt-4 md:mt-0">
                <div class="glass-effect rounded-xl flex items-center overflow-hidden pr-2">
                    <input type="text" id="search-users" placeholder="Buscar usuário..." class="bg-transparent border-none text-sm text-gray-700 dark:text-gray-300 focus:ring-0 py-2 px-4">
                    <i data-lucide="search" class="w-5 h-5 text-gray-500 dark:text-gray-400"></i>
                </div>
            </div>
        </div>
        
        <!-- Users Table -->
        <div class="glass-effect rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Usuário</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Perfil</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Cadastrado em</th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($users as $user)
                        <tr class="hover:bg-white/50 dark:hover:bg-gray-800/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 theme-gradient rounded-xl flex items-center justify-center shadow-sm">
                                        <span class="text-sm font-bold text-white">{{ substr($user->name, 0, 2) }}</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900 dark:text-white">{{ $user->email }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($user->perfilAtual()->name == 'Administrador')
                                    <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-300 flex items-center w-fit">
                                        <i data-lucide="shield" class="w-3 h-3 mr-1"></i> Administrador
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 flex items-center w-fit">
                                        <i data-lucide="user" class="w-3 h-3 mr-1"></i> Cliente
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900 dark:text-white">{{ $user->created_at->format('d/m/Y') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <button onclick="openEditModal({{ $user->id }})" class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-blue-500 hover:text-blue-600">
                                        <i data-lucide="edit" class="w-5 h-5"></i>
                                    </button>
                                    <button onclick="confirmDelete({{ $user->id }})" class="p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 text-red-500 hover:text-red-600">
                                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                        @if($users->count() == 0)
                        <tr class="text-center">
                            <td colspan="5" class="px-6 py-12 text-gray-500 dark:text-gray-400">
                                <div class="flex flex-col items-center">
                                    <div class="mb-3 w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                                        <i data-lucide="users" class="w-8 h-8 text-gray-400 dark:text-gray-600"></i>
                                    </div>
                                    <p>Nenhum usuário encontrado</p>
                                    <button onclick="openCreateModal()" class="mt-3 px-4 py-2 text-xs theme-gradient rounded-lg text-white shadow-sm">Adicionar Usuário</button>
                                </div>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="px-6 py-4 flex items-center justify-between border-t border-gray-200 dark:border-gray-700">
                <div class="flex-1 flex justify-between sm:hidden">
                    <button class="px-4 py-2 text-sm bg-white/50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300 rounded-lg">Anterior</button>
                    <button class="px-4 py-2 text-sm theme-gradient text-white rounded-lg ml-3">Próxima</button>
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700 dark:text-gray-300">
                            Mostrando <span class="font-medium">1</span> a <span class="font-medium">{{ $users->count() }}</span> de <span class="font-medium">{{ $users->count() }}</span> resultados
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            <button class="relative inline-flex items-center px-2 py-2 rounded-l-md bg-white/50 dark:bg-gray-700/50 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-white/70 dark:hover:bg-gray-700/70">
                                <i data-lucide="chevron-left" class="w-5 h-5"></i>
                            </button>
                            <button class="relative inline-flex items-center px-4 py-2 theme-gradient text-sm font-medium text-white">
                                1
                            </button>
                            <button class="relative inline-flex items-center px-2 py-2 rounded-r-md bg-white/50 dark:bg-gray-700/50 text-sm font-medium text-gray-500 dark:text-gray-400 hover:bg-white/70 dark:hover:bg-gray-700/70">
                                <i data-lucide="chevron-right" class="w-5 h-5"></i>
                            </button>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<!-- Create User Modal -->
<div id="createUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="glass-effect rounded-2xl p-6 max-w-md w-full mx-4">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Adicionar Novo Usuário</h3>
            <button onclick="closeCreateModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        
        <form method="POST" action="{{ route('admin.users.store') }}" id="createUserForm">
            @csrf
            
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="glass-effect border-none rounded-xl px-4 py-2 w-full text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-primary-500" 
                    required
                >
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="glass-effect border-none rounded-xl px-4 py-2 w-full text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-primary-500" 
                    required
                >
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Senha</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    class="glass-effect border-none rounded-xl px-4 py-2 w-full text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-primary-500" 
                    required
                >
            </div>

            <!-- Campo para selecionar o perfil -->
            <div class="mb-6">
                <label for="perfil_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Perfil</label>
                <select 
                    name="perfil_id" 
                    id="perfil_id" 
                    class="glass-effect border-none rounded-xl px-4 py-2 w-full text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-primary-500" 
                    required
                >
                    <option value="">Selecione um perfil</option>
                    @foreach($perfis as $perfil)
                        <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeCreateModal()" class="px-4 py-2 rounded-xl bg-white/50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300 hover:bg-white/70 dark:hover:bg-gray-700/70 transition-colors">
                    Cancelar
                </button>
                <button type="submit" class="px-4 py-2 rounded-xl theme-gradient text-white shadow-sm hover:opacity-90 transition-opacity">
                    Criar Usuário
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Edit User Modal -->
<div id="editUserModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="glass-effect rounded-2xl p-6 max-w-md w-full mx-4">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Editar Usuário</h3>
            <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        
        <form method="POST" id="editUserForm">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="edit_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nome</label>
                <input 
                    type="text" 
                    name="name" 
                    id="edit_name" 
                    class="glass-effect border-none rounded-xl px-4 py-2 w-full text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-primary-500" 
                    required
                >
            </div>

            <div class="mb-4">
                <label for="edit_email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="edit_email" 
                    class="glass-effect border-none rounded-xl px-4 py-2 w-full text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-primary-500" 
                    required
                >
            </div>

            <div class="mb-4">
                <label for="edit_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nova Senha (opcional)</label>
                <input 
                    type="password" 
                    name="password" 
                    id="edit_password" 
                    class="glass-effect border-none rounded-xl px-4 py-2 w-full text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-primary-500"
                >
            </div>

            <!-- Campo para selecionar o perfil -->
            <div class="mb-6">
                <label for="edit_perfil_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Perfil</label>
                <select 
                    name="perfil_id" 
                    id="edit_perfil_id" 
                    class="glass-effect border-none rounded-xl px-4 py-2 w-full text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-primary-500" 
                    required
                >
                    <option value="">Selecione um perfil</option>
                    @foreach($perfis as $perfil)
                        <option value="{{ $perfil->id }}">{{ $perfil->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 rounded-xl bg-white/50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300 hover:bg-white/70 dark:hover:bg-gray-700/70 transition-colors">
                    Cancelar
                </button>
                <button type="submit" class="px-4 py-2 rounded-xl theme-gradient text-white shadow-sm hover:opacity-90 transition-opacity">
                    Atualizar Usuário
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteConfirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="glass-effect rounded-2xl p-6 max-w-md w-full mx-4">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Confirmar Exclusão</h3>
            <button onclick="closeDeleteModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>
        
        <div class="mb-6">
            <div class="flex items-center justify-center mb-4">
                <div class="w-16 h-16 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                    <i data-lucide="alert-triangle" class="w-8 h-8 text-red-500"></i>
                </div>
            </div>
            <p class="text-center text-gray-700 dark:text-gray-300">Tem certeza que deseja excluir este usuário? Esta ação não pode ser desfeita.</p>
        </div>
        
        <form method="POST" id="deleteUserForm">
            @csrf
            @method('DELETE')
            
            <div class="flex justify-center space-x-3">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 rounded-xl bg-white/50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300 hover:bg-white/70 dark:hover:bg-gray-700/70 transition-colors">
                    Cancelar
                </button>
                <button type="submit" class="px-4 py-2 rounded-xl bg-red-500 text-white shadow-sm hover:bg-red-600 transition-colors">
                    Excluir Usuário
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Inicializar ícones Lucide
    lucide.createIcons();
    
    // Funções para o modal de criação
    function openCreateModal() {
        document.getElementById('createUserModal').classList.remove('hidden');
        document.getElementById('createUserModal').classList.add('flex');
    }
    
    function closeCreateModal() {
        document.getElementById('createUserModal').classList.remove('flex');
        document.getElementById('createUserModal').classList.add('hidden');
    }
    
    // Funções para o modal de edição
    function openEditModal(userId) {
        // Aqui você pode fazer uma requisição AJAX para obter os dados do usuário
        // ou usar dados já disponíveis na página
        
        // Exemplo com dados fictícios (substitua por dados reais)
        const user = {
            id: userId,
            name: document.querySelector(`tr[data-user-id="${userId}"] .user-name`)?.textContent || '',
            email: document.querySelector(`tr[data-user-id="${userId}"] .user-email`)?.textContent || '',
            perfil_id: document.querySelector(`tr[data-user-id="${userId}"]`)?.dataset.perfilId || ''
        };
        
        // Preencher o formulário
        document.getElementById('edit_name').value = user.name;
        document.getElementById('edit_email').value = user.email;
        document.getElementById('edit_perfil_id').value = user.perfil_id;
        
        // Atualizar a action do formulário
        document.getElementById('editUserForm').action = `{{ route('admin.users.update', '') }}/${userId}`;
            
        // Exibir o modal
        document.getElementById('editUserModal').classList.remove('hidden');
        document.getElementById('editUserModal').classList.add('flex');
    }
    
    function closeEditModal() {
        document.getElementById('editUserModal').classList.remove('flex');
        document.getElementById('editUserModal').classList.add('hidden');
    }
    
    // Funções para o modal de confirmação de exclusão
    function confirmDelete(userId) {
        // Atualizar a action do formulário
        document.getElementById('deleteUserForm').action = `{{ route('admin.users.destroy', '') }}/${userId}`;
        
        // Exibir o modal
        document.getElementById('deleteConfirmModal').classList.remove('hidden');
        document.getElementById('deleteConfirmModal').classList.add('flex');
    }
    
    function closeDeleteModal() {
        document.getElementById('deleteConfirmModal').classList.remove('flex');
        document.getElementById('deleteConfirmModal').classList.add('hidden');
    }
    
    // Filtro de usuários por perfil
    document.getElementById('role-filter').addEventListener('change', function() {
        const filter = this.value;
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            if (filter === 'all') {
                row.style.display = '';
            } else if (filter === 'admin') {
                row.style.display = row.querySelector('.bg-purple-100') ? '' : 'none';
            } else if (filter === 'client') {
                row.style.display = row.querySelector('.bg-blue-100') ? '' : 'none';
            }
        });
    });
    
    // Pesquisa de usuários
    document.getElementById('search-users').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const name = row.querySelector('.text-sm.font-medium')?.textContent.toLowerCase() || '';
            const email = row.querySelector('.text-sm.text-gray-900')?.textContent.toLowerCase() || '';
            
            if (name.includes(searchTerm) || email.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // Adicionar data-user-id e data-perfil-id aos elementos da tabela para facilitar a edição
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const userId = row.querySelector('button[onclick^="openEditModal"]')?.getAttribute('onclick').match(/\d+/)[0];
            if (userId) {
                row.setAttribute('data-user-id', userId);
                
                // Adicionar classes para facilitar a busca de elementos
                row.querySelector('.text-sm.font-medium')?.classList.add('user-name');
                row.querySelector('.text-sm.text-gray-900')?.classList.add('user-email');
                
                // Adicionar data-perfil-id
                const isAdmin = row.querySelector('.bg-purple-100') !== null;
                row.setAttribute('data-perfil-id', isAdmin ? '1' : '2');
            }
        });
    });
</script>
@endsection
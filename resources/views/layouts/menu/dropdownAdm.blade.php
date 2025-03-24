<a href=" {{ route('admin.dashboard')}}" class="flex items-center space-x-3 p-3 rounded-xl font-medium
    {{ Str::contains(request()->route()->getName(), 'dashboard') ? 'theme-gradient text-white' : 'text-gray-700 dark:text-gray-300' }}">
    <i data-lucide="layout-grid" class="w-5 h-5"></i>
    <span>Dashboard</span>
</a>
<a href=" {{ route('admin.plans.index')}}" class="flex items-center space-x-3 p-3 rounded-xl font-medium
    {{ Str::contains(request()->route()->getName(), 'plans') ? 'theme-gradient text-white' : 'text-gray-700 dark:text-gray-300' }}">
    <i data-lucide="credit-card" class="w-5 h-5"></i>
    <span>Gestão de Planos</span>
</a>
<a href=" {{ route('admin.subscriptions.index')}}" class="flex items-center space-x-3 p-3 rounded-xl font-medium
    {{ Str::contains(request()->route()->getName(), 'subscriptions') ? 'theme-gradient text-white' : 'text-gray-700 dark:text-gray-300' }}">
    <i data-lucide="credit-card" class="w-5 h-5"></i>
    <span>Assinaturas</span>
</a>
<a href=" {{ route('pages.index')}}" class="flex items-center space-x-3 p-3 rounded-xl font-medium
    {{ Str::contains(request()->route()->getName(), 'pages') ? 'theme-gradient text-white' : 'text-gray-700 dark:text-gray-300' }}">
    <i data-lucide="file-text" class="w-5 h-5"></i>
    <span>Páginas</span>
</a>
<a href=" {{ route('domains.index')}}" class="flex items-center space-x-3 p-3 rounded-xl font-medium
    {{ Str::contains(request()->route()->getName(), 'domains') ? 'theme-gradient text-white' : 'text-gray-700 dark:text-gray-300' }}">
    <i data-lucide="globe" class="w-5 h-5"></i>
    <span>Gerenciar Domínios</span>
</a>
<a href=" {{ route('admin.users.index')}}" class="flex items-center space-x-3 p-3 rounded-xl font-medium
    {{ Str::contains(request()->route()->getName(), 'users') ? 'theme-gradient text-white' : 'text-gray-700 dark:text-gray-300' }}">
    <i data-lucide="users" class="w-5 h-5"></i>
    <span>Gestão de Usuário</span>
</a>

<nav class="flex-1 px-4 py-6 space-y-2">
    <a href="/admin/dashboard" id="menuButton" class="block px-4 py-2 text-gray-200 
        @unless(Route::is('admin.dashboard')) 
            bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] 
        @endunless
        rounded-[10px] text-sm
        @if(Route::is('admin.dashboard')) 
            bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
        @endif">
        <i class="fas fa-tachometer-alt mr-2"></i><span class="menu-label">Dashboard</span> 
    </a>
    <a href="{{ route('admin.plans.index') }}" id="menuButton" class="block px-4 py-2 text-gray-200 
            @if(Str::contains(Route::currentRouteName(), 'plans')) 
                bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
            @else
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] 
            @endif
            rounded-[10px] text-sm">
            <i class="fas fa-rocket mr-2"></i><span class="menu-label">Gestão de planos</span>
    </a>
    <a href="{{ route('pages.index') }}" id="menuButton" class="block px-4 py-2 text-gray-200 
            @if(Str::contains(Route::currentRouteName(), 'pages')) 
                bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
            @else
                bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] 
            @endif
            rounded-[10px] text-sm">
            <i class="fas fa-rocket mr-2"></i><span class="menu-label">Páginas</span>
    </a>
    <a href="{{ route('domains.index') }}" id="menuButton" class="block px-4 py-2 text-gray-200 
        @unless(Route::is('domains.index')) 
            bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] 
        @endunless
        rounded-[10px] text-sm
        @if(Route::is('domains.index')) 
            bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
        @endif">
        <i class="fas fa-globe mr-2"></i><span class="menu-label">Gerenciar Domínios</span>
    </a>
    <a href="/admin/users" id="menuButton" class="block px-4 py-2 text-gray-200 
        @unless(Route::is('admin.users')) 
            bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF]  
        @endunless
        rounded-[10px] text-sm
        @if(Route::is('admin.users')) 
            bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
        @endif">
        <i class="fas fa-user-friends mr-2"></i> <span class="menu-label">Gestão de Usuários</span>
    </a>
    <div class="flex items-center">
        <button id="themeToggle" class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg shadow-md hover:bg-gray-700 transition duration-300 text-sm">
            <i class="fas fa-moon mr-2"></i> <span class="menu-label">ALTERAR TEMA</span>
        </button>
    </div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="block w-full px-4 py-2 text-gray-200 hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] rounded-[10px] text-sm text-left">
            <i class="fas fa-sign-out-alt mr-2"></i>Sair
        </button>
    </form>
</nav>
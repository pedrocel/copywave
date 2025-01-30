<div id="userMenuDropdown" class="hidden absolute -right-6 mt-48 w-48 shadow-lg rounded-lg z-50">
    <a href="/cliente/produtos" id="menuButton" class="block px-4 py-2 text-gray-200 
        @unless(Route::is('cliente.produtos')) 
            bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] 
        @endunless
        rounded-[10px] text-sm
        @if(Route::is('cliente.produtos')) 
            bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
        @endif">
        <i class="fas fa-home mr-2"></i><span class="menu-label">Inicio</span>
    </a>
    <a href="/cliente/dashboard" id="menuButton" class="block px-4 py-2 text-gray-200 
        @unless(Route::is('dashboard')) 
            bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] 
        @endunless
        rounded-[10px] text-sm
        @if(Route::is('dashboard')) 
            bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
        @endif">
        <i class="fas fa-tachometer-alt mr-2"></i><span class="menu-label">Dashboard</span> 
    </a>
    <a href="/cliente/profile" id="menuButton" class="block px-4 py-2 text-gray-200 
        @unless(Route::is('profile.edit')) 
            bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] 
        @endunless
        rounded-[10px] text-sm
        @if(Route::is('profile.edit')) 
            bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
        @endif">
        <i class="fas fa-user-circle mr-2"></i><span class="menu-label">Meu Perfil</span>
    </a>
    <a href="{{ route('cliente.pages.index') }}" id="menuButton" class="block px-4 py-2 text-gray-200 
        @if(Str::contains(Route::currentRouteName(), 'pages')) 
            bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
        @else
            bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] 
        @endif
        rounded-[10px] text-sm">
        <i class="fas fa-rocket mr-2"></i><span class="menu-label">Páginas</span>
    </a>
    <a href="{{ route('cliente.domains.index') }}" id="menuButton" class="block px-4 py-2 text-gray-200 
        @if(Str::contains(Route::currentRouteName(), 'domain')) 
            bg-gradient-to-r from-[#CC54F4] to-[#AB66FF] text-white 
        @else
            bg-[#1E1E1E] text-gradient hover:bg-gradient-to-r hover:from-[#CC54F4] hover:to-[#AB66FF] 
        @endif
        rounded-[10px] text-sm">
        <i class="fas fa-globe mr-2"></i><span class="menu-label">Gerenciar Domínios</span>
    </a>
    <form method="POST" action="/logout">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
            Sair
        </button>
    </form>
</div>
<!DOCTYPE html>
<html lang="pt-BR" class="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'Copywave') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f7ff',
                            100: '#e0efff',
                            200: '#bae0ff',
                            300: '#7cc7ff',
                            400: '#36a9ff',
                            500: '#0090ff',
                            600: '#0070f3',
                            700: '#0058cc',
                            800: '#0047a6',
                            900: '#003380',
                        }
                    },
                    backdropBlur: {
                        'xs': '2px',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .dark .glass-effect {
            background: rgba(17, 24, 39, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .wizard-step {
            transform: translateX(100%);
            opacity: 0;
            transition: all 0.3s ease-in-out;
        }
        .wizard-step.active {
            transform: translateX(0);
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Page Creation Wizard Modal -->
    
    <!-- User Profile Modal -->
    <div id="userModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="glass-effect rounded-2xl p-6 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Perfil do Usuário</h3>
                <button onclick="toggleUserModal()" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="flex items-center space-x-4 mb-6">
                <div class="w-16 h-16 bg-gradient-to-br from-primary-400 to-primary-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <span class="text-2xl font-bold text-white">DI</span>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">Diretor</h4>
                    <p class="text-gray-500 dark:text-gray-400">Escola Estadual União dos Palmares</p>
                </div>
            </div>
            <div class="space-y-4">
                <div class="flex items-center space-x-3 text-gray-600 dark:text-gray-300">
                    <i data-feather="mail" class="w-5 h-5"></i>
                    <span>diretor@escola.edu.br</span>
                </div>
                <div class="flex items-center space-x-3 text-gray-600 dark:text-gray-300">
                    <i data-feather="phone" class="w-5 h-5"></i>
                    <span>(11) 99999-9999</span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out w-64 glass-effect z-30">
            <div class="p-6">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-400 to-primary-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold bg-gradient-to-r from-primary-600 to-primary-400 bg-clip-text text-transparent">CopyWave</h1>
                </div>
            </div>
            <nav class="mt-2">
                <div class="px-4 space-y-2">
                    <a href="#" class="flex items-center space-x-3 p-3 bg-primary-50/50 dark:bg-primary-900/20 text-primary-700 dark:text-primary-300 rounded-xl font-medium">
                        <i data-feather="grid" class="w-5 h-5"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 dark:text-gray-300 hover:bg-gray-50/50 dark:hover:bg-gray-700/30 rounded-xl transition-colors duration-150">
                        <i data-feather="credit-card" class="w-5 h-5"></i>
                        <span>Gestão de planos</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 dark:text-gray-300 hover:bg-gray-50/50 dark:hover:bg-gray-700/30 rounded-xl transition-colors duration-150">
                        <i data-feather="file-text" class="w-5 h-5"></i>
                        <span>Páginas</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 dark:text-gray-300 hover:bg-gray-50/50 dark:hover:bg-gray-700/30 rounded-xl transition-colors duration-150">
                        <i data-feather="globe" class="w-5 h-5"></i>
                        <span>Gerenciar Domínios</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-3 text-gray-700 dark:text-gray-300 hover:bg-gray-50/50 dark:hover:bg-gray-700/30 rounded-xl transition-colors duration-150">
                        <i data-feather="users" class="w-5 h-5"></i>
                        <span>Gestão de Usuários</span>
                    </a>
                </div>

                <!-- User Profile Card -->
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <div class="bg-white/50 dark:bg-gray-700/50 rounded-xl p-4 cursor-pointer backdrop-blur-sm" onclick="toggleUserModal()">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-primary-400 to-primary-600 rounded-xl flex items-center justify-center shadow-lg">
                                <span class="text-sm font-bold text-white">DI</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 dark:text-white truncate">Diretor</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 truncate">Escola Estadual União dos Palmares</p>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300">
                                <i data-feather="settings" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <header class="glass-effect border-b border-gray-200/50 dark:border-gray-700/50 sticky top-0 z-20">
                <div class="flex justify-between items-center px-4 md:px-8 py-6">
                    <div class="flex items-center">
                        <button onclick="toggleSidebar()" class="md:hidden mr-4 text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300">
                            <i data-feather="menu" class="w-6 h-6"></i>
                        </button>
                        <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white">Lista de Páginas</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button onclick="togglePageWizard()" class="bg-gradient-to-r from-primary-600 to-primary-500 text-white px-4 py-2 rounded-xl flex items-center space-x-2 hover:from-primary-700 hover:to-primary-600 transition-all duration-150 shadow-lg hover:shadow-primary-500/20">
                            <i data-feather="plus" class="w-5 h-5"></i>
                            <span class="hidden md:inline">Criar Página</span>
                        </button>
                        <div class="flex items-center space-x-3">
                            <button onclick="toggleTheme()" class="p-2 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 rounded-xl transition-colors duration-150">
                                <i data-feather="moon" class="w-5 h-5 text-gray-600 dark:text-gray-400 dark:hidden"></i>
                                <i data-feather="sun" class="w-5 h-5 text-gray-400 hidden dark:block"></i>
                            </button>
                            <button class="p-2 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 rounded-xl transition-colors duration-150 relative">
                                <i data-feather="bell" class="w-5 h-5 text-gray-600 dark:text-gray-400"></i>
                                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-4 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="glass-effect rounded-2xl p-6 hover:shadow-xl transition-all duration-200 group">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">pacsafe</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">ID: 123</p>
                            </div>
                            <span class="px-3 py-1 bg-green-100/50 dark:bg-green-900/20 text-green-700 dark:text-green-400 rounded-full text-sm font-medium">Ativo</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">URL da Página:</p>
                            <a href="http://edu.pacsafe.com.br/" class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 hover:underline truncate block text-sm">
                                http://edu.pacsafe.com.br/
                            </a>
                        </div>
                        <div class="mt-6 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <i data-feather="eye" class="w-4 h-4 text-gray-400 dark:text-gray-500"></i>
                                <span class="text-gray-600 dark:text-gray-400 text-sm">43 visitas</span>
                            </div>
                            <div class="flex space-x-3">
                                <button class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 transition-colors duration-150">
                                    <i data-feather="eye" class="w-5 h-5"></i>
                                </button>
                                <button class="text-gray-400 dark:text-gray-500 hover:text-gray-600 dark:hover:text-gray-400 transition-colors duration-150">
                                    <i data-feather="edit-2" class="w-5 h-5"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-600 dark:hover:text-red-300 transition-colors duration-150">
                                    <i data-feather="trash-2" class="w-5 h-5"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Initialize Feather Icons
        document.addEventListener('DOMContentLoaded', () => {
            feather.replace();
        });

        // Theme Toggle
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                html.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                html.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }

        // Set initial theme
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        // Mobile sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        }

        // User modal toggle
        function toggleUserModal() {
            const modal = document.getElementById('userModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        // Page wizard modal toggle
        function togglePageWizard() {
            const modal = document.getElementById('pageWizardModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        // Wizard steps
        let currentStep = 1;
        const totalSteps = 3;

        function updateStepVisibility() {
            for (let i = 1; i <= totalSteps; i++) {
                const step = document.getElementById(`wizardStep${i}`);
                step.classList.toggle('active', i === currentStep);
            }

            const prevButton = document.getElementById('prevStep');
            const nextButton = document.getElementById('nextStep');

            prevButton.style.visibility = currentStep === 1 ? 'hidden' : 'visible';
            nextButton.innerHTML = currentStep === totalSteps ? 
                'Salvar<i data-feather="check" class="w-4 h-4 inline ml-1"></i>' : 
                'Próximo<i data-feather="arrow-right" class="w-4 h-4 inline ml-1"></i>';
            
            feather.replace();
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                currentStep++;
                updateStepVisibility();
            } else {
                // Handle form submission
                togglePageWizard();
                currentStep = 1;
                updateStepVisibility();
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateStepVisibility();
            }
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            const sidebar = document.getElementById('sidebar');
            const sidebarButton = document.querySelector('[onclick="toggleSidebar()"]');
            
            if (!sidebar.contains(e.target) && !sidebarButton.contains(e.target) && !sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.add('-translate-x-full');
            }
        });
    </script>
</body>
</html>
@extends('layouts.app')

@section('content')
<div class="p-6 md:p-8">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4 md:mb-0">Dashboard de Assinaturas</h1>
        
        <div class="flex items-center space-x-3">
            <div class="glass-effect rounded-xl p-2 flex items-center space-x-2">
                <i data-lucide="calendar" class="w-5 h-5 text-gray-500 dark:text-gray-400"></i>
                <select class="bg-transparent border-none text-sm text-gray-700 dark:text-gray-300 focus:ring-0">
                    <option value="today">Hoje</option>
                    <option value="week">Esta Semana</option>
                    <option value="month" selected>Este Mês</option>
                    <option value="year">Este Ano</option>
                    <option value="all">Todo Período</option>
                </select>
            </div>
            
            <button class="glass-effect rounded-xl p-2 text-gray-700 dark:text-gray-300 hover:bg-white/70 dark:hover:bg-gray-700/70 transition-colors duration-150">
                <i data-lucide="refresh-cw" class="w-5 h-5"></i>
            </button>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total de Assinaturas -->
        <div class="glass-effect rounded-2xl p-6 hover:shadow-lg transition-all duration-200 transform hover:scale-[1.02]">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total de Assinaturas</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">0</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="users" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                <i data-lucide="trending-flat" class="w-4 h-4 mr-1 text-yellow-500"></i>
                Sem alterações desde o último mês
            </div>
        </div>
        
        <!-- Assinaturas Ativas -->
        <div class="glass-effect rounded-2xl p-6 hover:shadow-lg transition-all duration-200 transform hover:scale-[1.02]">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Assinaturas Ativas</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">0</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="check-circle" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                <i data-lucide="trending-flat" class="w-4 h-4 mr-1 text-yellow-500"></i>
                Sem alterações desde o último mês
            </div>
        </div>
        
        <!-- Assinaturas Canceladas -->
        <div class="glass-effect rounded-2xl p-6 hover:shadow-lg transition-all duration-200 transform hover:scale-[1.02]">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Assinaturas Canceladas</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">0</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="x-circle" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                <i data-lucide="trending-flat" class="w-4 h-4 mr-1 text-yellow-500"></i>
                Sem alterações desde o último mês
            </div>
        </div>
        
        <!-- Receita Total -->
        <div class="glass-effect rounded-2xl p-6 hover:shadow-lg transition-all duration-200 transform hover:scale-[1.02]">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Receita Total</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">R$ 0,00</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="dollar-sign" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                <i data-lucide="trending-flat" class="w-4 h-4 mr-1 text-yellow-500"></i>
                Sem alterações desde o último mês
            </div>
        </div>
    </div>
    
    <!-- Charts and additional stats -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Assinaturas por Período -->
        <div class="glass-effect rounded-2xl p-6 col-span-2">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-lg text-gray-900 dark:text-white">Assinaturas por Período</h3>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 text-xs rounded-lg theme-gradient text-white shadow-sm">Dia</button>
                    <button class="px-3 py-1 text-xs rounded-lg bg-white/50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300">Semana</button>
                    <button class="px-3 py-1 text-xs rounded-lg bg-white/50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300">Mês</button>
                    <button class="px-3 py-1 text-xs rounded-lg bg-white/50 dark:bg-gray-700/50 text-gray-700 dark:text-gray-300">Ano</button>
                </div>
            </div>
            
            <div class="h-[300px] relative">
                <!-- Chart Placeholder -->
                <div class="flex justify-between items-end h-full">
                    @foreach(['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'] as $month)
                        <div class="flex flex-col items-center">
                            <div class="chart-bar w-6 theme-gradient rounded-t-md" style="height: 0%"></div>
                            <span class="text-xs mt-2 text-gray-500 dark:text-gray-400">{{ $month }}</span>
                        </div>
                    @endforeach
                </div>
                
                <!-- Empty State -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <div class="mb-3 mx-auto w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                            <i data-lucide="bar-chart-2" class="w-8 h-8 text-gray-400 dark:text-gray-600"></i>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Nenhum dado disponível para o período selecionado</p>
                        <button class="mt-3 px-4 py-2 text-xs theme-gradient rounded-lg text-white shadow-sm">Gerar Dados de Exemplo</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Faturamento Diário -->
        <div class="glass-effect rounded-2xl p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Faturamento Diário</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">R$ 0,00</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="calendar-days" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            
            <div class="mt-8">
                <div class="bg-gray-200 dark:bg-gray-700 h-2 rounded-full w-full">
                    <div class="theme-gradient h-2 rounded-full" style="width: 0%"></div>
                </div>
                <div class="flex justify-between mt-2 text-sm text-gray-500 dark:text-gray-400">
                    <span>Meta: R$ 100,00</span>
                    <span>0%</span>
                </div>
            </div>
            
            <!-- Mini Stats -->
            <div class="mt-8 grid grid-cols-2 gap-4">
                <div class="bg-white/50 dark:bg-gray-800/50 rounded-xl p-3">
                    <p class="text-xs text-gray-500 dark:text-gray-400">Média Diária</p>
                    <p class="text-lg font-bold theme-text">R$ 0,00</p>
                </div>
                <div class="bg-white/50 dark:bg-gray-800/50 rounded-xl p-3">
                    <p class="text-xs text-gray-500 dark:text-gray-400">Projeção Mensal</p>
                    <p class="text-lg font-bold theme-text">R$ 0,00</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Faturamento Mensal -->
        <div class="glass-effect rounded-2xl p-6 hover:shadow-lg transition-all duration-200 transform hover:scale-[1.02]">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Faturamento Mensal</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">R$ 0,00</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="calendar" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                <i data-lucide="trending-flat" class="w-4 h-4 mr-1 text-yellow-500"></i>
                Sem alterações desde o último mês
            </div>
            
            <!-- Monthly Comparison -->
            <div class="mt-6 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 rounded-full theme-gradient"></div>
                    <span class="text-xs text-gray-500 dark:text-gray-400">Este mês</span>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 rounded-full bg-gray-300 dark:bg-gray-600"></div>
                    <span class="text-xs text-gray-500 dark:text-gray-400">Mês anterior</span>
                </div>
            </div>
            
            <div class="mt-2 h-16 flex items-end space-x-1">
                @for($i = 1; $i <= 30; $i++)
                    <div class="flex-1 flex flex-col items-center space-y-1">
                        <div class="w-full theme-gradient rounded-t-sm" style="height: 0px"></div>
                        <div class="w-full bg-gray-300 dark:bg-gray-600 rounded-t-sm" style="height: 0px"></div>
                    </div>
                @endfor
            </div>
        </div>
        
        <!-- Faturamento Total -->
        <div class="glass-effect rounded-2xl p-6 hover:shadow-lg transition-all duration-200 transform hover:scale-[1.02]">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Faturamento Total</p>
                    <h2 class="text-3xl font-bold theme-text mt-2">R$ 0,00</h2>
                </div>
                <div class="theme-gradient rounded-xl p-3 shadow-lg">
                    <i data-lucide="trending-up" class="w-5 h-5 text-white"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-500 dark:text-gray-400">
                <i data-lucide="trending-flat" class="w-4 h-4 mr-1 text-yellow-500"></i>
                Sem alterações desde o último mês
            </div>
            
            <!-- Recent Transactions -->
            <div class="mt-6">
                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Transações Recentes</h4>
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                                <i data-lucide="credit-card" class="w-4 h-4 text-gray-500 dark:text-gray-400"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-700 dark:text-gray-300">Nenhuma transação</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">-</p>
                            </div>
                        </div>
                        <span class="font-medium text-gray-700 dark:text-gray-300">-</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Subscribers -->
    <div class="mt-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-bold text-gray-900 dark:text-white">Assinantes Recentes</h3>
            <a href="#" class="text-sm theme-text flex items-center">
                Ver todos <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
            </a>
        </div>
        
        <div class="glass-effect rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Cliente</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Plano</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Valor</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Data</th>
                            <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <tr class="text-center">
                            <td colspan="6" class="px-6 py-12 text-gray-500 dark:text-gray-400">
                                <div class="flex flex-col items-center">
                                    <div class="mb-3 w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-800 flex items-center justify-center">
                                        <i data-lucide="users" class="w-8 h-8 text-gray-400 dark:text-gray-600"></i>
                                    </div>
                                    <p>Nenhum assinante encontrado</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Inicializar ícones Lucide
    lucide.createIcons();
    
    // Simular dados do gráfico (para demonstração)
    setTimeout(() => {
        const chartBars = document.querySelectorAll('.chart-bar');
        const randomHeights = [20, 35, 45, 60, 40, 55, 70, 65, 50, 30, 25, 40];
        
        chartBars.forEach((bar, index) => {
            setTimeout(() => {
                bar.style.height = `${randomHeights[index]}%`;
            }, index * 100);
        });
    }, 1000);
</script>
@endsection